//auth service for auth using firebase and nest js
import { Injectable } from '@nestjs/common';
@Injectable()
export class AuthService {
  async login(): Promise<string> {
    // Implement your Firebase authentication logic here
    return await 'User logged in successfully';
  }
}