function overrideBestFilmData() {
    $.ajax({
        url: Routing.generate('app_bestmovie__invoke'),
        type: "GET",
        success: function (response) {
            $('#iframe-best-movie').attr('src', 'https://www.youtube.com/embed/' + response.videoDetails.key).css({ "width": "100%", "height": "30rem" })
            $('#title-best-movie').html(response.title)
            $('#picture-best-movie').attr('src', response.posterPath).css({ "margin-top": "-28%", "width": "9%", "margin-left": "2%" })

        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });
}

export { overrideBestFilmData }