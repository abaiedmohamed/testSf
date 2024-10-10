<?

namespace App\Repository;

use App\Utils\Trait\ConfigurationRepositoryTrait;

class SearchMovieRepository extends BaseRepository
{
    use ConfigurationRepositoryTrait;

    public function searchMovies(string $queryParams): array
    {
        return  $this->find($this->httpConfigurations['link'] . $this->httpConfigurations['path_search_movie'] . '?' . $queryParams);
    }
}
