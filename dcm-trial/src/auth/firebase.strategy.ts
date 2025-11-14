//firebase strategy for nest js authentication
import { Injectable } from '@nestjs/common';
import { PassportStrategy } from '@nestjs/passport';
import { Strategy, VerifyCallback } from 'passport-firebase-auth';
@Injectable()
export class FirebaseStrategy extends PassportStrategy(Strategy, 'firebase') {
  constructor() {
    super({
      firebaseProjectId: 'your-firebase-project-id',
    });
  }
  async validate(token: string, done: VerifyCallback): Promise<any> {
    try {
      const user = { token };
      done(null, user);
    } catch (err) {
      done(err, false);
    }
  }
}
