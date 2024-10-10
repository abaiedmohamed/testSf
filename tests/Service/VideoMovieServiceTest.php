<?php

namespace App\Tests\Service;

use App\Dto\Video;
use App\Mapping\VideoMovieMapper;
use App\Service\VideoMovieService;
use App\Tests\BaseTestFile;
use PHPUnit\Framework\MockObject\MockObject;

class VideoMovieServiceTest extends BaseTestFile
{
    private VideoMovieMapper|MockObject $videoMovieMapperMock;
    private VideoMovieService $videoMovieService;

    protected function setUp(): void
    {
        $this->videoMovieMapperMock = $this->createMock(VideoMovieMapper::class);
        $this->videoMovieService = new VideoMovieService($this->videoMovieMapperMock);
    }

    public function testFindVideoMovieReturnsVideo(): void
    {
        $idMovie = '123';
        $expectedVideo = new Video();
        $expectedVideo->setId('video_123')->setName('Movie Trailer');

        $this->videoMovieMapperMock
            ->expects($this->once())
            ->method('findVideoMovie')
            ->with($idMovie)
            ->willReturn([$expectedVideo]);

        $result = $this->videoMovieService->findVideoMovie($idMovie);

        $this->assertInstanceOf(Video::class, $result);
        $this->assertEquals($expectedVideo, $result);
    }
}
