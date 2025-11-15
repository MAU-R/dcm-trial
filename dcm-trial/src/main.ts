import { NestFactory } from '@nestjs/core';
import { AppModule } from './app.module';

async function bootstrap() {
  const app = await NestFactory.create(AppModule);

  app.enableCors({
    origin: '*',
    methods: 'GET,HEAD,PUT,PATCH,POST,DELETE,OPTIONS',
    allowedHeaders: '*',
    credentials: false, // importante para ngrok
    preflightContinue: false,
    optionsSuccessStatus: 200,
  });

  await app.listen(8535);
}
bootstrap();
