<?php

declare(strict_types=1);

namespace JGI\Oneflow\Tests\Provider;

use Http\Client\HttpClient;
use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

trait ProviderTestTrait
{
    /**
     * @param string|null $json
     *
     * @return \PHPUnit\Framework\MockObject\MockObject|HttpClient
     */
    private function getHttpClient(?string $json)
    {
        $httpClientMock = $this->getMockBuilder(Client::class)->getMock();
        $responseMock = $this->getMockBuilder(ResponseInterface::class)->getMock();
        $streamMock = $this->getMockBuilder(StreamInterface::class)->getMock();
        $streamMock->method('getContents')->willReturn($json);
        $responseMock->method('getBody')->willReturn($streamMock);
        $httpClientMock->method('__call')->willReturn($responseMock);

        return $httpClientMock;
    }
}
