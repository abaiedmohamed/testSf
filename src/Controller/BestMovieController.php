<?

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use App\Service\BestMovieService;

/**
 * @Route("/api/movie/best", options={"expose"=true}, methods={"GET"})
 */
class BestMovieController extends AbstractController
{

    public function __construct(public readonly BestMovieService $bestMovieService) {}

    public function __invoke(): JsonResponse
    {
        return $this->json($this->bestMovieService->findBestMovie(), Response::HTTP_OK);
    }
}
