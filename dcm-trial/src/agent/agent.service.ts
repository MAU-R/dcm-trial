import { Injectable } from '@nestjs/common';
import { ChatGroq } from '@langchain/groq';
import { PromptTemplate } from '@langchain/core/prompts';
import { MailService } from '../email/email.service';

@Injectable()
export class AgentService {
  private model: ChatGroq;
  private prompt: PromptTemplate;

  constructor(private readonly mailService: MailService) {
    this.model = new ChatGroq({
      apiKey: process.env.GROQ_API_KEY,
      model: 'llama-3.3-70b-versatile',
      temperature: 0.2,
      maxTokens: 200,
    });

    this.prompt = new PromptTemplate({
      template: `
You are a summarization component. Your job is ONLY to compress the user's question into a shorter version.

STRICT RULES — DO NOT BREAK THEM:
1. Summarize ONLY the text of the user's question.
2. Use 1 short sentence (max 20–25 words).
3. NO explanations, NO solutions, NO analysis.
4. NO technical interpretation or added details beyond what the user literally wrote.
5. NO restating context that is not explicitly in the question.
6. NO guessing the user's intent.
7. NO rewriting in a more formal or expanded way.
8. If the question is already short, keep it almost the same.
9. Output ONLY the summary. No prefixes like “Summary:” or “The user asks…”.
10. Keep all the important keywords from the original question.
11. Keep the format as a question
12. DO not miss any important detail that changes the meaning of the question for example:
- If the question includes specific numbers, dates, names, or technical terms, keep them exactly as they are.
- If the question asks how to do something using specific things, keep those things in the summary, also if the question has steps, point to point concepts also keep them.
QUESTION:
{question}

Return ONLY the summary.
      `.trim(),
      inputVariables: ['question'],
    });
  }

  async summarizeQuestion(question: string, userEmail: string) {
    const finalPrompt = await this.prompt.format({ question });

    const response = await this.model.invoke(finalPrompt);

    const summary = response?.content ?? 'No hubo respuesta del agente';

    await this.mailService.sendSummaryEmail(
      userEmail,
      (summary as string) ?? 'No response...',
      question,
    );

    return { summary };
  }
}
