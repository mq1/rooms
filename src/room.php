<?php

session_start();

include "db.php";
$db = new DB;

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ROOMS</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
</head>

<body>
    <section class="section">
        <div class="container">
            <h1 class="title">
                <?php
                echo $db->get_room_name($_SESSION["room_uuid"]);
                ?>
            </h1>
        </div>
    </section>
    <section class="section">
        <div class="container">
            <h4 class="title is-4">New message</h4>
            <form method="POST" action="send-message.php">
                <div class="field">
                    <label class="label">Content</label>
                    <div class="control">
                        <input type="text" class="input" name="content">
                    </div>
                </div>
                <div class="field">
                    <label class="label">Author</label>
                    <div class="control">
                        <input type="text" class="input" name="author" value='<?php echo $_COOKIE["author"] ?>'>
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <input class="button" type="submit" value="Send">
                    </div>
                </div>
            </form>
        </div>
    </section>
    <section class="section">
        <div class="container">
            <h4 class="title is-4">
                Messages <a class="button" href="/room.php">Refresh</a>
                </h2>
                <ul>
                    <?php
                    $res = $db->get_messages($_SESSION["room_uuid"]);
                    foreach ($res as $index => $message) {
                        echo
                            '<li class="animated fadeInUp" style=" animation-delay:'
                                . $index * 100
                                . 'ms">[' . $message["datetime"] . "] "
                                . $message["author"]
                                . " > " . $message["content"] . "</li>";
                    }
                    ?>
                </ul>
        </div>
    </section>
    <footer class="footer" style="position: absolute; width: 100%; bottom: 0">
        <div class="content has-text-centered">
            <a href="/">Go to the home page</a>
        </div>
    </footer>
</body>

</html>