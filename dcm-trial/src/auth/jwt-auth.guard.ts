import {
  Injectable,
  CanActivate,
  ExecutionContext,
  UnauthorizedException,
} from '@nestjs/common';
import { JwtService } from '@nestjs/jwt';

@Injectable()
export class JwtAuthGuard implements CanActivate {
  constructor(private readonly jwtService: JwtService) {}

  async canActivate(context: ExecutionContext): Promise<boolean> {
    const req = context.switchToHttp().getRequest();

    const authHeader = req.headers['authorization'];
    console.log('AUTH HEADER:', authHeader);
    if (!authHeader || !authHeader.startsWith('Bearer ')) {
      throw new UnauthorizedException('Token missing');
    }

    const token = authHeader.replace('Bearer ', '');

    try {
      const payload = await this.jwtService.verifyAsync(token);

      req.user = payload;

      return true;
    } catch (err) {
        console.error('JWT VERIFICATION ERROR:', err);
        console.error('TOKEN:', token);
      throw new UnauthorizedException('Invalid token');
    }
  }
}
