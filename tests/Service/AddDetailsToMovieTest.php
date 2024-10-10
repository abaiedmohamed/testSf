<?php

namespace App\Tests\Service;

use App\Dto\Movie as DtoMovie;
use App\Service\AddDetailsToMovie;
use App\Service\VideoMovieService;
use App\Dto\Video;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use App\Tests\BaseTestFile;

class AddDetailsToMovieTest extends BaseTestFile
{
    public function testAddDetails(): void
    {
        $videoMovieService = $this->createMock(VideoMovieService::class);

        $video = new Video();
        $videoMovieService->method('findVideoMovie')
            ->willReturn($video);

        $params = $this->createMock(ParameterBagInterface::class);

        $params->method('get')
            ->with('movieDB')
            ->willReturn(['link_picture' => 'https://image.tmdb.org/t/p/w500/backdrop1.jpg']);

        $moviesWithoutMapper = [
            'response' => [
                'results' => [
                    $this->newMovie('Movie 1',1),
                    $this->newMovie('Movie 2',2),
                ]
            ]
        ];

        $movies = AddDetailsToMovie::addDetails($moviesWithoutMapper, $videoMovieService, $params);

        $this->assertCount(2, $movies);  
        $this->assertInstanceOf(DtoMovie::class, $movies[0]);
        $this->assertInstanceOf(DtoMovie::class, $movies[1]);
    }
}
