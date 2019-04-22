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
    FOREIGN KEY (room_uuid) REFERENCES rooms(uuid) ON DELETE CASCADE
);
