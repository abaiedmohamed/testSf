<?

namespace App\Tests\Repository;

use PHPUnit\Framework\TestCase;
use App\Repository\BaseRepository;
use PHPUnit\Framework\MockObject\MockObject;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Contracts\HttpClient\ResponseInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class BaseRepositoryTest extends TestCase
{
    private MockObject|HttpClientInterface $httpClientMock;
    private MockObject|ParameterBagInterface $paramsMock;
    private BaseRepository $baseRepository;

    protected function setUp(): void
    {
        $this->httpClientMock = $this->createMock(HttpClientInterface::class);

        $this->paramsMock = $this->createMock(ParameterBagInterface::class);

        $this->baseRepository = new BaseRepository(
            $this->httpClientMock,
            $this->paramsMock
        );
    }

    public function testFindReturnsExpectedResult(): void
    {
        $url = 'https://api.themoviedb.org/3/';
        $mockApiKey = 'mocked_api_key';

        $responseMock = $this->createMock(ResponseInterface::class);
        $responseMock->method('getContent')->willReturn(json_encode(['content' => "Bonjour! c'est Mohamed Abaied"]));
        $responseMock->method('getStatusCode')->willReturn(200);

        $this->httpClientMock
            ->expects($this->once())
            ->method('request')
            ->with(
                Request::METHOD_GET,
                $url,
                [
                    'query' => ['api_key' => $mockApiKey]
                ]
            )
            ->willReturn($responseMock);

        $this->paramsMock
            ->method('get')
            ->with('API_KEY_THE_MOVIE_DB')
            ->willReturn($mockApiKey);

        $result = $this->baseRepository->find($url);

        $this->assertIsArray($result);
        $this->assertEquals(['content' => "Bonjour! c'est Mohamed Abaied"], $result['response']);
    }
}
