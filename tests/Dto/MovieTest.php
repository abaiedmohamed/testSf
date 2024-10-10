<?php

namespace App\Tests\Dto;

use PHPUnit\Framework\TestCase;
use App\Dto\Movie;
use App\Dto\Video;

class MovieTest extends TestCase
{
    private Movie $movie;

    protected function setUp(): void
    {
        $this->movie = new Movie();
    }

    public function testSetAndGetId(): void
    {
        $this->movie->setId(1);
        $this->assertEquals(1, $this->movie->getId());
    }

    public function testSetAndGetAdult(): void
    {
        $this->movie->setAdult(true);
        $this->assertTrue($this->movie->getAdult());
        
        $this->movie->setAdult(false);
        $this->assertFalse($this->movie->getAdult());
    }

    public function testSetAndGetBackdropPath(): void
    {
        $this->movie->setBackdropPath('/path/to/backdrop.jpg');
        $this->assertEquals('/path/to/backdrop.jpg', $this->movie->getBackdropPath());

        $this->movie->setBackdropPath(null);
        $this->assertNull($this->movie->getBackdropPath());
    }

    public function testSetAndGetGenreIds(): void
    {
        $genreIds = [28, 12];
        $this->movie->setGenreIds($genreIds);
        $this->assertEquals($genreIds, $this->movie->getGenrIds());
    }

    public function testSetAndGetOriginalLanguage(): void
    {
        $this->movie->setOriginalLanguage('en');
        $this->assertEquals('en', $this->movie->getOriginalLanguage());
    }

    public function testSetAndGetOriginalTitle(): void
    {
        $this->movie->setOriginalTitle('Original Title');
        $this->assertEquals('Original Title', $this->movie->getOriginalTitle());
    }

    public function testSetAndGetOverview(): void
    {
        $this->movie->setOverview('This is a movie overview.');
        $this->assertEquals('This is a movie overview.', $this->movie->getOverview());
    }

    public function testSetAndGetPopularity(): void
    {
        $this->movie->setPopularity(5.5);
        $this->assertEquals(5.5, $this->movie->getPopularity());
    }

    public function testSetAndGetPosterPath(): void
    {
        $this->movie->setPosterPath('/path/to/poster.jpg');
        $this->assertEquals('/path/to/poster.jpg', $this->movie->getPosterPath());

        $this->movie->setPosterPath(null);
        $this->assertNull($this->movie->getPosterPath());
    }

    public function testSetAndGetReleaseDate(): void
    {
        $this->movie->setReleaseDate('2024-01-01');
        $this->assertEquals('2024-01-01', $this->movie->getReleaseDate());
    }

    public function testSetAndGetTitle(): void
    {
        $this->movie->setTitle('Movie Title');
        $this->assertEquals('Movie Title', $this->movie->getTitle());
    }

    public function testSetAndGetVideo(): void
    {
        $this->movie->setVideo(true);
        $this->assertTrue($this->movie->getVideo());
        
        $this->movie->setVideo(false);
        $this->assertFalse($this->movie->getVideo());
    }

    public function testSetAndGetVoteAverage(): void
    {
        $this->movie->setVoteAverage(8.3);
        $this->assertEquals(8.3, $this->movie->getVoteAverage());
    }

    public function testSetAndGetVoteCount(): void
    {
        $this->movie->setVoteCount(100);
        $this->assertEquals(100, $this->movie->getVoteCount());
    }

    public function testSetAndGetVideoDetails(): void
    {
        $videoDetails = new Video(); // Assuming you have a proper Video class
        $this->movie->setVideoDetails($videoDetails);
        $this->assertSame($videoDetails, $this->movie->getVideoDetails());
        
        $this->movie->setVideoDetails(null);
        $this->assertNull($this->movie->getVideoDetails());
    }
}
