import './styles/app.scss';
import 'jquery-ui/themes/base/all.css';
require('@fortawesome/fontawesome-free/css/all.min.css');
require('@fortawesome/fontawesome-free/js/all.js');
const $ = require('jquery');
require('bootstrap');
import 'jquery-ui/ui/widgets/autocomplete';
import { getAllGenres } from './js/getAllGenres';
import { movieAutocomplete } from './js/movieAutocomplete';
import { overrideBestFilmData } from './js/overrideBestFilmData';
import { createMovieCard } from './js/createMovieCard';
import { createPagination } from './js/createPagination'
import { removeItemFromLocalStorage } from './js/removeItemFromLocalStorage'
import { displaySpinner } from './js/displaySpinner';

$(document).ready(function () {
    removeItemFromLocalStorage('genresForSearchMovies');
    overrideBestFilmData();
    movieAutocomplete();
    getAllGenres();
});

$(document).on('click', '.genre-item', function () {
    displaySpinner('#movies');
    if ($(this).is(":checked")) {
        let genresForSearchMovies = localStorage.getItem('genresForSearchMovies') !== null && localStorage.getItem('genresForSearchMovies') !== '' ?
            (localStorage.getItem('genresForSearchMovies')).concat(',' + $(this).val()) : $(this).val()
        localStorage.setItem('genresForSearchMovies', genresForSearchMovies);
    } else {
        let genresForSearchMovies = (localStorage.getItem('genresForSearchMovies')).replace($(this).val() + ',', '').replace(',,', ',');
        localStorage.setItem('genresForSearchMovies', genresForSearchMovies);
    }

    $.ajax({
        url: Routing.generate('app_searchmoviebygenre__invoke'),
        type: "POST",
        data: { 'with_genres': localStorage.getItem('genresForSearchMovies') },
        success: function (data) {
            $('#movies').html('');
            data.response.results.forEach(movie => {
                let movieToAdd = createMovieCard(movie);
                $('#movies').append(movieToAdd);
            });
            createPagination(data.response.total_pages);
        }
    });
});

$(document).on('click', '.page-item', function () {
    displaySpinner('#movies');
    $.ajax({
        url: Routing.generate('app_searchmoviebygenre__invoke'),
        type: "POST",
        data: { 'with_genres': localStorage.getItem('genresForSearchMovies'), 'page': $(this).data('page') },
        success: function (data) {
            $('#movies').html('');
            data.response.results.forEach(movie => {
                let movieToAdd = createMovieCard(movie);
                $('#movies').append(movieToAdd);
            });
            createPagination(data.response.total_pages);
        }
    });
});

$(document).on('click', '.show-movie', function () {
    $('.iframe-details-movie').attr('src', 'https://www.youtube.com/embed/' + $(this).data('key-video')).css({ "width": "100%", "height": "30rem" })
    $('.movie-details-title').html($(this).data('title'))
    $('.original-title').html($(this).data('original-title'))
    $('.movie-voteAverage').html($(this).data('voteaverage'))
    $('.vote-count-details').html($(this).data('votecount'))
    $('#movieModal').modal('show')
});

$(document).on('click', '.close', function () {
    $('#movieModal').modal('hide');
});
