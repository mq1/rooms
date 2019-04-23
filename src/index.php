<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ROOMS</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css">
</head>

<body>
    <section class="section">
        <div class="container">
            <h1 class="title">
                Welcome to ROOMS
            </h1>
            <a href="/new-room.html">Create a room</a>
            <br>
            <a href="/enter-room.html">Enter into a room</a>
        </div>
    </section>
    <section class="section">
        <div class="container">
            <?php
            if (isset($_SESSION["room_uuid"])) {
                echo '
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
        </div>
    </section>
</body>

</html>