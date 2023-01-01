<?php

require_once "log.php";
require_once "connection.php";

if(isset($_SESSION['admin']) && $_SESSION['admin'] === false) {
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
    <link rel="stylesheet" href="style.css">
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


<a><button onclick="location.href='logout.php'" id="deco">Log out</button></a>

</body>
</html>