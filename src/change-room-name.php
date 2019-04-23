<?php

session_start();

include "db.php";
$db = new DB;

$res = $db->change_room_name($_SESSION["room_uuid"], $_POST["new-name"]);

if (!empty($res)) {
    echo $res . '<br><a href="/">Go to the home page</a>';
} else {
    header("Location: /");
}

?>
