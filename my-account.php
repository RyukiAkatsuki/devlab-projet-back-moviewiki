<?php

require_once "log.php";
require_once "connection.php";
require_once 'album.php';
require_once 'get.php';

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
    <link href="/dist/output.css" rel="stylesheet">
    <title><?= $name ?></title>
</head>
<body>

<?php
require_once 'header.php';
?>


<br><br>
<div class="flex justify-around">

    <div class="flex-col m-10 py-10 p-2">
        <h1>Add an album</h1> <br>
        <form method="post" class="flex-col justify-center bg-amber-500">
            <input class="p-2.5" type="text" name="name" placeholder="Album's name"> <br>
            <select class="p-2.5" name="type">
                <option value="public">Public</option>
                <option value="private">Private</option>
            </select>

            <input class="p-2.5" type="submit" name="addAl" value="Add Album">
        </form>
        <?php

        if (isset($_POST['addAl'])) {

            $connect = new Album();
            $connected = new Connection();

            if ($connect->verifyAlbum($_POST['name'],$_POST['type'])) {
                $theAd = $connected->createAlbum($id, $_POST['name'],$_POST['type']);
            } else {
                echo "something wrong";
            }
        }

        ?>
    </div>

    <div class="p-2">
        <?= '<h2 class="text-xl"> Hello ' . $name . ' ' . $lastName . '</h2>'; ?>
        <br>
        <img class="rounded-3xl" src="img/profil.png" width="200px" height="auto">
    </div>
</div>
<br>


<div class="flex flex-wrap justify-around p-2">
    <?php

    $co = new Get();
    $get = $co->getAlbums($id);

    foreach ($get as $gets) {
        ?>
    <div class="flex">
        <?= $gets['name']; ?>
        <?= $gets['visibility']; ?>
    </div>

    <?php } ?>
</div>

<a><button class="bg-amber-500" onclick="location.href='logout.php'" id="deco">Log out</button></a>

</body>
</html>