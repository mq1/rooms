<?php
session_start();

include "db.php";
$db = new DB;

# send the message
if (isset($_POST["content"])) {
    $res = $db->send_message($_SESSION["room_uuid"], $content, $_POST["author"]);
    echo $res["error"];
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>ROOMS</title>
</head>

<body>
    <h1>
        <?php
        $res = $db->get_room_name($_SESSION["room_uuid"]);
        echo $res["name"];
        echo $res["error"];
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
        <?php
        $res = $db->get_messages($_SESSION["room_uuid"]);
        foreach ($res["messages"] as $message) {
            echo "<li>[" . $message["datetime"] . "] " . $message["author"] . " > " . $message["content"] . "</li>";
        }
        ?>
    </ul>
    <a href="/">Go to the home page</a>
</body>

</html>