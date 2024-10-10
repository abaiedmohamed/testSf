<?

namespace App\Repository;

use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;

final class HttpResult
{
    public static function getResult(string $response, int $statusCode): array
    {
        return [
            'response' => (new Serializer([new ArrayDenormalizer()], [new JsonEncoder()]))->decode($response, 'json'),
            'statusCode' => $statusCode
        ];
    }
}
