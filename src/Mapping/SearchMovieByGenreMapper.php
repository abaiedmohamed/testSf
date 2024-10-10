<?

namespace App\Mapping;

use App\Repository\SearchMovieByGenreRepository;
use App\Utils\DeserializeAndDenormalizeData;
use App\Dto\Movie;

class SearchMovieByGenreMapper
{

    public function __construct(private readonly SearchMovieByGenreRepository $searchMovieByGenreRepository)
    {    }

    public function searchMovies(string $genreIds): array
    {
        $movies = $this->searchMovieByGenreRepository->searchMovies($genreIds);
        unset($movies['response']['results']);
        $movies['response']['results'] = DeserializeAndDenormalizeData::initializeSerializer()->denormalize($this->searchMovieByGenreRepository->searchMovies($genreIds)['response']['results'], Movie::class.'[]');

        return $movies;
    }
}
