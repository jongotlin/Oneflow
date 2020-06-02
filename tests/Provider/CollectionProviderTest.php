<?php

declare(strict_types=1);

namespace JGI\Oneflow\Tests\Provider;

use JGI\Oneflow\Credentials;
use JGI\Oneflow\Model\Collection;
use JGI\Oneflow\Oneflow;
use PHPUnit\Framework\TestCase;

class CollectionProviderTest extends TestCase
{
    use ProviderTestTrait;

    /**
     * @test
     */
    public function it_returns_an_array_of_collections()
    {
        $json = '[{
            "id": 401319,
            "name": "oneflow-collection",
            "permissions": {
                "agreement:create": true
            }
        }, {
            "id": 401326,
            "name": "test",
            "permissions": {
                "agreement:create": true
            }
        }]';

        $oneflow = new Oneflow(
            $this->getHttpClient($json),
            $this->createMock(Credentials::class)
        );
        $collections = $oneflow->collections()->all();

        $this->assertIsArray($collections);
        $this->assertCount(2, $collections);
        $collection = $collections[0];
        $this->assertInstanceOf(Collection::class, $collection);

        $this->assertEquals(401319, $collection->getId());
        $this->assertEquals('oneflow-collection', $collection->getName());
    }
}
