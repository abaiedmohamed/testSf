<?php

namespace App\Tests\Mapping;

use PHPUnit\Framework\MockObject\MockObject;
use App\Tests\BaseTestFile;
use App\Mapping\SearchMovieByGenreMapper;
use App\Repository\SearchMovieByGenreRepository;

class SearchMovieByGenreMapperTest extends BaseTestFile
{
    private MockObject|SearchMovieByGenreRepository $searchMovieByGenreRepositoryMock;
    private SearchMovieByGenreMapper $searchMovieByGenreMapper;

    protected function setUp(): void
    {
        $this->searchMovieByGenreRepositoryMock = $this->createMock(SearchMovieByGenreRepository::class);
        $this->searchMovieByGenreMapper = new SearchMovieByGenreMapper($this->searchMovieByGenreRepositoryMock);
    }

    public function testSearchMovies(): void
    {
        $genreIds = 'with_genres=28,12';
        $fakeApiResponse = [
            'response' => [
                'results' => [
                    [
                        'id' => 1,
                        'title' => 'Movie 1',
                        'genre_ids' => [28],
                    ],
                    [
                        'id' => 2,
                        'title' => 'Movie 2',
                        'genre_ids' => [12],
                    ]
                ]
            ]
        ];

        $this->searchMovieByGenreRepositoryMock->expects($this->exactly(2))
            ->method('searchMovies')
            ->with($genreIds)
            ->willReturn($fakeApiResponse);

        $expectedMovies = [
            $this->newMovie("Movie 1",1 ),
            $this->newMovie("Movie 2", 2)
        ];

        $result = $this->searchMovieByGenreMapper->searchMovies($genreIds);

        $this->assertIsArray($result);
        $this->assertArrayHasKey('response', $result);
        $this->assertArrayHasKey('results', $result['response']);
        $this->assertCount(2, $result['response']['results']);
        $this->assertEquals($expectedMovies[0]->getTitle(), $result['response']['results'][0]->getTitle());
    }
}
