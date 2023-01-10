<?php

require_once "class/log.php";
require_once "class/connection.php";
require_once "class/get.php";

if(isset($_SESSION['admin']) && $_SESSION['admin'] === true) {
    $id = $_SESSION['user'][0];
    $name = $_SESSION['user'][1];
    $lastName = $_SESSION['user'][2];
} else {
    echo "not admin";
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/dist/output.css" rel="stylesheet">
    <title><?= $name ?></title>
</head>
<body>

<?php
require_once 'header.php';
?>


<br><br>

<?php
echo '<h2> Hi ' . $name . ' ' . $lastName . '</h2>';
?>


<div class="list flex flex-wrap justify-around m-8">

    <?php

    $connect = new Get();
    $users = $connect->getAllUsers();

    foreach($users as $user) { ?>

        <div class="users">

            <?php {
                echo '<div class="user">';
                echo '<img class="rounded" src="img/profil.png" width="100px" height="auto">' . $user->firstName . ' ' . $user->lastName;
                echo '<br>';
                echo '<a href="delete.php?id=' . $user->id .'">Delete</a>';
                echo '</div>';
            } ?>

        </div>

    <?php } ?>
</div>


<a><button onclick="location.href='logout.php'" id="deco">Log out</button></a>

</body>
</html>