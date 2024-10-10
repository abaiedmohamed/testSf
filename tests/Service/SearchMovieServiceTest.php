<?php

namespace App\Tests\Service;

use App\Service\SearchMovieService;
use App\Mapping\SearchMovieMapper;
use App\Service\VideoMovieService;
use App\Tests\BaseTestFile;
use App\Dto\Movie as MovieDto;
use App\Dto\Video;
use PHPUnit\Framework\MockObject\MockObject;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class SearchMovieServiceTest extends BaseTestFile
{
    private SearchMovieMapper|MockObject $searchMovieMapper;
    private VideoMovieService|MockObject $videoMovieService;
    private ParameterBagInterface|MockObject $params;
    private SearchMovieService $searchMovieService;

    protected function setUp(): void
    {
        $this->searchMovieMapper = $this->createMock(SearchMovieMapper::class);
        $this->videoMovieService = $this->createMock(VideoMovieService::class);
        $this->params = $this->createMock(ParameterBagInterface::class);

        $this->searchMovieService = new SearchMovieService(
            $this->searchMovieMapper,
            $this->videoMovieService,
            $this->params
        );
    }

    public function testSearchMovies(): void
    {
        $movie1 = $this->newMovie('Movie 1',1);
        $movie2 = $this->newMovie('Movie 2',2);

        $this->searchMovieMapper->expects($this->once())
            ->method('searchMovies')
            ->with('query')
            ->willReturn([$movie1, $movie2]);

        $video = new Video();
        $this->videoMovieService->expects($this->exactly(2))
            ->method('findVideoMovie')
            ->willReturn($video);

        $this->params->expects($this->exactly(2))
            ->method('get')
            ->with('movieDB')
            ->willReturn(['link_picture' => 'https://image.tmdb.org/t/p/w500/backdrop1.jpg']);

        $movies = $this->searchMovieService->searchMovies('query');

        $this->assertCount(2, $movies);
        $this->assertInstanceOf(MovieDto::class, $movies[0]);
        $this->assertInstanceOf(MovieDto::class, $movies[1]);
    }
}
