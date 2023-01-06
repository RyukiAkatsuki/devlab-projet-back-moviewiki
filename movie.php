<?php
session_start();

$theId = $_GET['idMv'];

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

<main id="mainMovie" class="flex"></main>

<script>
    const API_KEY = 'https://api.themoviedb.org/3/movie/<?= $theId ?>>?api_key=936113f05c45800acb693083ae1b2701'
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
            ficheMovie.classList.add('flex')
            ficheMovie.classList.add('p-12')
            ficheMovie.classList.add('gap-5')
            const {title, overview, release_date, poster_path, vote_average, backdrop_path} = data;

            ficheMovie.innerHTML = `
                <img class="h-450 rounded" src="${URL_IMG+poster_path}" alt="${title}">
                <div class="movie-texte">
                    <h1>${title}</h1>

                    <h3>Release date : ${release_date}</h3>
                    <h3>Vote : ${vote_average}</h3>
                    <h4>Sysnopis : </h4>
                    <p>${overview}</p>
                    <button>+ ADD</button>
                </div>`

            main.appendChild(ficheMovie);
        })

</script>

</body>
</html>