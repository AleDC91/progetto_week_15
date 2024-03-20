# Semplice App per che simula il gestionale di una palestra.

## IMPORTANTE: per far funzionare il tutto:

- ``composer install`` : installa dipendenze composer
- <code>cp .env.example .env</code> : inserisci i dati del tuo db nel file .env appena creato
- <code>php artisan key:generate</code> : genera key dell'app
- <code>php artisan migrate</code> : fai le migrazioni
- <code>php artisan db:seed</code> : riempi il database con i valori generati dai seeders tramite factory
- <code>npm install</code> : dipendenze necessarie node
- <code>npm run dev</code> : serve per Vite
- <code>php artisan serve</code> : fai partire il server

- Autenticazione e gestione utenti con laravel breeze

**Admin:**
- email: admin@example.com 
- password: Admin@1234!

**Utente base:**
- email: m.rossi@example.com
- password: Pa$$w0rd!
