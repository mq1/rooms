<?php

class DB
{
    private $mysqli;

    function __construct()
    {
        $this->mysqli = new mysqli(
            "localhost",
            "rooms_user",
            "",
            "rooms"
        );
        if ($this->mysqli->connect_errno) {
            echo "Failed to connect to MySQL: (" . $this->mysqli->connect_errno . ") " . $this->mysqli->connect_error;
        }
    }

    function new_room($name, $password)
    {
        $password_hash = password_hash($password, PASSWORD_ARGON2I);

        # check if there's a room with the same name
        $res = $this->mysqli->query("SELECT uuid FROM rooms WHERE name = '$name'");
        $row = $res->fetch_assoc();
        if (!empty($row["uuid"])) {
            return ["error" => "There\'s already a room with that name"];
        }

        # create the room
        if (!$this->mysqli->query("INSERT INTO rooms (name, password_hash) VALUES ('$name', '$password_hash')")) {
            return ["errno" => $this->mysqli->errno, "error" => $this->mysqli->error];
        }

        return ["success" => true];
    }

    function get_room_uuid($name, $password)
    {
        # return an error if there is no room with that id
        $res = $this->mysqli->query("SELECT uuid, password_hash FROM rooms WHERE name = '$name'");
        $row = $res->fetch_assoc();
        $uuid = $row["uuid"];
        if (empty($uuid)) {
            return ["error" => "Room not found"];
        }

        # check if the password matches the hash
        if (!password_verify($password, $row["password_hash"])) {
            return ["error" => "Incorrect password"];
        }

        return ["success" => true, "uuid" => $uuid];
    }

    function get_room_name($uuid)
    {
        $res = $this->mysqli->query("SELECT name FROM rooms WHERE uuid = '$uuid'");
        $row = $res->fetch_assoc();
        $name = $row["name"];
        if (empty($name)) {
            return ["error" => "Room not found"];
        }

        return ["success" => true, "name" => $name];
    }

    function get_messages($room_uuid)
    {
        $messages = [];
        $res = $this->mysqli->query("SELECT content, author, datetime FROM messages WHERE room_uuid = '$room_uuid'");
        while ($row = $res->fetch_assoc()) {
            $message = [];
            $message["content"] = $row["content"];
            $message["author"] = $row["author"];
            $message["datetime"] = $row["datetime"];
            array_push($messages, $message);
        }

        return ["success" => true, "messages" => $messages];
    }

    function send_message($room_uuid, $content, $author)
    {
        if (!$this->mysqli->query("INSERT INTO messages (room_uuid, content, author) VALUES ('$room_uuid', '$content', '$author')")) {
            return ["errno" => $this->mysqli->errno, "error" => $this->mysqli->error];
        }

        return ["success" => true];
    }
}
