<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="dist/output.css">
    <title>Categories</title>
</head>
<body>
<h2>Sélectionner un catégorie que vous voulez souhaitez voir: </h2>

<div id="categories" class="list-none flex flex-col">
    <ul class="border border-lime-500">

    </ul>
</div>
</body>

<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script>

    const API_KEY = "936113f05c45800acb693083ae1b2701";

    axios.get('https://api.themoviedb.org/3/genre/movie/list?api_key=936113f05c45800acb693083ae1b2701')
        .then(function (response) {

            var categories = response.data.genres;


            var list = document.getElementById('categories');


            for (var i = 0; i < categories.length; i++) {
                var category = categories[i];
                var li = document.createElement('li');
                li.innerHTML = '<a href="https://www.themoviedb.org/genre/' + category.id + '">' + category.name + '</a>';
                list.appendChild(li);
            }
        })
        .catch(function (error) {
            console.log(error);
        });
</script>
</html>