<?

namespace App\Mapping;

use App\Utils\DeserializeAndDenormalizeData;
use App\Dto\Video;
use App\Repository\VideoMovieRepository;

class VideoMovieMapper
{

    public function __construct(private readonly VideoMovieRepository $videoMovieRepository) {}

    public function findVideoMovie(string $idMovie): array
    {
        return (array) DeserializeAndDenormalizeData::initializeSerializer()->denormalize($this->videoMovieRepository->findVideoMovie($idMovie)['response']['results'], Video::class . '[]');
    }
}
