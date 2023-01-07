<?php

session_start();

$theId = $_GET['idUs'];
require_once "get.php";

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/dist/output.css" rel="stylesheet">
    <title>Home</title>
</head>

<?php
require_once 'header.php';
?>

<div class="list flex flex-wrap justify-around m-8">

    <?php

    $connect = new Get();
    $users = $connect->get($theId);

    echo $users->firstName . ' ' . $users->lastName;
    ?>

</div>

</body>
</html>