# Restaurant Backoffice

[Screencast from 2025-06-27 15-27-07.webm](https://github.com/user-attachments/assets/af72892a-e81c-4111-be63-abae1916abf6)

Backend e frontend per la gestione del backoffice di un ristorante, sviluppato con Laravel 12 e Vite. Il progetto integra un'API Laravel ed un frontend moderno basato su Alpine.js, Tailwind CSS e Blade.

---

## 🚀 Tecnologie principali

-   **Backend:** Laravel Framework 12, PHP 8.2
-   **Frontend:** Vite, Tailwind CSS, Alpine.js
-   **Altro:** Laravel Breeze per scaffolding autenticazione

---

## 📁 Struttura progetto (principale)

```
app/             # Logica applicativa backend (Controller, Models, Middleware)
database/        # Migrazioni, seeders e factory per test dati
resources/       # Asset frontend (JS, CSS, Blade templates)
routes/          # Definizione rotte web e API
vite.config.js   # Configurazione Vite per frontend
```

---

## 🛠️ Installazione e sviluppo

### 1. Clona il progetto

```bash
git clone https://github.com/antoniorusso2/restaurant-backoffice.git
cd restaurant-backoffice
```

### 2. Installa le dipendenze backend

```bash
composer install
```

### 3. Installa le dipendenze frontend

```bash
npm install
```

### 4. Configura l’ambiente

```bash
cp .env.example .env
php artisan key:generate
```

Configura il database in `.env` (es. MySQL o SQLite).

### 5. Esegui migrazioni e seeders

```bash
php artisan migrate --seed
```

### 6. Avvia i servizi in parallelo

```bash
npm run dev
```

In alternativa, puoi usare lo script composito:

```bash
composer dev
```

Questo avvierà:

-   Server Laravel (php artisan serve)

-   Server Vite per frontend

---

## 🧪 Script utili

| Comando               | Descrizione                                 |
| --------------------- | ------------------------------------------- |
| `composer dev`        | Avvia backend, queue e frontend in dev mode |
| `npm run dev`         | Avvia Vite per frontend                     |
| `php artisan migrate` | Esegue migrazioni del database              |

---
