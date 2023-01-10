<?php

session_start();

if(isset($_SESSION['admin']) && $_SESSION['admin'] === false) {
    $id = $_SESSION['user'][0];
    $name = $_SESSION['user'][1];
    $lastName = $_SESSION['user'][2];
}

$theId = $_GET['idMv'];
require_once "class/get.php";
require_once "class/connection.php";



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

<main id="mainMovie" class="flex">
</main>

<script>
    const API_KEY = 'https://api.themoviedb.org/3/movie/<?= $theId ?>?api_key=936113f05c45800acb693083ae1b2701&language=en-US'
    const URL_IMG = 'https://image.tmdb.org/t/p/w500'

    const main = document.getElementById('mainMovie');

    fetch(API_KEY)
        .then(response => response.json())
        .then(data => {
            main.innerHTML = '';
            console.log(data)

            console.log(data.genres)

            data.genres.forEach(genre=>{
                console.log(genre.name)
            })

            const ficheMovie = document.createElement('div')
            ficheMovie.classList.add('card')
            ficheMovie.classList.add('flex-col')
            ficheMovie.classList.add('sm:flex')

            ficheMovie.classList.add('p-12')
            ficheMovie.classList.add('gap-5')
            const {title, overview, release_date, backdrop_path, vote_average, popularity, homepage} = data;

            ficheMovie.innerHTML = `
                <img class="h-auto rounded" src="${URL_IMG+backdrop_path}" alt="${title}">
                <div>
                    <h1 class="font-bold text-h1"><a class="font-bold text-h1" href="${homepage}">${title}</a></h1> <br>
                    <h3>Release date : ${release_date}</h3>
                    <h3>Vote : ${vote_average}</h3>
                    <h3>Popularity : ${popularity}</h3><br>
                    <h4>Sysnopis : </h4>
                    <p>${overview}</p><br>
                       <?php
            if(isset($_SESSION['admin']) && $_SESSION['admin'] === false) {

                $co = new Get();
                $get = $co->getAlbums($id);
            ?>
<div class="flex justify-center gap-5">
                <form method="post" class="flex justify-center">
                    <select name="album" class="p-2.5">
                    <?php
                        foreach ($get as $gets) {
                            echo '<option value=' . $gets['id'] . '>' .  $gets['name'] . '</option>';
                        }
                     ?>
                    </select>
                    <input class="p-2.5 bg-amber-300" type="submit" name="addInAl" value="Add Movie">

                    </form>
                    <?php if(isset($_POST['addInAl'])) {

                        $conn = new Connection();
                        $theMov = $conn->insertMovie(intval($_POST['album'], 10), $theId);

                    } }?>


</div>
                </div>`

            main.appendChild(ficheMovie);
        })


</script>

</body>
</html>