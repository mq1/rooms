<?
session_start();
?>

<!--
Homepage

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

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>ROOMS</title>
</head>

<body>
    <h1>Welcome to ROOMS</h1>
    <a href="/new-room.html">Create a room</a>
    <br>
    <a href="/enter-room.html">Enter into a room</a>
    <?
    if (!empty($_SESSION["room_uuid"])) {
        echo '<br><a href="/room.php">Go to room</a><br><a href="/exit-room.php">Exit room</a>';
    }
    ?>
</body>

</html>