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
            return "There's already a room with that name";
        }

        # create the room
        if (!$this->mysqli->query("INSERT INTO rooms (name, password_hash) VALUES ('$name', '$password_hash')")) {
            return "Failed to create a room: (" . $this->mysqli->errno . ") " . $this->mysqli->error;
        }

        return;
    }

    function get_room_uuid($name, $password)
    {
        # return an error if there is no room with that id
        $res = $this->mysqli->query("SELECT uuid, password_hash FROM rooms WHERE name = '$name'");
        $row = $res->fetch_assoc();
        $uuid = $row["uuid"];
        if (empty($uuid)) {
            return "Room not found";
        }

        # check if the password matches the hash
        if (!password_verify($password, $row["password_hash"])) {
            return "Incorrect password";
        }

        return ["uuid" => $uuid];
    }

    function get_room_name($uuid)
    {
        $res = $this->mysqli->query("SELECT name FROM rooms WHERE uuid = '$uuid'");
        $row = $res->fetch_assoc();
        $name = $row["name"];
        if (empty($name)) {
            return "Room not found";
        }

        return $name;
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

        return $messages;
    }

    function send_message($room_uuid, $content, $author)
    {
        if (!$this->mysqli->query("INSERT INTO messages (room_uuid, content, author) VALUES ('$room_uuid', '$content', '$author')")) {
            return "Failed to send a message: (" . $this->mysqli->errno . ") " . $this->mysqli->error;
        }

        return;
    }

    function change_room_name($uuid, $new_name)
    {
        if (!$this->mysqli->query("UPDATE rooms SET name = '$new_name' WHERE uuid = '$uuid'")) {
            return "Failed to create a room: (" . $this->mysqli->errno . ") " . $this->mysqli->error;
        }

        return;
    }

    function delete_room($uuid)
    {
        if (!$this->mysqli->query("DELETE FROM rooms WHERE uuid = '$uuid'")) {
            return "Failed to create a room: (" . $this->mysqli->errno . ") " . $this->mysqli->error;
        }

        return;
    }
}

?>
