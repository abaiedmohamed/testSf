<?

namespace App\Utils;

use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Serializer;

final readonly class DeserializeAndDenormalizeData
{
    public static function initializeSerializer(): Serializer
    {
        return new Serializer([new ArrayDenormalizer(), new ObjectNormalizer()]);
    }
}
