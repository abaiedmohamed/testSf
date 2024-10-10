<?

namespace App\Controller;

use App\Service\SearchMovieByGenreService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/api/movie/search-with-genre", options={"expose"=true}, methods={"POST"})
 */
class SearchMovieByGenreController extends AbstractController
{
    public function __construct(public readonly SearchMovieByGenreService $searchMovieByGenreService) {}
    
    public function __invoke(Request $request): JsonResponse
    {
        return $this->json($this->searchMovieByGenreService->searchMovies((string) $request->getContent()));
    }
}
