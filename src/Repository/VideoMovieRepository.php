<?

namespace App\Repository;

use App\Utils\Trait\ConfigurationRepositoryTrait;

class VideoMovieRepository extends BaseRepository
{
    use ConfigurationRepositoryTrait;

    public function findVideoMovie(string $idMovie): array
    {
        return $this->find($this->httpConfigurations['link'] . $this->httpConfigurations['path_movie'] . "/$idMovie/" . $this->httpConfigurations['path_videos']);
    }
}
