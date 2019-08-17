# rooms

Chat di gruppo (progetto scolastico)

## Utilizzo

rooms necessita di un'instanza di un DBMS compatibile con MySQL in esecuzione.

Il DBMS deve avere un database chiamato 'rooms' e un utente 'rooms_user' con accesso al database.

Per la creazione delle tabelle si deve eseguire `initdb.sql` nel database 'rooms'.

I file nella cartella src devono essere spostati nella document root di un web server con abilitato php.

php deve avere il modulo mysqli abilitato.

### Librerie open source utilizzate

* [bulma](https://bulma.io/)
* [animate.css](https://daneden.github.io/animate.css/)
