<?

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Service\GenreService;

/**
 * @Route("/api/genre", options={"expose"=true}, methods={"GET"})
 */
class GenreController extends AbstractController
{

    public function __construct(public readonly GenreService $genreService) {}

    public function __invoke(): JsonResponse
    {
        return $this->json(($this->genreService->findAll()));
    }
}
