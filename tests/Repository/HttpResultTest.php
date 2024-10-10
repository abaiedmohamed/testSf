<?php

namespace App\Tests\Repository;

use PHPUnit\Framework\TestCase;
use App\Repository\HttpResult;

class HttpResultTest extends TestCase
{
    public function testGetResult()
    {
        $jsonResponse = json_encode([
            'title' => 'Movie 1',
            'genres' => ['Action', 'Adventure']
        ]);

        $statusCode = 200;

        $result = HttpResult::getResult($jsonResponse, $statusCode);

        $expectedResponse = [
            'title' => 'Movie 1',
            'genres' => ['Action', 'Adventure']
        ];

        $this->assertArrayHasKey('response', $result);
        $this->assertArrayHasKey('statusCode', $result);
        $this->assertEquals($expectedResponse, $result['response']);
        $this->assertEquals($statusCode, $result['statusCode']);
    }
}
