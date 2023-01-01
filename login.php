<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Home</title>
</head>
<body>

<?php
require_once 'header.php';
?>

<div class="form">

    <div class="log">
        <h1>Log in</h1>
        <form method="post">
            <input type="email" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Password">

            <div>First time ? <a href="signin.php">Create a account</a></div>

            <input type="submit" name="login" value="Login">
        </form>
    </div>

</div>

<?php

require_once 'user.php';
require_once 'connection.php';
require_once 'log.php';

if (isset($_POST['login'])) {
    $user = new Log(
        $_POST['email'],
        $_POST['password']
    );

    if ($user->verifyLog()) {
        $theAd = $user->isAdmin();
    } else {
        echo "Wrong email or password";
    }
}

?>

</body>
</html>