# rooms

A simple group chat software (school project)

## Usage (requires docker and docker-compose)

* Download [docker-compose.yml](https://raw.githubusercontent.com/mquarneti/rooms/master/docker-compose.yml)
* It is recommended to change the passwords in docker-compose.yml
* execute `docker-compose up -d` as root in the same directory as docker-compose.yml

The server is online at http://localhost

### The project

[rooms](https://github.com/mquarneti/rooms) requires a running database: [rooms-db](https://github.com/mquarneti/rooms-db) based on the mariadb docker image
