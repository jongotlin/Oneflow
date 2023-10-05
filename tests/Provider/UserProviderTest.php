<?php

declare(strict_types=1);

namespace JGI\Oneflow\Tests\Provider;

use JGI\Oneflow\Credentials;
use JGI\Oneflow\Model\User;
use JGI\Oneflow\Oneflow;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\MockResponse;

class UserProviderTest extends TestCase
{

    /**
     * @test
     */
    public function user_provider()
    {
        $json = $this->getJson();

        $oneflow = new Oneflow(
            new MockHttpClient(new MockResponse($json)),
            $this->createMock(Credentials::class)
        );

        $users = $oneflow->users()->index();

        $this->assertIsArray($users);
        $this->assertCount(1, $users);

        /** @var User $user */
        $user = $users[0];
        $this->assertInstanceOf(User::class, $user);

        $this->assertEquals('416055', $user->getId());
        $this->assertEquals('John Doe', $user->getName());
        $this->assertEquals('john.doe@test.io', $user->getEmail());
        $this->assertEquals(true, $user->isAdmin());
        $this->assertEquals('registered', $user->getState());
        $this->assertEquals('', $user->getPhoneNumber());
        $this->assertEquals('VD', $user->getTitle());
    }

    private function getJson()
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
                    "href": "https://api.oneflow.com/v1/users?limit=100&offset=0"
                }
            },
            "count": 1,
            "data": [
                {
                    "_links": {
                        "self": {
                            "href": "https://api.oneflow.com/v1/users/416055"
                        }
                    },
                    "active": true,
                    "email": "john.doe@test.io",
                    "id": 416055,
                    "is_admin": true,
                    "name": "John Doe",
                    "phone_number": "",
                    "state": "registered",
                    "title": "VD"
                }
            ]
        }';
    }
}
