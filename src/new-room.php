<?php

include "db.php";
$db = new DB;

$res = $db->new_room($_POST["name"], $_POST["password"]);

if (!empty($res)) {
    echo $res . '<br><a href="/">Go to the home page</a>';
} else {
    header("Location: /");
}

?>
