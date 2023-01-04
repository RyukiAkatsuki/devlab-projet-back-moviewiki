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
    <a href="">Actions</a>
    <a href="">Adventure</a>
    <a href="">Animation</a>
    <a href="">Comedy</a>
    <a href="">Crime</a>
    <a href="">Documentary</a>
    <a href="">Drama</a>
    <a href="">Family</a>
    <a href="">Fantasy</a>
    <a href="">History</a>
    <a href="">Horror</a>
    <a href="">Music</a>
    <a href="">Mystery</a>
    <a href="">Romance</a>
    <a href="">Science Fiction</a>
    <a href="">TV Movie</a>
    <a href="">Thriller</a>
    <a href="">War</a>
    <a href="">Western</a>
</div>
</body>

<script>
    import axios from 'axios';

    const API_KEY = "cc816a21b7c34924c67c302133e1a2e9";
    axios.get(`https://https://api.themoviedb.org/3/genre/movie/list?=api_key=${API_KEY}`)
</script>
</html>