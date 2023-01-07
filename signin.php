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
<body>

<?php
require_once 'header.php';
?>

<div class="flex justify-center gap-12">

    <div class="flex-col m-10 gap-2.5">
        <h1 class="mt-0">Sign up</h1>

        <form method="post" class="flex-col justify-center m-10">
            <input class="p-2.5" type="text" name="first_name" placeholder="firstname">
            <input class="p-2.5" type="text" name="last_name" placeholder="lastname">
            <input class="p-2.5" type="email" name="email" placeholder="Email">
            <input class="p-2.5" type="password" name="password" placeholder="Password">
            <input class="p-2.5" type="password" name="password2" placeholder="Type password again">

            <div>Not first time ? <a class="text-amber-300" href="login.php">Already have a account</a> </div>

            <input type="submit" name="register" value="register">

            <?php

            require_once 'user.php';
            require_once 'connection.php';

            if (isset($_POST['register'])) {

                $user = new User(
                    $_POST['email'],
                    $_POST['password'],
                    $_POST['password2'],
                    $_POST['first_name'],
                    $_POST['last_name'],
                );

                if ($user->verifySign()) {

                    $connection = new Connection();
                    $record = $connection->insertUser($user);

                    if ($record) {
                        echo 'Accound registered :)';
                    } else {
                        echo "Internal error...";
                    }

                } else {
                    echo "Something is missing or wrong password :/";
                }
            }

            ?>

        </form>
    </div>

</div>

</body>
</html>