<?php

namespace App\Tests\Mapping;

use App\Mapping\BestMovieMapper;
use App\Repository\MovieRepository;
use PHPUnit\Framework\MockObject\MockObject;
use App\Tests\BaseTestFile;

class BestMovieMapperTest extends BaseTestFile
{
    private MovieRepository|MockObject $movieRepositoryMock;
    private BestMovieMapper $bestMovieMapper;

    protected function setUp(): void
    {
        $this->movieRepositoryMock = $this->createMock(MovieRepository::class);
        $this->bestMovieMapper = new BestMovieMapper($this->movieRepositoryMock);
    }

    public function testFindBestMovie(): void
    {
        $fakeApiResponse = [
            'response' => [
                'results' => [
                    [
                        'title' => 'Movie 1',
                        'rating' => 8.5,
                        'release_date' => '2023-01-01'
                    ],
                    [
                        'title' => 'Movie 2',
                        'rating' => 7.2,
                        'release_date' => '2023-02-01'
                    ]
                ]
            ]
        ];

        $this->movieRepositoryMock->expects($this->once())
            ->method('findBestMovie')
            ->willReturn($fakeApiResponse);
        $expectedMovies = [
            $this->newMovie("Movie 1", 1),
            $this->newMovie("Movie 2", 2)
        ];

        $result = $this->bestMovieMapper->findBestMovie();

        $this->assertIsArray($result);
        $this->assertCount(2, $result);
        $this->assertEquals($expectedMovies[0]->getTitle(), $result[0]->getTitle());
        $this->assertEquals($expectedMovies[1]->getTitle(), $result[1]->getTitle());
    }
}
