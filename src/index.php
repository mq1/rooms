<?php
session_start();
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
        echo '
            <hr>
            <a href="/room.php">Go to room</a>
            <br>
            <a href="/exit-room.php">Exit room</a>
            <br>
            <a href="/change-room-name.html">Change room name</a>
            <br>
            <a href="/delete-room.html">Delete room</a>
        ';
    }
    ?>
</body>

</html>
