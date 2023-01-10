<?php

session_start();

$theId = $_GET['idUs'];
require_once "class/get.php";

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

<div class="flex justify-around m-5">

    <div class="p-2.5">

        <?php

        $connect = new Get();
        $users = $connect->get($theId);

        echo '<h1 class="font-h1">' . $users->firstName . ' ' . $users->lastName . '</h1>';
        ?>
        <img class="rounded" src="img/profil.png" width="300px" height="auto">

    </div>

    <div class="justify-around p-2">
        <h1>Albums liked</h1>
        <div class="flex flex-wrap justify-around p-2">
            <?php

            $co = new Get();
            $getLiked = $co->getAlbumsLiked($theId);

            foreach ($getLiked as $gets) { ?>
                    <div class="movie flex-col justify-around p-2 m-2 w-52">
                        <?= $gets['id_album']; ?>
                    </div>
                <?php


            } ?>
        </div>

    </div>


</div>

<div class="p-2">
    <h1><?= $users->firstName ?>'s Albums</h1>
    <div class="flex flex-wrap justify-around p-2">
        <?php

        $get = $connect->getAlbums($theId);

        foreach ($get as $gets) {
            if ($gets['visibility'] === 'public') { ?>
                <div class="movie flex-col justify-around p-2 m-2 w-52">
                    <?php
                    echo $gets['name'] . '<br>';

                    $getM = $connect->getMovie($gets['id']);


                    foreach ($getM as $gets) {

                        $idMovie = $gets['id_movie'];
                        echo '<a href="movie.php?idMv=' . $idMovie .'">' . $idMovie . '</a>';
                        ?>

                            <div class="film"></div>
                    <?php

                    } ?>

                </div>
            <?php }
        } ?>
    </div>

</div>

<script>


            const base = 'https://api.themoviedb.org/3/movie/'
            const key = '?api_key=936113f05c45800acb693083ae1b2701&language=en-US'
            const url = base + <?= $gets['id_movie'] ?> + key
            const URL_IMG = 'https://image.tmdb.org/t/p/w500'

            fetch(url)
                .then(response => response.json())
                .then(data => {
                    console.log(data)

                    const ficheMovie = document.querySelectorAll('.film')
                    const {id, backdrop_path} = data;

                    ficheMovie.innerHTML = ` <a href="movie.php?idMv=${id}">
                                <img class="w-full rounded" src="${URL_IMG+backdrop_path}"></a> `
                })
        }   )
    }

</script>


</body>
</html>