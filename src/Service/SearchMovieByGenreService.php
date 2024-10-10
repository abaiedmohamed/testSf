<?

namespace App\Service;

use App\Factory\Movie;
use App\Service\VideoMovieService;
use App\Mapping\SearchMovieByGenreMapper;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

readonly class SearchMovieByGenreService
{
    public function __construct(
        private readonly SearchMovieByGenreMapper $searchMovieByGenreMapper,
        private readonly VideoMovieService $videoMovieService,
        private readonly ParameterBagInterface $params
    ) {}

    public function searchMovies(string $genreIds): array
    {
        $movies = $this->searchMovieByGenreMapper->searchMovies($genreIds);
        $movies['response']['results'] = AddDetailsToMovie::addDetails(
            $this->searchMovieByGenreMapper->searchMovies($genreIds),
            $this->videoMovieService,
            $this->params
        );

        return $movies;
    }
}
