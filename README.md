# rooms

Chat di gruppo

## Utilizzo

rooms necessita di un'instanza di un DBMS compatibile con MySQL in esecuzione.

Il DBMS deve avere un database chiamato 'rooms' e un utente 'rooms_user' con accesso al database.

Per la creazione delle tabelle si deve eseguire `initdb.sql` (**model**) nel database 'rooms'.

I file nella cartella src devono essere spostati nella document root di un web server con abilitato php.

php deve avere il modulo mysqli abilitato.

## Il progetto

Tutti i file in src fanno parte della **view**, tranne `db.php` che è il **control** nel paradigma **MVC**.

Sono state utilizzate le librerie CSS [bulma](https://bulma.io/) e [animate.css](https://daneden.github.io/animate.css/)
