//TMDB

const API_KEY = 'api_key=936113f05c45800acb693083ae1b2701';
const BASE_URL = 'https://api.themoviedb.org/3';
const API_URL = BASE_URL + '/trending/all/day?' + API_KEY;
const IMG_URL = 'https://image.tmdb.org/t/p/w500';

const main = document.getElementById('main');

fetch(API_URL)
    .then(response => response.json())
    .then(data => {
        showMovies(data.results);
    })

function showMovies(data) {
    main.innerHTML = '';

    data.forEach(movie => {
        const {title, poster_path, overview, vote_average} = movie;
        const movieEl = document.createElement('div');
        movieEl.classList.add('movie');
        // des = `${overview}`.substr(0, 150) + "...";
        //console.log(des)
        movieEl.innerHTML = `
            <div class="movie-info">
                <img src="${poster_path? IMG_URL+poster_path: "http://via.placeholder.com/1080x1580" }" alt="${title}">
                <div class="title">
                    <h3>${title}</h3>
                    <span class="${getColor(vote_average)}">${vote_average}</span>
                </div>
            </div>   
            
            <div id="description">${overview}</div>   
        `
        //const text = document.getElementById("description");
        //text.innerHTML = `${overview}`.substr(0, 150) + "...";

        main.appendChild(movieEl);
    })
}

function getColor(vote) {
    if(vote>= 8){
        return 'green'
    }else if(vote >= 5){
        return "orange"
    }else{
        return 'red'
    }
}