<?php
session_start();
?>

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

<ul class="genres">
    <li class="genre" id="28">Action</li>
    <li class="genre" id="16">Animation</li>
    <li class="genre" id="12">Aventure</li>
    <li class="genre" id="35">Comédie</li>
    <li class="genre" id="80">Crime</li>
    <li class="genre" id="99">Documentaire</li>
    <li class="genre" id="18">Drame</li>
    <li class="genre" id="10751">Familial</li>
    <li class="genre" id="14">Fantastique</li>
    <li class="genre" id="10752">Guerre</li>
    <li class="genre" id="36">Histoire</li>
    <li class="genre" id="27">Horreur</li>
    <li class="genre" id="10402">Musique</li>
    <li class="genre" id="9648">Mystère</li>
    <li class="genre" id="10749">Romance</li>
    <li class="genre" id="878">Science-Fiction</li>
    <li class="genre" id="53">Thriller</li>
    <li class="genre" id="10770">Téléfilm</li>
    <li class="genre" id="37">Western</li>
</ul>

<script>
    console.log("1")

    document.querySelector('ul').addEventListener('onclick', (e) => {
        console.log(e.target.value)
        document.querySelectorAll('.movie-info').forEach(movie => {
            movie.classList.add('hide')
        })if(!(e.target.value === 'tous')) {
            document.querySelectorAll(`.movie-info.${e.target.value}`).forEach(movie => {
                movie.classList.remove('hide')
            })
        } else {
            document.querySelectorAll(`.movie-info`).forEach(movie => {
                movie.classList.remove('hide')
            })
        }
    })
</script>

<main id="main"></main>

<script>
    //get all the movies

    const API_URL = 'https://api.themoviedb.org/3/trending/all/day?api_key=936113f05c45800acb693083ae1b2701';
    const IMG_URL = 'https://image.tmdb.org/t/p/w500';

    const main = document.getElementById('main');

    fetch(API_URL)
        .then(response => response.json())
        .then(data => {
            console.log(data)
            showAllMovies(data.results);
            console.log(data.results)
        })

    function showAllMovies(data) {
        main.innerHTML = '';

        data.forEach(movie => {
            const {id, title, poster_path} = movie;
            const movieEl = document.createElement('div');
            movieEl.classList.add('movie');
            // des = `${overview}`.substr(0, 150) + "...";
            //console.log(des)
            movieEl.innerHTML = `
                <a href="movie.php?idMv=${id}">
                    <img src="${IMG_URL+poster_path}" alt="${title}">
                    <h3>${title}</h3>
                </a>
        `
            //const text = document.getElementById("description");
            //text.innerHTML = `${overview}`.substr(0, 150) + "...";

            main.appendChild(movieEl);
        })
    }


</script>
</body>
</html>