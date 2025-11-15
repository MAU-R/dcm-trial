import { Module } from '@nestjs/common';
import { AgentService } from './agent.service';
import { AgentController } from './agent.controller';
import { AuthModule } from 'src/auth/auth.module';
import { MailModule } from 'src/email/mail.module';

@Module({
  imports: [AuthModule, MailModule],
  providers: [AgentService],
  controllers: [AgentController],
})
export class AgentModule {}
