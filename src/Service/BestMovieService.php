<?

namespace App\Service;

use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use App\Dto\Movie;
use App\Mapping\BestMovieMapper;
use App\Factory\Movie as MovieFactory;

class BestMovieService
{

    public function __construct(
        private readonly BestMovieMapper $movieMapper,
        private readonly VideoMovieService $videoMovieService,
        private readonly ParameterBagInterface $params
    ) {}

    public function findBestMovie(): Movie
    {
        $movie = $this->movieMapper->findBestMovie()['0'];
        return MovieFactory::new(
            $movie,
            $this->videoMovieService->findVideoMovie($movie->getId()),
            ((array) $this->params->get('movieDB'))['link_picture']
        );
    }
}
