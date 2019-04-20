<?
session_start();
?>

<!--
Session creation

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

$name = $_POST["name"];
$password = $_POST["password"];

$db = new DB;

$res = $db->get_room_uuid($name, $password);

if ($res["success"]) {
    $_SESSION["room_uuid"] = $res["uuid"];
    echo '<a href="/">Go to the home page</a>';
    exit();
}

echo $res["errno"] . $res["error"];

?>