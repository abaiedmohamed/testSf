<?

namespace App\Repository;

use App\Utils\Trait\ConfigurationRepositoryTrait;

class MovieRepository extends BaseRepository
{
    use ConfigurationRepositoryTrait;
    public function findBestMovie(): array
    {
        $response =  $this->find($this->httpConfigurations['link'] . $this->httpConfigurations['path_top_rated_movie']);

        return $response;
    }
}
