//ai.service for nest js application
import { Injectable } from '@nestjs/common';
@Injectable()
export class AiService {
  getHello(): string {
    return 'Hello World!';
  }
}
