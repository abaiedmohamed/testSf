<?
namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Dto\Movie;

class BaseTestFile extends TestCase
{
    protected function newMovie(string $title, int $id): Movie
    {
        return (new Movie())
            ->setAdult(true)
            ->setTitle($title)
            ->setId($id)
        ;
    }
}
