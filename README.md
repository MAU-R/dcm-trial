# dcm-trial
## This project demonstrates a lightweight end-to-end full-stack integration:
- WordPress + Elementor frontend
- NestJS backend with JWT authentication and firebase login/sign - in
- LangChain AI summarization agent using Langchain Framework and Groq
- Email payload sending
- Docker-based WordPress environment
- Ngrok exposure for secure remote testing

## FRONTEND: WORDPRESS USING DOCKER IMAGE:

### Requirements
Make sure you have the following tools installed:

- **Docker**: https://docs.docker.com/get-started/
- **Docker Compose** (bundled with Docker Desktop)
- **Git** (optional but recommended)

### Project Structure

The WordPress Docker compose file is located inside the folder:
wordpress-trial-frontend/
  ├─ docker-compose.yml

## Running WordPress with Docker
1️⃣ Navigate to the WordPress folder

cd wordpress-trial-frontend

2️⃣ Start the containers

docker compose up -d

Access WordPress in your browser

Default URL: use this localhost port, unless port configuration is changed inside docker-compose file
http://localhost:8080
## Changing the Backend URL inside 

### This project uses:
- Elementor Page Builder
- A custom HTML widget where the frontend UI connects to the backend via API

To edit the widget:

Log in to WordPress admin panel

🔐 WordPress Admin Access

The login credentials:
URL: http://localhost:8080/wp-admin

User: mauricio

Password: admin

Go to Pages → Edit with Elementor (login, register and chat)
Select the section and open the HTML widget
Modify custom endpoint in the BACKEND_URL variable(Due to we are using docker, the backend should be exposed to allow wordpress in the CORS)
<img width="1467" height="746" alt="imagen" src="https://github.com/user-attachments/assets/885f7e32-264f-4c22-85b0-0d5d71a70949" />



Any API route changes from NestJS backend must be updated inside this widget
Publish and test the page
## NestJS Backend — README

> Simple, practical README for a NestJS backend used in this project (JWT auth, Firebase integration, Nodemailer/Gmail).  
> Keep this file in the repository root as `README.md`.

---


---

## NESTjs BACKEND

This repository contains a NestJS backend that exposes REST  endpoints consumed by the WordPress/Elementor frontend.  
Main integrations:

- JWT-based authentication
- Firebase (for user tokens / auth flow or messaging — adjust as required)
- Nodemailer using Gmail (for transactional emails)
- Typical user routes and protected API endpoints

This README focuses on running the app locally, packaging with Docker, and exposing the server using `ngrok` for development and testing.

---

### Features

- `Auth` module: register, login, logout (JWT)
- `Email` module: send emails via Nodemailer + Gmail
- `Firebase` integration (admin SDK or client token verification)
- Config management with `@nestjs/config`

---

### Requirements

- Node.js >= 18
- npm >= 9 or yarn >= 1.22
- Nest CLI (optional but helpful): `npm i -g @nestjs/cli`
- ngrok (for exposing localhost to the internet)

---

## Quick Start (Local)

1. Clone the repo and install dependencies:

```bash
cd dcm-trial/
npm install
# or
# yarn install
npm run start:dev
# or
# yarn start:dev
```
The API will be available at:
http://localhost:8535 if the main.ts is not modified

## " Exposing the NestJS Backend with ngrok

This guide explains how to  expose localhost backend to the internet using **ngrok**, so the WordPress (Elementor) frontend can call the API externally during testing or demo presentations.


### REQUIREMENTS

Make sure you have these installed before continuing:
- ngrok → https://ngrok.com/download
### Expose Backend with ngrok
ngrok http 8535 (default port for this backend)

NGROK will provide a public url which has to be included in the BACKEND_URL variable at the wordpress frontend
<img width="1336" height="679" alt="imagen" src="https://github.com/user-attachments/assets/e4a44942-50b9-4f54-a8f3-906ac779a051" />


