<?php

namespace App\Tests\Mapping;

use App\Mapping\SearchMovieMapper;
use App\Repository\SearchMovieRepository;
use App\Dto\Movie;
use App\Tests\BaseTestFile;

class SearchMovieMapperTest extends BaseTestFile
{
    private SearchMovieRepository|MockObject $searchMovieRepositoryMock;
    private SearchMovieMapper $searchMovieMapper;

    protected function setUp(): void
    {
        $this->searchMovieRepositoryMock = $this->createMock(SearchMovieRepository::class);

        $this->searchMovieMapper = new SearchMovieMapper($this->searchMovieRepositoryMock);
    }

    public function testSearchMovies(): void
    {
        $queryParams = 'query=action';
        $fakeApiResponse = [
            'response' => [
                'results' => [
                    ['id' => 1, 'title' => 'Movie 1'],
                    ['id' => 2, 'title' => 'Movie 2'],
                ],
            ],
        ];

        $this->searchMovieRepositoryMock
            ->method('searchMovies')
            ->with($queryParams)
            ->willReturn($fakeApiResponse);

        $result = $this->searchMovieMapper->searchMovies($queryParams);

        $this->assertIsArray($result);
        $this->assertCount(2, $result);
        $this->assertInstanceOf(Movie::class, $result[0]);
        $this->assertEquals('Movie 1', $result[0]->getTitle());
        $this->assertEquals('Movie 2', $result[1]->getTitle());
    }
}
