<?php

declare(strict_types=1);

namespace JGI\Oneflow\Tests\Provider;

use JGI\Oneflow\Credentials;
use JGI\Oneflow\Model\Agreement;
use JGI\Oneflow\Model\Collection;
use JGI\Oneflow\Oneflow;
use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

class CollectionProviderTest extends TestCase
{
    use ProviderTestTrait;

    /**
     * @test
     */
    public function it_returns_an_array_of_collections()
    {
        $json = '{
            "collection": [{
                "account": {
                    "country": "SE",
                    "created": "2020-05-26T08:40:57+0000",
                    "created_ts": 1590482457,
                    "id": 395761,
                    "is_customer": false,
                    "is_demo": true,
                    "locked": 0,
                    "logo_url": null,
                    "name": "LeanLink",
                    "orgnr": null,
                    "phone_number": null,
                    "trial": false,
                    "trial_end_timestamp": null,
                    "trial_end_timestamp_ts": null,
                    "updated": "2020-05-26T08:48:21+0000",
                    "updated_ts": 1590482901
                },
                "acl": {
                    "position:group:create": "allow",
                    "position:group:remove": "allow",
                    "position:message:template:create": "allow",
                    "position:message:template:view": "allow",
                    "position:mfa": "deny",
                    "position:mfa:email": "deny",
                    "position:mfa:sms": "deny",
                    "position:setting:update": "allow",
                    "position:update:active": "allow",
                    "position:update:email": "deny",
                    "position:update:fullname": "allow",
                    "position:update:language": "allow",
                    "position:update:password": "deny",
                    "position:update:phone_number": "allow",
                    "position:update:signature": "allow",
                    "position:update:title": "allow",
                    "position:update:user_role": "allow"
                },
                "active": 1,
                "created": "2020-05-26T08:40:57+0000",
                "created_ts": 1590482457,
                "email": "jon.gotlin@leanlink.io",
                "fullname": "Jon Gotlin",
                "groups": [{
                    "account": {
                        "id": 395761
                    },
                    "created": "2020-05-26T08:40:57+0000",
                    "created_ts": 1590482457,
                    "id": 231397,
                    "name": "oneflow-users",
                    "system_type": "directory",
                    "updated": null,
                    "updated_ts": null
                }],
                "has_mfa": false,
                "has_password": true,
                "id": 920753,
                "language": "sv",
                "last_visit_timestamp": "2020-06-02T08:38:04+0000",
                "last_visit_timestamp_ts": 1591087084,
                "login_timestamp": "2020-05-26T10:59:04+0000",
                "login_timestamp_ts": 1590490744,
                "mfa_channel": null,
                "phone_number": null,
                "puid": "92d4ab4e-13fa-4def-9d51-36de2e25502a",
                "register_timestamp": "2020-05-26T08:41:37+0000",
                "register_timestamp_ts": 1590482497,
                "signature": null,
                "state": 3,
                "title": null,
                "updated": "2020-06-02T08:38:04+0000",
                "updated_ts": 1591087084,
                "user": {
                    "created": "2020-05-26T08:40:57+0000",
                    "created_ts": 1590482457,
                    "email": "jon.gotlin@leanlink.io",
                    "id": 928477,
                    "last_visit_timestamp": "2020-06-02T08:38:04+0000",
                    "last_visit_timestamp_ts": 1591087084,
                    "login_timestamp": "2020-05-26T10:59:04+0000",
                    "login_timestamp_ts": 1590490744,
                    "puid": "92d4ab4e-13fa-4def-9d51-36de2e25502a",
                    "register_timestamp": "2020-05-26T08:41:37+0000",
                    "register_timestamp_ts": 1590482497,
                    "state": 3,
                    "updated": null,
                    "updated_ts": null
                },
                "user_role": "administrator"
            }],
            "count": 1
        }';

        $oneflow = new Oneflow(
            $this->getHttpClient($json),
            $this->createMock(Credentials::class)
        );
        $collections = $oneflow->collections()->all();

        $this->assertIsArray($collections);
        $this->assertCount(1, $collections);
        $collection = $collections[0];
        $this->assertInstanceOf(Collection::class, $collection);

        $this->assertEquals(920753, $collection->getId());
        $this->assertNull($collection->getName());
    }
}
