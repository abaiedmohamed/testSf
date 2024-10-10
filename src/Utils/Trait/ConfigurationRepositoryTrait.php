<?

namespace App\Utils\Trait;

use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

trait ConfigurationRepositoryTrait
{
    private array $httpConfigurations;

    public function __construct(private readonly HttpClientInterface $client, private readonly ParameterBagInterface $params)
    {
        parent::__construct($client, $params);
        $this->initializeData();
    }

    /**
     * @param mixed[] $httpConfigurations
     */
    public function initializeData(array $httpConfigurations = []): void
    {
        $this->httpConfigurations = (count($httpConfigurations) > 0) ? (array) $httpConfigurations : (array) $this->params->get('movieDB');
    }
}
