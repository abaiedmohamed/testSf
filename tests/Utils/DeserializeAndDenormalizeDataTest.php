<?php

namespace App\Tests\Utils;

use App\Utils\DeserializeAndDenormalizeData;
use Symfony\Component\Serializer\Serializer;
use App\Tests\BaseTestFile;

class DeserializeAndDenormalizeDataTest extends BaseTestFile
{
    public function testInitializeSerializerReturnsCorrectSerializerInstance(): void
    {
        $serializer = DeserializeAndDenormalizeData::initializeSerializer();

        $this->assertInstanceOf(Serializer::class, $serializer);
    }
}

