<?php

namespace App\Tests\Dto;

use App\Dto\Video;
use PHPUnit\Framework\TestCase;

class VideoTest extends TestCase
{
    public function testGettersAndSetters(): void
    {
        $video = new Video();

        $id = 'video_123';
        $iso6391 = 'en';
        $iso31661 = 'US';
        $name = 'Trailer';
        $key = 'abc123';
        $site = 'YouTube';
        $size = '14582';
        $type = 'Trailer';
        $official = true;
        $publishedAt = '2022-01-01T00:00:00Z';

        $video->setId($id)
              ->setIso6391($iso6391)
              ->setIso31661($iso31661)
              ->setName($name)
              ->setKey($key)
              ->setSite($site)
              ->setSize($size)
              ->setType($type)
              ->setOfficial($official)
              ->setPublishedAt($publishedAt);

        $this->assertEquals($id, $video->getId());
        $this->assertEquals($iso6391, $video->getIso6391());
        $this->assertEquals($iso31661, $video->getIso31661());
        $this->assertEquals($name, $video->getName());
        $this->assertEquals($key, $video->getKey());
        $this->assertEquals($site, $video->getSite());
        $this->assertEquals($size, $video->getSize());
        $this->assertEquals($type, $video->getType());
        $this->assertEquals($official, $video->getOfficial());
        $this->assertEquals($publishedAt, $video->getPublishedAt());
    }
}
