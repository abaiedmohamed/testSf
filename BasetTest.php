<?
namespace App\Tests\Mapping;

use PHPUnit\Framework\TestCase;
use App\Dto\Movie;
use App\Utils\DeserializeAndDenormalizeData;

class BaseMapper extends TestCase
{
    protected function mockStaticMethodForDeserializeAndDenormalizeData(): void
    {
        $serializerMethod = new \ReflectionMethod(DeserializeAndDenormalizeData::class, 'initializeSerializer');
        $serializerMethod->setAccessible(true);
        $serializerMethod->invoke(null);
    }

    protected function newMovie(string $title): Movie
    {
        return (new Movie())
            ->setAdult(true)
            ->setTitle($title)
        ;
    }
}