//auth controller using firebase and nest js
import { Controller, Get } from '@nestjs/common';
import { AuthService } from './auth.service';
@Controller('auth')
export class AuthController {
  constructor(private readonly authService: AuthService) {}
  @Get('login')
  async login(): Promise<string> {
    return await this.authService.login();
  }
}
