<?php

session_start();

# load the db
if (isset($_POST["new-room"]) || isset($_POST["enter-room"])) {
    include "db.php";
    $db = new DB;
}

# create a new room
if (isset($_POST["new-room"])) {
    $res = $db->new_room($_POST["name"], $_POST["password"]);
}

# enter into a room
if (isset($_POST["enter-room"])) {
    $res = $db->get_room_uuid($_POST["name"], $_POST["password"]);
    if ($res["success"]) {
        $_SESSION["room_uuid"] = $res["uuid"];
    }
}

echo $res["errno"] . $res["error"];

# exit from a room
if (isset($_POST["exit-room"])) {
    session_unset();
    session_destroy();
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>ROOMS</title>
</head>

<body>
    <h1>Welcome to ROOMS</h1>
    <a href="/new-room.html">Create a room</a>
    <br>
    <a href="/enter-room.html">Enter into a room</a>
    <?php
    if (isset($_SESSION["room_uuid"])) {
        echo '<br><a href="/room.php">Go to room</a><br><form method="POST" action="index.php">
            <input type="hidden" name="exit-room" value="submit">
            <input type="submit" value="Exit room">
            </form>';
    }
    ?>
</body>

</html>