function movieAutocomplete() {
    $("#search_movie").autocomplete({
        source: function (request, response) {
            $.ajax({
                url: Routing.generate('app_searchmovie__invoke'),
                type: "POST",
                data: { 'query': $("#search_movie").val() },
                success: function (data) {
                    let arrayValues = [];
                    let indexArrayValues = 0;
                    let fullData = data;
                    $.each(data, function (index, movie) {
                        $.each(movie, function (idx, value) {

                            let movieObject = {
                                label: value,
                                index: idx,
                                value: value,
                                id: movie.id,
                                title: movie.title,
                                originalTitle: movie.originalTitle,
                                voteAverage: movie.voteAverage,
                                voteCount: movie.voteCount,
                                videoDetails: movie.videoDetails
                            };
                            if (idx == "title") {
                                arrayValues[indexArrayValues] = movieObject;
                                indexArrayValues++;
                            }
                        });
                    });
                    response(arrayValues, fullData);
                }
            });
        },
        select: function (event, item) {
            $('.iframe-details-movie').attr('src', 'https://www.youtube.com/embed/' + item.item.videoDetails?.key).css({ "width": "100%", "height": "30rem" })
            $('.movie-details-title').html(item.item.title)
            $('.original-title').html(item.item.originalTitle)
            $('.movie-voteAverage').html(item.item.voteAverage)
            $('.vote-count-details').html(item.item.voteCount)
            $('#movieModal').modal('show')
        },
    });
}

export { movieAutocomplete }