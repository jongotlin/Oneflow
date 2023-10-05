<?php

declare(strict_types=1);

namespace JGI\Oneflow\Tests\Provider;

use JGI\Oneflow\Credentials;
use JGI\Oneflow\Model\Workspace;
use JGI\Oneflow\Oneflow;
use PHPUnit\Framework\TestCase;

class WorkspaceProviderTest extends TestCase
{
    use ProviderTestTrait;

    /**
     * @test
     */
    public function workspace_provider()
    {
        $json = $this->getJson();

        $oneflow = new Oneflow(
            $this->getHttpClient($json),
            $this->createMock(Credentials::class)
        );

        $workspaces = $oneflow->workspaces()->index();

        $this->assertIsArray($workspaces);
        $this->assertCount(1, $workspaces);

        /** @var Workspace $user */
        $workspace = $workspaces[0];
        $this->assertInstanceOf(Workspace::class, $workspace);

        $this->assertEquals('396198', $workspace->getId());
        $this->assertEquals('oneflow-collection', $workspace->getName());
        $this->assertEquals('LL', $workspace->getCompanyName());
        $this->assertEquals('SE', $workspace->getCountryCode());
        $this->assertEquals('1234-567', $workspace->getRegistrationNumber());
        $this->assertEquals('', $workspace->getDescription());
        $this->assertEquals('', $workspace->getDateFormat());
    }

    private function getJson(): string
    {
        return '{
            "_links": {
                "next": {
                    "href": null
                },
                "previous": {
                    "href": null
                },
                "self": {
                    "href": "https://api.oneflow.com/v1/workspaces?limit=100&offset=0"
                }
            },
            "count": 1,
            "data": [
                {
                    "_links": {
                        "self": {
                            "href": "https://api.oneflow.com/v1/workspaces/396198"
                        }
                    },
                    "_permissions": {
                        "contract:create": true
                    },
                    "company_name": "LL",
                    "country_code": "SE",
                    "created_time": "2018-11-28T15:07:11+00:00",
                    "date_format": "",
                    "description": "",
                    "id": 396198,
                    "name": "oneflow-collection",
                    "registration_number": "1234-567",
                    "updated_time": null
                }
            ]
        }';
    }
}
