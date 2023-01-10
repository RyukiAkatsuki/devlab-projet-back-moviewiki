<?php
session_start();

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
<body>

<?php
require_once 'header.php';

require_once 'category.php';
?>

<div class="main flex">

    <div class="user p-2 border-amber-100">
        <h1 class="m-8">Users</h1>

        <div class="list flex flex-wrap md:flex-col justify-center">

            <?php

            $connect = new Get();
            $users = $connect->getAllUsers();

            foreach($users as $user) { ?>

                <div class="users">

                    <?php {
                        echo '<div class="user p-2">';

                        echo '<a class="hover:text-amber-300" href="profil.php?idUs=' . $user->id . '">' . '<img class="rounded w-28 md:w-52" src="img/profil.png">' . $user->firstName . '</a>';
                        echo '</div>';
                    } ?>

                </div>

            <?php } ?>
        </div>
    </div>

    <main id="main" class="flex flex-wrap justify-around m-8"></main>

</div>


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
            if (movie.title) {
                const {id, title, poster_path} = movie;
                const movieEl = document.createElement('div');
                movieEl.classList.add('movie');
                movieEl.classList.add('m-2.5');
                movieEl.classList.add('w-60');
                movieEl.classList.add('p-3');
                movieEl.classList.add('rounded');

                movieEl.innerHTML = `
                    <a href="movie.php?idMv=${id}" class="w-full m-0 text-center hover:text-amber-300">
                        <img class="rounded" src="${IMG_URL+poster_path}" alt="${title}">
                        <h3 class="pt-2 text-center">${title}</h3>
                    </a>
            `
                main.appendChild(movieEl);
            }

            if (movie.name) {
                const {id, name, poster_path} = movie;
                const movieEl = document.createElement('div');
                movieEl.classList.add('movie');
                movieEl.classList.add('m-2');
                movieEl.classList.add('w-60');
                movieEl.classList.add('p-2');
                movieEl.classList.add('rounded');

                movieEl.innerHTML = `
                    <a href="movie.php?idMv=${id}" class="w-full m-0 text-center hover:text-amber-300">
                        <img class="rounded" src="${IMG_URL+poster_path}" alt="${name}">
                        <h3 class="pt-2 text-center">${name}</h3>
                    </a>
            `
                main.appendChild(movieEl);
            }
        })
    }


</script>
</body>
</html>