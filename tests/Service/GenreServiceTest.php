<?php

namespace App\Tests\Service;

use App\Service\GenreService;
use App\Tests\BaseTestFile;
use App\Repository\GenreRepository;
use PHPUnit\Framework\MockObject\MockObject;

class GenreServiceTest extends BaseTestFile
{
    private GenreRepository|MockObject $genreRepositoryMock;
    private GenreService $genreService;

    protected function setUp(): void
    {
        $this->genreRepositoryMock = $this->createMock(GenreRepository::class);
        $this->genreService = new GenreService($this->genreRepositoryMock);
    }

    public function testFindAll(): void
    {
        $genres = [
            ['id' => 1, 'name' => 'Action'],
            ['id' => 2, 'name' => 'Drama']
        ];

        $this->genreRepositoryMock
            ->method('findAll')
            ->willReturn($genres);

        $result = $this->genreService->findAll();

        $this->assertIsArray($result);
        $this->assertSame($genres, $result);
    }
}
