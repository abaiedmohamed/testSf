<?

namespace App\Service;

use App\Factory\Movie;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

readonly class AddDetailsToMovie
{

      /**
     * @param array $moviesWithoutMapper
     */
    public static function addDetails(array $moviesWithoutMapper, VideoMovieService $videoMovieService, ParameterBagInterface $params): array
    {
        $movies = [];
        
        foreach ((array) $moviesWithoutMapper['response']['results'] as $movieValues) {
            $movies[] = Movie::new(
                $movieValues,
                $videoMovieService->findVideoMovie($movieValues->getId()),
                ((array) $params->get('movieDB'))['link_picture']
            );
        }
        unset($moviesWithoutMapper['response']['results']);

        return $movies;
    }
}
