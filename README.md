# rooms

A simple group chat software (school project)

## Usage (requires docker and docker-compose)

It is recommended to change the passwords in docker-compose.yml

```sh
docker-compose up -d
```

The server is online at http://localhost:8080

### The project

[rooms](https://github.com/mquarneti/rooms) is composed by three main components:
* [rooms-db](https://github.com/mquarneti/rooms-db) based on the mariadb docker image
* [rooms-api](https://github.com/mquarneti/rooms-api) based on the php:apache docker image
* [rooms-web](https://github.com/mquarneti/rooms-web) based on the httpd docker image
