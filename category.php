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

<div id="categories">

</div>
</body>

<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script>

    const API_KEY = "cc816a21b7c34924c67c302133e1a2e9";

    axios.get('https://api.themoviedb.org/3/genre/movie/list', {
        params: {
            api_key: API_KEY
        }
    })
        .then(function (response) {
            // handle success
            var categories = response.data.genres;
            var categoryList = '';
            categories.forEach(function(category) {
                categoryList += '<li>' + category.name + '</li>';
            });
            document.getElementById('categories').innerHTML = '<ul>' + categoryList + '</ul>';
        })
        .catch(function (error) {
            // handle error
            console.log(error);
        });
</script>
</html>