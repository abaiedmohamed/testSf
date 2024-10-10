<?

namespace App\Repository;

use App\Utils\Trait\ConfigurationRepositoryTrait;

class SearchMovieByGenreRepository extends BaseRepository
{
    use ConfigurationRepositoryTrait;
    
    public function searchMovies(string $genreIds): array
    {
        $response =  $this->find($this->httpConfigurations['link'] . $this->httpConfigurations['path_discover_movie'] . '?' . $genreIds);

        return $response;
    }
}
