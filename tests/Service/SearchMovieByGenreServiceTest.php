<?php

namespace App\Tests\Service;

use App\Mapping\SearchMovieByGenreMapper;
use App\Service\SearchMovieByGenreService;
use App\Service\VideoMovieService;
use App\Dto\Movie as DtoMovie;
use App\Tests\BaseTestFile;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class SearchMovieByGenreServiceTest extends BaseTestFile
{
    private SearchMovieByGenreMapper|MockObject $searchMovieByGenreMapperMock;
    private VideoMovieService|MockObject $videoMovieServiceMock;
    private ParameterBagInterface|MockObject $paramsMock;
    private SearchMovieByGenreService $searchMovieByGenreService;

    protected function setUp(): void
    {
        $this->searchMovieByGenreMapperMock = $this->createMock(SearchMovieByGenreMapper::class);
        $this->videoMovieServiceMock = $this->createMock(VideoMovieService::class);
        $this->paramsMock = $this->createMock(ParameterBagInterface::class);

        $this->searchMovieByGenreService = new SearchMovieByGenreService(
            $this->searchMovieByGenreMapperMock,
            $this->videoMovieServiceMock,
            $this->paramsMock
        );
    }

    public function testSearchMovies(): void
    {
        $genreIds = '28,12';
        $movie1 = (new DtoMovie())
            ->setId(1)
            ->setBackdropPath('/backdrop1.jpg')
            ->setPosterPath('/poster1.jpg');
        $movie2 = (new DtoMovie())
            ->setId(2)
            ->setBackdropPath('/backdrop2.jpg')
            ->setPosterPath('/poster2.jpg');

        $moviesArray = [
            'response' => [
                'results' => [$movie1, $movie2]
            ]
        ];

        $this->searchMovieByGenreMapperMock
            ->method('searchMovies')
            ->with($genreIds)
            ->willReturn($moviesArray);

        $this->videoMovieServiceMock
            ->method('findVideoMovie')
            ->willReturn(null);

        $this->paramsMock
            ->method('get')
            ->with('movieDB')
            ->willReturn(['link_picture' => 'https://image.tmdb.org/t/p/w500']);

        $result = $this->searchMovieByGenreService->searchMovies($genreIds);

        $this->assertIsArray($result);
        $this->assertArrayHasKey('response', $result);
        $this->assertArrayHasKey('results', $result['response']);
        $this->assertCount(2, $result['response']['results']);

        $firstMovie = $result['response']['results'][0];
        $secondMovie = $result['response']['results'][1];

        $this->assertEquals('https://image.tmdb.org/t/p/w500/backdrop1.jpg', $firstMovie->getBackdropPath());
        $this->assertEquals('https://image.tmdb.org/t/p/w500/poster1.jpg', $firstMovie->getPosterPath());
        $this->assertEquals('https://image.tmdb.org/t/p/w500/backdrop2.jpg', $secondMovie->getBackdropPath());
        $this->assertEquals('https://image.tmdb.org/t/p/w500/poster2.jpg', $secondMovie->getPosterPath());
    }
}
