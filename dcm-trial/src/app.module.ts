import { Module } from '@nestjs/common';
import { FirebaseModule } from './firebase/firebase.module';
import { AuthService } from './auth/auth.service';
import { AuthController } from './auth/auth.controller';
import { AgentController } from './agent/agent.controller';
import { AgentService } from './agent/agent.service';
import { AgentModule } from './agent/agent.module';
import { ConfigModule } from '@nestjs/config';
import { AuthModule } from './auth/auth.module';
import { MailModule } from './email/mail.module';
@Module({
  imports: [
    FirebaseModule,
    AgentModule,
    ConfigModule.forRoot({ cache: true }),
    AuthModule,
    MailModule,
  ],
  controllers: [AuthController, AgentController],
  providers: [AuthService, AgentService],
})
export class AppModule {}
