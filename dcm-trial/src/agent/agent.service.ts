import { Injectable } from '@nestjs/common';
import Groq from 'groq-sdk';
import { MailService } from '../email/email.service';

@Injectable()
export class AgentService {
  private groq: Groq;

  constructor(private readonly mailService: MailService) {
    this.groq = new Groq({
      apiKey: process.env.GROQ_API_KEY,
    });
  }

  async summarizeQuestion(question: string, userEmail: string) {
    const prompt = `
      You are a summarization assistant.
      Summarize the user's question in 1–3 sentences.

      User question:
      ${question}
    `;

    const completion = await this.groq.chat.completions.create({
      model: 'llama-3.3-70b-versatile',
      messages: [
        { role: 'system', content: 'You summarize text.' },
        { role: 'user', content: prompt },
      ],
      temperature: 0.2,
      max_tokens: 200,
    });

    const summary = completion.choices[0].message.content;

    // 📩 ENVÍA EL CORREO AL USUARIO LOGUEADO
    await this.mailService.sendSummaryEmail(
      userEmail,
      summary ?? 'No hubo respuesta del agente',
      question,
    );

    return { summary }; // ← Esto es lo que regresa al FRONT
  }
}
