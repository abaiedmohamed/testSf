<?

namespace App\Mapping;

use App\Dto\Movie;
use App\Repository\MovieRepository;
use App\Utils\DeserializeAndDenormalizeData;

class BestMovieMapper
{
    public function __construct(private readonly MovieRepository $movieRepository) {}

    public function findBestMovie(): array
    {
        return (array) DeserializeAndDenormalizeData::initializeSerializer()->denormalize($this->movieRepository->findBestMovie()['response']['results'], Movie::class . '[]');
    }
}
