<?

namespace App\Service;

use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use App\Factory\Movie;
use App\Mapping\SearchMovieMapper;
use App\Service\VideoMovieService;

class SearchMovieService
{
    public function __construct(
        private readonly SearchMovieMapper $searchMovieMapper,
        private readonly VideoMovieService $videoMovieService,
        private readonly ParameterBagInterface $params
    ) {}

    public function searchMovies(string $queryParams): array
    {
        $movies = [];
        foreach ($this->searchMovieMapper->searchMovies($queryParams) as $movie) {
            $movies[] = Movie::new(
                $movie,
                $this->videoMovieService->findVideoMovie($movie->getId()),
                ((array) $this->params->get('movieDB'))['link_picture']
            );
        }

        return $movies;
    }
}
