<?

namespace App\Service;

use App\Dto\Video;
use App\Mapping\VideoMovieMapper;

class VideoMovieService
{
    public function __construct(private readonly VideoMovieMapper $videoMovieMapper) {}

    public function findVideoMovie(string $idMovie): ?Video
    {
        return $this->videoMovieMapper->findVideoMovie($idMovie)[0] ?? null;
    }
}
