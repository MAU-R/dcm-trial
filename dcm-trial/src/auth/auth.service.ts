import {
  Injectable,
  Inject,
  UnauthorizedException,
  BadRequestException,
} from '@nestjs/common';
import * as admin from 'firebase-admin';
import * as jwt from 'jsonwebtoken';
import fetch from 'node-fetch';

// ---------------------------------------------------
// Firebase Login Response Type
// ---------------------------------------------------
interface FirebaseLoginResponse {
  localId: string;
  idToken: string;
  email: string;
  refreshToken: string;
  expiresIn: string;
}

@Injectable()
export class AuthService {
  private readonly JWT_SECRET = process.env.JWT_SECRET || 'super-secret-key';

  constructor(
    @Inject('FIREBASE_APP')
    private readonly firebaseApp: admin.app.App,
  ) {}

  private get auth() {
    return this.firebaseApp.auth();
  }

  // ---------------------------------------------------
  // REGISTER
  // ---------------------------------------------------
  async register(name: string, email: string, password: string) {
    try {
      const userRecord = await this.auth.createUser({
        email,
        password,
        displayName: name,
      });

      const token = this.createToken({
        uid: userRecord.uid,
        name: userRecord.displayName,
        email: userRecord.email,
      });

      return { token };
    } catch (err: any) {
      throw new BadRequestException(err.message);
    }
  }

  // ---------------------------------------------------
  // LOGIN
  // ---------------------------------------------------
  async login(email: string, password: string) {
    try {
      const firebaseData = await this.verifyFirebasePassword(email, password);

      const user = await this.auth.getUser(firebaseData.localId);

      const token = this.createToken({
        uid: user.uid,
        email: user.email,
        name: user.displayName,
      });
      console.log('TOKEN CREADO:', token);
      return { token };
    } catch (err) {
      console.error('LOGIN ERROR:', err);
      throw new UnauthorizedException('Invalid credentials');
    }
  }

  // ---------------------------------------------------
  // Firebase Email/Password Authentication (REST API)
  // ---------------------------------------------------
  private async verifyFirebasePassword(
    email: string,
    password: string,
  ): Promise<FirebaseLoginResponse> {
    const url = `https://identitytoolkit.googleapis.com/v1/accounts:signInWithPassword?key=${process.env.FIREBASE_WEB_API_KEY}`;

    const response = await fetch(url, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ email, password, returnSecureToken: true }),
    });

    const data = (await response.json()) as
      | FirebaseLoginResponse
      | { error: any };

    if ('error' in data) {
      throw new UnauthorizedException(data.error.message);
    }

    return data;
  }

  // ---------------------------------------------------
  // Create JWT for backend sessions
  // ---------------------------------------------------
  private createToken(payload: any) {
    return jwt.sign(payload, this.JWT_SECRET, { expiresIn: '7d' });
  }
}
