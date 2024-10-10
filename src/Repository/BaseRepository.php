<?

namespace App\Repository;

use Symfony\Contracts\HttpClient\HttpClientInterface;
use App\Repository\Interface\HttpDataInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class BaseRepository implements HttpDataInterface
{

    public function __construct(
        private readonly HttpClientInterface $client,
        private readonly ParameterBagInterface $params
    ) {}

    public function find(string $url): array
    {

        $response = $this->client->request(
            Request::METHOD_GET,
            $url,
            $this->getQueryParams()
        );

        return HttpResult::getResult($response->getContent(true), $response->getStatusCode());
    }

    private function getQueryParams(): array
    {
        $query = [
            'query' => [
                'api_key' => $this->params->get('API_KEY_THE_MOVIE_DB'),
            ]
        ];

        return $query;
    }
}
