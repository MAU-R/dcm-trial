import { Controller, Post, Body, Req, UseGuards } from '@nestjs/common';
import { AgentService } from './agent.service';
import { JwtAuthGuard } from '../auth/jwt-auth.guard';

@Controller('agent')
export class AgentController {
  constructor(private readonly agentService: AgentService) {}

  @UseGuards(JwtAuthGuard)
  @Post('summarize')
  async summarize(@Body('question') question: string, @Req() req) {
    const email = req.user.email; // ← viene del JWT
    return this.agentService.summarizeQuestion(question, email);
  }
}
