<?

namespace App\Service;

use App\Repository\GenreRepository;

class GenreService
{

    public function __construct(private readonly GenreRepository $genreRepository) {}

    public function findAll(): array
    {
        return $this->genreRepository->findAll();
    }
}
