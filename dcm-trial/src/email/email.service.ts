// nest service fo generatind and sending emails
import { Injectable } from '@nestjs/common';


@Injectable()
export class EmailService {
  async sendEmail(to: string, subject: string, body: string): Promise<string> {
    return `Email sent to ${to} with subject "${subject}"`;
  }
}
