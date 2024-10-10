function createMovieCard(movie) {
    return `
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-2">
                    <img src="${movie.backdropPath}" class="img-fluid rounded-start img-movie" alt="${movie.title}">
                </div>
                <div class="col-md-10">
                    <div class="card-body">
                        <h5 class="card-title movie-title">${movie.title}
                            <span class="star-rating voteAverage">
                                ${movie.voteAverage}
                            </span>
                            <span class="text-muted voteCount">(${movie.voteCount} votes)</span>
                        </h5>
                        <p class="card-text movie-year">${movie.releaseDate}</p>
                        <p class="card-text movie-description">${movie.overview}</p>
                        <button type="button" class="btn btn-primary show-movie" data-toggle="modal" data-target="#movieModal" data-whatever="@mdo"
                        data-original-title="${movie.originalTitle}"
                        data-title="${movie.title}" data-key-video="${movie.videoDetails?.key}" data-voteCount="${movie.voteCount}" 
                        data-voteAverage="${movie.voteAverage}">Lire les détails</button>
                    </div>
                </div>
            </div>
        </div>
    `;
}

export { createMovieCard }