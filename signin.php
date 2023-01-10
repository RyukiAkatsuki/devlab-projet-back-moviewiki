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

<div class="flex justify-center gap-4">

    <div class="flex-col m-10 gap-2.5">
        <h1 class="text-h1">Sign up</h1>
        <br>
        <form method="post" class="flex-col justify-center">
                <input class="p-2.5" type="text" name="first_name" placeholder="firstname">
                <input class="p-2.5" type="text" name="last_name" placeholder="lastname">
                <input class="p-2.5" type="email" name="email" placeholder="Email">
                <input class="p-2.5" type="password" name="password" placeholder="Password">
                <input class="p-2.5" type="password" name="password2" placeholder="Type password again">

            <div class="m-1.5">
                Not first time ? <a class="font-bold hover:text-amber-300" href="login.php">Already have a account</a>
            </div>

            <div class="flex justify-center">
                <input class="p-2.5 bg-amber-100 rounded" type="submit" name="register" value="register">
            </div>
            <?php

            require_once 'class/user.php';
            require_once 'class/connection.php';
            require_once 'class/log.php';

            if (isset($_POST['register'])) {

                $user = new User(
                    $_POST['first_name'],
                    $_POST['last_name'],
                    $_POST['email'],
                    $_POST['password'],
                    $_POST['password2']
                );

                if ($user->verifySign()) {

                    $connection = new Connection();
                    $record = $connection->insertUser($user);

                    if ($record) {
                        echo 'Account registered :)';
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