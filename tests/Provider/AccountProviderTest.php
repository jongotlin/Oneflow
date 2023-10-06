<?php

declare(strict_types=1);

namespace JGI\Oneflow\Tests\Provider;

use JGI\Oneflow\Credentials;
use JGI\Oneflow\Oneflow;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\MockResponse;

class AccountProviderTest extends TestCase
{
    /**
     * @test
     */
    public function account_provider()
    {
        $json = $this->getJson();

        $oneflow = new Oneflow(
            new MockHttpClient(new MockResponse($json)),
            $this->createMock(Credentials::class)
        );

        $account = $oneflow->account()->index();

        $this->assertEquals('392610', $account->getId());
        $this->assertEquals('LeanLink AB', $account->getName());
        $this->assertEquals('SE', $account->getCountryCode());
        $this->assertEquals('581978-XXXX', $account->getRegistrationNumber());
    }

    private function getJson(): string
    {
        return '{
            "_links": {
                "self": {
                    "href": "https://api.oneflow.com/v1/accounts/me"
                }
            },
            "country_code": "SE",
            "created_time": "2018-11-28T15:07:11+00:00",
            "id": 392610,
            "name": "LeanLink AB",
            "registration_number": "581978-XXXX",
            "token_info": {
                "integration": {
                    "id": null,
                    "key": "custom"
                }
            },
            "updated_time": "2022-05-16T12:09:25+00:00"
        }';
    }
}
