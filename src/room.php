<?php

session_start();

include "db.php";
$db = new DB;

?>

<!DOCTYPE html>
<html>

<head>
    <title>ROOMS</title>
</head>

<body>
    <h1>
        <?php
        echo $db->get_room_name($_SESSION["room_uuid"]);
        ?>
    </h1>
    <hr>
    <h2>New message</h2>
    <form method="POST" action="send-message.php">
        Content: <input type="text" name="content">
        <br>
        Author: <input type="text" name="author" value='<?php echo $_COOKIE["author"] ?>'>
        <br>
        <input type="submit" value="send">
    </form>
    <hr>
    <h2>
        Messages <a href="/room.php">Refresh</a>
    </h2>
    <ul>
        <?php
        $res = $db->get_messages($_SESSION["room_uuid"]);
        foreach ($res as $message) {
            echo "<li>[" . $message["datetime"] . "] " . $message["author"] . " > " . $message["content"] . "</li>";
        }
        ?>
    </ul>
    <a href="/" style="position: absolute; bottom: 0">Go to the home page</a>
</body>

</html>
