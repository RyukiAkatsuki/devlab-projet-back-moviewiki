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

<div class="flex justify-around">

    <div class="m-8">

        <?php

        $connect = new Get();
        $users = $connect->get($theId);

        echo $users->firstName . ' ' . $users->lastName;
        ?>
        <img src="img/profil.png" width="300px" height="auto">

    </div>

    <div class="flex flex-wrap justify-around p-2">
        <?php

        $co = new Get();
        $get = $co->getAlbums($theId);

        foreach ($get as $gets) {
            if ($gets['visibility'] === 'public') { ?>
                <div class="flex">
                <?= $gets['name']; ?>
                <?= $gets['visibility']; ?>
            </div>
                <?php }


     } ?>
    </div>
</div>


</body>
</html>