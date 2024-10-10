<?php

namespace App\Tests\Factory;

use App\Factory\Movie;
use App\Dto\Movie as DtoMovie;
use App\Dto\Video;
use App\Tests\BaseTestFile;

class MovieTest extends BaseTestFile
{
    public function testNewReturnsModifiedMovie(): void
    {
        $dtoMovie = $this->createMock(DtoMovie::class);
        $video = $this->createMock(Video::class);
        $urlPicture = 'https://api.themoviedb.org/3';

        $dtoMovie->method('getBackdropPath')->willReturn('/backdrop.jpg');
        $dtoMovie->method('getPosterPath')->willReturn('/poster.jpg');

        $dtoMovie->expects($this->once())
            ->method('setVideoDetails')
            ->with($video)
            ->willReturn($dtoMovie);

        $dtoMovie->expects($this->once())
            ->method('setBackdropPath')
            ->with($urlPicture . '/backdrop.jpg')
            ->willReturn($dtoMovie);

        $dtoMovie->expects($this->once())
            ->method('setPosterPath')
            ->with($urlPicture . '/poster.jpg')
            ->willReturn($dtoMovie);

        $result = Movie::new($dtoMovie, $video, $urlPicture);

        $this->assertSame($dtoMovie, $result);
    }
}
