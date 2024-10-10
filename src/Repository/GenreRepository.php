<?

namespace App\Repository;

use App\Utils\Trait\ConfigurationRepositoryTrait;


class GenreRepository extends BaseRepository
{
    use ConfigurationRepositoryTrait;
    public function findAll(): array
    {
        return $this->find($this->httpConfigurations['link'] . $this->httpConfigurations['path_genre']);
    }
}
