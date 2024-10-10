<?

namespace App\Controller;

use App\Service\SearchMovieService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/api/movie/search", options={"expose"=true}, methods={"POST"})
 */
class SearchMovieController extends AbstractController
{
    public function __construct(public readonly SearchMovieService $searchMovieService) {}

    public function __invoke(Request $request): JsonResponse
    {
        return $this->json($this->searchMovieService->searchMovies((string) $request->getContent()));
    }
}
