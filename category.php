
<div id="categories" class="list-none flex flex-wrap font-bold pt-2 items-center justify-center">
    <ul class="">
    </ul>
</div>

<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script>

    const API_KEY = "cc816a21b7c34924c67c302133e1a2e9";


    axios.get('https://api.themoviedb.org/3/genre/movie/list?api_key=cc816a21b7c34924c67c302133e1a2e9')
        .then(function (response) {

            var categories = response.data.genres;


            var list = document.getElementById('categories');


            for (var i = 0; i < categories.length; i++) {
                var category = categories[i];
                var li = document.createElement('li');
                li.classList.add('movie');
                li.classList.add('p-2.5');
                li.classList.add('m-2');
                li.classList.add('rounded-2xl');
                li.classList.add('bg-amber-300');
                li.classList.add('catego');
                li.innerHTML = '<a class="hover:text-amber-300" href="https://www.themoviedb.org/genre/' + category.id + '">' + category.name + '</a>';
                list.appendChild(li);
            }
        })
        .catch(function (error) {
            console.log(error);
        });
</script>