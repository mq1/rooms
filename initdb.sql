/* Database initialization
 *
 * Copyright (C) 2019 Manuel Quarneti
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 */

CREATE TABLE rooms (
    uuid VARCHAR(36) NOT NULL DEFAULT UUID(),
    name VARCHAR(255) NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    PRIMARY KEY (uuid)
);

CREATE TABLE messages (
    room_uuid VARCHAR(36) NOT NULL,
    content TEXT NOT NULL,
    author VARCHAR(255),
    datetime DATETIME NOT NULL DEFAULT NOW(),
    FOREIGN KEY (room_uuid) REFERENCES rooms(uuid)
);
