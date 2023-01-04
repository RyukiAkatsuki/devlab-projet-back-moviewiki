<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h2>Sélectionner un catégorie que vous voulez souhaitez voir</h2>
<div>
    <a href="action.php">Actions</a>
    <a href="adventure.php">Adventure</a>
    <a href="animation.php">Animation</a>
    <a href="comedy.php">Comedy</a>
    <a href="crime.php">Crime</a>
    <a href="documentary.php">Documentary</a>
    <a href="drama.php">Drama</a>
    <a href="family.php">Family</a>
    <a href="fantasy.php">Fantasy</a>
    <a href="history.php">History</a>
    <a href="horror.php">Horror</a>
    <a href="music.php">Music</a>
    <a href="mystery.php">Mystery</a>
    <a href="romance.php">Romance</a>
    <a href="scifi.php">Science Fiction</a>
    <a href="tvmovie.php">TV Movie</a>
    <a href="thriller.php">Thriller</a>
    <a href="war.php">War</a>
    <a href="western.php">Western</a>
</div>
</body>

<script>
    import axios from 'axios';

    const API_KEY = "cc816a21b7c34924c67c302133e1a2e9";
    axios.get(`https://https://api.themoviedb.org/3/genre/movie/list?=api_key=${API_KEY}`)
</script>
</html>