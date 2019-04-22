# rooms

Chat di gruppo

## Utilizzo

rooms necessita di un'instanza di un DBMS compatibile con MySQL in esecuzione.

Il DBMS deve avere un database chiamato 'rooms' e un utente 'rooms_user' con accesso al database.

Per la creazione delle tabelle si deve eseguire initdb.sql nel database 'rooms'.

I file nella cartella src devono essere spostati nella document root di un web server con abilitato php.

php deve avere il modulo mysqli abilitato.

## Il progetto

Tutti i file in src sono pagine **view**, tranne `db.php` che funge da **control** nel paradigma MVC.
