<?php

session_start();

include "db.php";
$db = new DB;

$res = $db->get_room_uuid($_POST["name"], $_POST["password"]);
if (isset($res["uuid"])) {
    $_SESSION["room_uuid"] = $res["uuid"];
    header("Location: /");
} else {
    echo $res . '<br><a href="/">Go to the home page</a>';
}

?>
