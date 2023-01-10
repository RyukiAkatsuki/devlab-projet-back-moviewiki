<?php

require_once "class/log.php";
require_once "class/connection.php";
require_once 'class/album.php';
require_once 'class/get.php';

if(isset($_SESSION['admin']) && $_SESSION['admin'] === false) {
    $id = $_SESSION['user'][0];
    $name = $_SESSION['user'][1];
    $lastName = $_SESSION['user'][2];
} else {
    echo "not admin";
}

$connect = new Album();
$connected = new Connection();

$co = new Get();
$get = $co->getAlbums($id);

if ($get == array()) {
    $connected->createAlbum($id, "watched", "public");
    $connected->createAlbum($id, "wish", "public");
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
        <form method="post" class="flex-col justify-center bg-amber-300">
            <input class="p-2.5" type="text" name="name" placeholder="Album's name"> <br>
            <select class="p-2.5" name="type">
                <option value="public">Public</option>
                <option value="private">Private</option>
            </select>

            <input class="p-2.5" type="submit" name="addAl" value="Add Album">
        </form>
        <?php

        if (isset($_POST['addAl'])) {

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

    foreach ($get as $gets) {
        ?>
    <div class="flex-col movie justify-around p-2 m-5">
        <?php echo '<h1 class="text-h1">' . $gets['name'] . " | " . $gets['visibility'] . '</h1> <br>';

        $getM = $co->getMovie($gets['id']);

        foreach ($getM as $get) {
            echo '<a href="movie.php?idMv=' . $get['id_movie'] .'">' . $get['id_movie'] . '</a>';
            echo '<a href="delete.php?id=' . $get['id'] . '"> Delete</a>' . '<br>';
        }

        ?>

    </div>

    <?php } ?>
</div>


<div class="justify-around p-2">
    <h1>Albums liked</h1>
    <div class="flex justify-around p-2">
        <?php

        $co = new Get();
        $getLiked = $co->getAlbumsLiked($id);

        foreach ($getLiked as $gets) { ?>
            <div class="flex">
                <div class="movie flex justify-around p-2 m-2 w-52">
                    <?= $gets['id_album']; ?>
                </div>
            </div>
            <?php
        } ?>

    </div>

</div>


<a><button class="bg-amber-300 m-5 p-5 rounded-3xl hover:cursor-pointer" onclick="location.href='logout.php'" id="deco">Log out</button></a>

<script>
    const API_KEY = 'https://api.themoviedb.org/3/movie/<?= $idMovie ?>?api_key=936113f05c45800acb693083ae1b2701&language=en-US'
    const URL_IMG = 'https://image.tmdb.org/t/p/w500'

    fetch(API_KEY)
        .then(response => response.json())
        .then(data => {
            console.log(data)

            const ficheMovie = document.getElementById('film')
            const {id, backdrop_path, poster_path} = data;

            ficheMovie.innerHTML = ` <a href="movie.php?idMv=${id}"><img class="w-full rounded" src="${URL_IMG+backdrop_path}">
<img class="w-full rounded" src="${URL_IMG+poster_path}"></a> `

        })



</script>

</body>
</html>