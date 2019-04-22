<?php

session_start();

include "db.php";
$db = new DB;

# send the message
$res = $db->send_message($_SESSION["room_uuid"], $_POST["content"], $_POST["author"]);

# save the author
if (isset($_POST["author"])) {
    setcookie("author", $_POST["author"], time() + (86400 * 30), "/"); // 86400 = 1 day
}

if (!empty($res)) {
    echo $res . "<br><a href="/">Go to the home page</a>";
}

header("Location: /room.php");

?>
