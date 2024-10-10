<?php

namespace App\Tests\Service;

use App\Tests\BaseTestFile;
use App\Service\BestMovieService;
use App\Mapping\BestMovieMapper;
use App\Service\VideoMovieService;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use App\Dto\Movie;

class BestMovieServiceTest extends BaseTestFile
{
    private BestMovieService $bestMovieService;
    private BestMovieMapper $movieMapperMock;
    private VideoMovieService $videoMovieServiceMock;
    private ParameterBagInterface $paramsMock;

    protected function setUp(): void
    {
        $this->movieMapperMock = $this->createMock(BestMovieMapper::class);
        $this->videoMovieServiceMock = $this->createMock(VideoMovieService::class);
        $this->paramsMock = $this->createMock(ParameterBagInterface::class);

        $this->bestMovieService = new BestMovieService(
            $this->movieMapperMock,
            $this->videoMovieServiceMock,
            $this->paramsMock
        );
    }

    public function testFindBestMovie(): void
    {
        $movieId = 1;
        $movie = (new Movie())->setId($movieId);

        $this->movieMapperMock->method('findBestMovie')->willReturn([$movie]);
        $this->videoMovieServiceMock->method('findVideoMovie')->willReturn(null);
        $this->paramsMock->method('get')->willReturn(['link_picture' => 'https://api.themoviedb.org/3/']);

        $result = $this->bestMovieService->findBestMovie();

        $this->assertInstanceOf(Movie::class, $result);
        $this->assertEquals($movieId, $result->getId());
        $this->assertEquals($movie->getBackdropPath(), $result->getBackdropPath());
    }
}
