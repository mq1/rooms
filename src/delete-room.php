<?php

session_start();

include "db.php";
$db = new DB;

$res = $db->delete_room($_SESSION["room_uuid"]);

if (!empty($res)) {
    echo $res . "<br><a href="/">Go to the home page</a>";
}

header("Location: /exit-room.php");

?>
