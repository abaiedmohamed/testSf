<?

namespace App\Mapping;

use App\Utils\DeserializeAndDenormalizeData;
use App\Repository\SearchMovieRepository;
use App\Dto\Movie;

class SearchMovieMapper
{

    public function __construct(private readonly SearchMovieRepository $searchMovieRepository) {}

    public function searchMovies(string $queryParams): array
    {
        return (array) DeserializeAndDenormalizeData::initializeSerializer()->denormalize($this->searchMovieRepository->searchMovies($queryParams)['response']['results'], Movie::class . '[]');
    }
}
