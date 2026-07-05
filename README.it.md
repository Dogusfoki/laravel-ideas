# Ideas App

Un'applicazione full-stack per la gestione di note, sviluppata con **Laravel 13**, dove gli utenti autenticati possono creare, visualizzare, modificare ed eliminare le proprie idee private. Sviluppata seguendo il corso [Laracasts Laravel 2026](https://laracasts.com) per esercitarsi su autenticazione, autorizzazione, relazioni Eloquent e strumenti frontend moderni.

## 🔗 **Repository:** https://github.com/Dogusfoki/laravel-ideas

## ✨ Funzionalità

- 🔐 **Autenticazione** — flusso personalizzato di registrazione, login e logout (basato su sessioni, senza pacchetti di terze parti)
- 📝 **Gestione delle idee (CRUD)** — creazione, visualizzazione, modifica ed eliminazione delle proprie idee
- 🔒 **Autorizzazione** — le Policy di Laravel garantiscono che ogni utente possa visualizzare/modificare/eliminare solo le proprie idee (previene l'accesso non autorizzato tramite modifica manuale dell'URL)
- 🔗 **Relazioni Eloquent** — `User hasMany Idea` / `Idea belongsTo User`
- 📧 **Notifiche** — gli utenti ricevono una notifica email quando pubblicano una nuova idea
- 🎨 **Frontend moderno** — Tailwind CSS 4 + DaisyUI, compilati localmente tramite Vite (nessuna dipendenza da CDN)
- 🗄️ **SQLite** — database locale leggero, senza configurazione

---

## 🛠️ Stack Tecnologico

| Livello  | Tecnologia                                      |
| -------- | ----------------------------------------------- |
| Backend  | Laravel 13 (PHP 8.4)                            |
| Database | SQLite                                          |
| Frontend | Blade, Tailwind CSS 4, DaisyUI 5                |
| Bundler  | Vite                                            |
| Auth     | Personalizzata (basata su sessioni)             |
| Email    | Laravel Notifications (Mailpit per test locali) |

---

## 🚀 Come Iniziare

### Prerequisiti

- PHP 8.4+
- Composer
- Node.js e npm

### Installazione

```bash
# Clona il repository
git clone https://github.com/your-username/ideas-app.git
cd ideas-app

# Installa le dipendenze PHP
composer install

# Installa le dipendenze JS
npm install

# Copia il file d'ambiente
cp .env.example .env

# Genera la chiave dell'applicazione
php artisan key:generate

# Crea il file del database SQLite
touch database/database.sqlite

# Esegui le migration
php artisan migrate
```

### Avvio dell'applicazione

Servono due terminali aperti contemporaneamente:

```bash
# Terminale 1 — Server Laravel
php artisan serve

# Terminale 2 — Vite (bundler frontend, con hot reload)
npm run dev
```

Visita **http://127.0.0.1:8000** nel tuo browser.

---

## 📧 Testare le Notifiche Email in Locale

Di default, le email vengono registrate nel file `storage/logs/laravel.log`. Per un'esperienza visiva più chiara, puoi usare [Mailpit](https://github.com/axllent/mailpit):

```bash
brew install mailpit
mailpit
```

Poi imposta quanto segue nel tuo file `.env`:

```
MAIL_MAILER=smtp
MAIL_HOST=127.0.0.1
MAIL_PORT=1025
```

Visita **http://localhost:8025** per visualizzare le email inviate.

---

## 🗂️ Struttura del Progetto (punti salienti)

```
app/
├── Http/Controllers/
│   ├── Auth/
│   │   ├── RegisteredUserController.php
│   │   └── SessionController.php
│   └── IdeaController.php
├── Models/
│   ├── User.php
│   └── Idea.php
├── Notifications/
│   └── IdeaPublished.php
└── Policies/
    └── IdeaPolicy.php
```

---

## 🔐 Flusso di Autenticazione

- `POST /register` → crea un utente, effettua l'hashing della password, effettua il login automaticamente
- `POST /login` → autentica tramite `Auth::attempt()`, rigenera la sessione
- `DELETE /logout` → disconnette l'utente, invalida la sessione

Le route sono protette tramite i gruppi middleware `auth` e `guest`, in modo che solo gli utenti appropriati possano accedere alle pagine di registrazione, login e gestione delle idee.

---

## 🔒 Autorizzazione

Ogni idea appartiene esattamente a un utente. La classe `IdeaPolicy` garantisce che:

- Solo il proprietario dell'idea possa **visualizzarla**, **modificarla**, **aggiornarla** o **eliminarla**
- Qualsiasi tentativo non autorizzato (ad esempio modificando manualmente l'URL in `/ideas/{id}`) restituisca una risposta `403 Forbidden`

---

## 📚 Contesto Formativo

Questo progetto è stato sviluppato seguendo il corso Laracasts **Laravel 2026 Edition**, con particolare attenzione a:

- Autenticazione manuale (senza Breeze/Fortify/Jetstream)
- Protezione delle route tramite middleware
- Relazioni Eloquent (`belongsTo`, `hasMany`)
- Gate e Policy per l'autorizzazione
- Notifiche (canale email)
- Bundling degli asset frontend con Vite

---

## 📄 Licenza

Questo progetto è open-source a scopo didattico.
