// src/email/email.service.ts
import {
  Injectable,
  Logger,
  InternalServerErrorException,
} from '@nestjs/common';
import nodemailer from 'nodemailer';

@Injectable()
export class MailService {
  private transporter: nodemailer.Transporter;
  private logger = new Logger(MailService.name);

  constructor() {
    const host = process.env.MAIL_HOST || 'smtp.gmail.com';
    const port = Number(process.env.MAIL_PORT || 587);
    const user = process.env.MAIL_USER;
    const pass = process.env.MAIL_PASS;

    if (!user || !pass) {
      this.logger.warn(
        'MAIL_USER or MAIL_PASS not set — email sending will fail until env vars are configured.',
      );
    }

    this.transporter = nodemailer.createTransport({
      host,
      port,
      secure: port === 465, // true for 465, false for 587
      auth: {
        user,
        pass,
      },
      // opcional para evitar problemas con certificados en dev:
      // tls: { rejectUnauthorized: false },
    });
  }

  async sendSummaryEmail(to: string, summary: string, original: string) {
    try {
      const info = await this.transporter.sendMail({
        from: process.env.EMAIL_FROM || process.env.MAIL_USER,
        to,
        subject: 'Your summarized question',
        html: `
          <h3>Your summarized question</h3>
          <p><strong>Summary:</strong> ${summary}</p>
          <hr/>
          <p><strong>Original:</strong></p>
          <pre style="white-space:pre-wrap;">${original}</pre>
        `,
      });

      this.logger.log(`Email sent: ${info.messageId}`);
      // Si quieres la URL de prueba (nodemailer test) puedes hacer nodemailer.getTestMessageUrl(info)
      return info;
    } catch (err) {
      this.logger.error('sendSummaryEmail failed', err);
      // Lanzar excepción depende de tu diseño; en AgentService puedes atraparlo y no romper la respuesta
      throw new InternalServerErrorException(
        'Could not send summary email: ' + err?.message,
      );
    }
  }
}
