# Semplice App per che simula il gestionale di una palestra.

## IMPORTANTE: per far funzionare il tutto:

- <code>composer install</code> : installa dipendenze composer
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


La dashboard mostra una tabella con i corsi a cui si è iscritti, con il relativo stato: pending, cancelled, confirmed.
Da qui, se il corso non è già iniziato, si ha la possibilità di cancellare l'iscrizione.
La seconda tabella invece mostra i corsi già terminati.
In entrambe è attiva la barra di ricerca per filtrare i risultati e si ha la possibilità di vedere la pagina di dettaglio dell'istruttore assegnato al corso.
Infondo alla pagina ci sono alcuni semplici dati riguardanti i corsi dell'utente.

Nella pagina "All Courses" la prima tabella mostra tutti i corsi attivi e ci si può iscrivere a quelli che non sono già iniziati.
Ogni iscrizione ai corsi deve essere confermata dall'admin. 
Nella tabella sottostante sono raccolti tutti i corsi già terminati.
Anche in queste due tabelle è attiva la barra di ricerca per filtrare i risultati.

La terza tab mostra semplicemente una lista di tutti gli istruttori, dalla quale si può accedere a una pagina di dettaglio.
Le email e il numero di telefono sono cliccabili e portano direttamente al servizio di contatto selezionato.


**Sezione Admin**

Se l'utente è loggato con i privilegi di amministratore avrà accesso ad ulteriori 3 viste:
Dal pannello 'Admin' si possono accettare le iscrizioni ai corsi o rifiutarle, senza avere la possibilità di sforare la capacità massima di partecipanti al corso.
La gestione di questo pannello è stata fatta sfruttando le chiamate AJAX permettendo così una navogazione più fluida senza la necessità di ricaricare la pagina.
I singoli corsi sono inseriti in un container a fisarmonica, e ogni intestazione contiente alcuni dettagli del corso, come il numero di iscritti e i posti totali, che vengono modificati dinamicamente a seconda delle azioni dell'admin sulla tabella.
Quando la capacità massima di partecipanti è raggiunta, non è più possibile confermare l'iscrizione di altri utenti, ma si ha la possibilità di revocare quella di utenti già confermati e successivamente inserirne altri.

La seconda tab contiene alcune statistiche sulle iscrizioni ai corsi, come la distribuione totale degli stati  di accettazione degli utenti ai corsi e un istogramma che per ogni corso mostra la capacità, il numero di iscritti e il numero di iscrizioni accettate.

Nell'ultima tab l'admin ha la possibilità di creare un nuovo corso.
