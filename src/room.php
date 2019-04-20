<?
session_start();
?>

<!--
Chat

Copyright (C) 2019 Manuel Quarneti

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <https://www.gnu.org/licenses/>.
-->

<?
include "db.php";
$db = new DB;

# send the message
$content = $_POST["content"];
$author = $_POST["author"];
if (!empty($content)) {
    $res = $db->send_message($_SESSION["room_uuid"], $content, $author);
    if (!$res["success"]) {
        echo $res["error"];
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>ROOMS</title>
</head>

<body>
    <h1>
        <?
        $res = $db->get_room_name($_SESSION["room_uuid"]);
        if ($res["success"]) {
            echo $res["name"];
        } else {
            echo $res["error"];
        }
        ?>
    </h1>

    <h2>New message</h2>
    <form method="POST" action="room.php">
        Content: <input type="text" name="content">
        <br>
        Author: <input type="text" name="author">
        <br>
        <input type="submit" value="send">
    </form>
    <h2>
        <form action="room.php">
            Messages <input type="submit" value="refresh">
        </form>
    </h2>
    <ul>
        <?
        $res = $db->get_messages($_SESSION["room_uuid"]);
        if ($res["success"]) {
            foreach ($res["messages"] as $message) {
                echo "<li>[" . $message["datetime"] . "] " . $message["author"] . " > " . $message["content"] . "</li>";
            }
        }
        ?>
    </ul>
</body>

</html>