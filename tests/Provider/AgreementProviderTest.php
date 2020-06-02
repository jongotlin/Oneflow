<?php

declare(strict_types=1);

namespace JGI\Oneflow\Tests\Provider;

use JGI\Oneflow\Credentials;
use JGI\Oneflow\Model\Agreement;
use JGI\Oneflow\Oneflow;
use PHPUnit\Framework\TestCase;

class AgreementProviderTest extends TestCase
{
    use ProviderTestTrait;

    /**
     * @test
     */
    public function it_returns_an_array_of_agreements()
    {
        $json = '{
            "collection": [{
                "account": {
                    "id": 395761
                },
                "acl": {
                    "agreement:agreement_value:update:amount": "deny",
                    "agreement:agreement_value:view": "deny",
                    "agreement:box:update:locked": "allow",
                    "agreement:box:update:open": "allow",
                    "agreement:box:update:shared": "allow",
                    "agreement:comment:contact_me": "allow",
                    "agreement:create": "allow",
                    "agreement:layout:update": "allow",
                    "agreement:move": "allow",
                    "agreement:participant:colleague:create": "deny",
                    "agreement:participant:mfa:create": "allow",
                    "agreement:participant:mfa:update": "allow",
                    "agreement:party:create": "allow",
                    "agreement:remove": "allow",
                    "agreement:tag:use": "allow",
                    "agreement:update:config:comments": "allow",
                    "agreement:update:counterpart_decline": "deny",
                    "agreement:update:expire_date": "allow",
                    "agreement:update:language": "allow",
                    "agreement:update:name": "allow",
                    "agreement:update:template_group_id": "deny",
                    "agreement:update:visible": "deny",
                    "agreement:video:add": "allow",
                    "agreement:video:remove": "allow",
                    "agreement:video:view": "allow",
                    "agreement:view": "allow"
                },
                "box_order": [{
                    "id": 16613370
                }],
                "cancel_timestamp": null,
                "cancel_timestamp_ts": null,
                "checksum": "fbb29b92ba372710dc0defe844817feaa09648da",
                "collections": [{
                    "account": {
                        "id": 395761
                    },
                    "agreement_value_enabled": false,
                    "branding_country": null,
                    "branding_name": null,
                    "branding_orgnr": null,
                    "created": "2020-05-26T08:40:57+0000",
                    "created_ts": 1590482457,
                    "currency": "SEK",
                    "description": null,
                    "id": 401319,
                    "logo": null,
                    "name": "oneflow-collection",
                    "type": "sales",
                    "updated": null,
                    "updated_ts": null
                }],
                "config": {
                    "comments": true,
                    "default_delivery_channel": 0,
                    "default_mfa_channel": null,
                    "default_party_type": 0,
                    "default_sign_method": 0,
                    "expire_date_days": 14,
                    "id": "249de2ef-a662-4f02-b518-1fbd1cd4ed1a"
                },
                "counterpart_decline": 1,
                "created": "2020-05-29T09:15:47+0000",
                "created_by": 920753,
                "created_ts": 1590743747,
                "duration": "12m",
                "end_date": null,
                "expiration_count": 0,
                "expire_date": null,
                "id": 1168244,
                "import": 0,
                "initial_duration": null,
                "is_shared": false,
                "language": "sv",
                "lifecycle": null,
                "lifecycle_timestamp": null,
                "lifecycle_timestamp_ts": null,
                "locked": 0,
                "name": "Avtalsnamn",
                "notice_period": "3m",
                "owner": {
                    "id": 920753
                },
                "parent": {
                    "id": 1160519
                },
                "parties": [{
                    "agreement": {
                        "id": 1168244
                    },
                    "consumer": 0,
                    "country": "SE",
                    "created": "2020-05-29T09:15:47+0000",
                    "created_ts": 1590743747,
                    "email": null,
                    "id": 2006275,
                    "name": "LeanLink",
                    "orgnr": null,
                    "participants": [{
                        "account": {
                            "id": 395761
                        },
                        "agreement": {
                            "id": 1168244
                        },
                        "agreement_company": {
                            "id": 2006275
                        },
                        "country": null,
                        "created": "2020-05-29T09:15:47+0000",
                        "created_ts": 1590743747,
                        "delegated": 0,
                        "delivery_channel": 0,
                        "delivery_channel_status": null,
                        "delivery_channel_status_timestamp": null,
                        "delivery_channel_status_timestamp_ts": null,
                        "delivery_channel_verified": 0,
                        "email": "jon.gotlin@leanlink.io",
                        "first_visit": "2020-05-29T09:15:47+0000",
                        "first_visit_ts": 1590743747,
                        "fullname": "Jon Gotlin",
                        "has_access": true,
                        "id": 2441535,
                        "is_published": true,
                        "last_visit": "2020-05-29T09:15:47+0000",
                        "last_visit_ts": 1590743747,
                        "mfa_channel": null,
                        "phone_number": null,
                        "position": {
                            "id": 920753
                        },
                        "published_at": "2020-05-29T09:15:47+0000",
                        "published_at_ts": 1590743747,
                        "self": 1,
                        "sign_method": 0,
                        "ssn": null,
                        "state": 0,
                        "state_timestamp": "2020-05-29T09:15:47+0000",
                        "state_timestamp_ts": 1590743747,
                        "title": null,
                        "type": 1,
                        "type_timestamp": "2020-05-29T09:15:47+0000",
                        "type_timestamp_ts": 1590743747,
                        "updated": "2020-05-29T09:15:47+0000",
                        "updated_ts": 1590743747,
                        "visits": 1
                    }],
                    "phone_number": null,
                    "self": 1,
                    "state": 0,
                    "state_timestamp": null,
                    "state_timestamp_ts": null,
                    "updated": null,
                    "updated_ts": null
                }, {
                    "agreement": {
                        "id": 1168244
                    },
                    "consumer": 1,
                    "country": "SE",
                    "created": "2020-05-29T09:15:47+0000",
                    "created_ts": 1590743747,
                    "email": "jon@jon.se",
                    "id": 2006276,
                    "name": "Jonas Edbom",
                    "orgnr": "111111111111",
                    "participants": [{
                        "account": null,
                        "agreement": {
                            "id": 1168244
                        },
                        "agreement_company": {
                            "id": 2006276
                        },
                        "country": "SE",
                        "created": "2020-05-29T09:15:47+0000",
                        "created_ts": 1590743747,
                        "delegated": 0,
                        "delivery_channel": 0,
                        "delivery_channel_status": null,
                        "delivery_channel_status_timestamp": null,
                        "delivery_channel_status_timestamp_ts": null,
                        "delivery_channel_verified": 0,
                        "email": "jon@jon.se",
                        "first_visit": null,
                        "first_visit_ts": null,
                        "fullname": "Jonas Edbom",
                        "id": 2441536,
                        "is_published": false,
                        "last_visit": null,
                        "last_visit_ts": null,
                        "mfa_channel": null,
                        "phone_number": null,
                        "position": null,
                        "published_at": null,
                        "published_at_ts": null,
                        "sign_method": 0,
                        "ssn": "111111111111",
                        "state": 0,
                        "state_timestamp": "2020-05-29T09:15:47+0000",
                        "state_timestamp_ts": 1590743747,
                        "title": null,
                        "type": 1,
                        "type_timestamp": "2020-05-29T09:15:47+0000",
                        "type_timestamp_ts": 1590743747,
                        "updated": null,
                        "updated_ts": null,
                        "visits": 0
                    }],
                    "phone_number": null,
                    "state": 0,
                    "state_timestamp": null,
                    "state_timestamp_ts": null,
                    "updated": null,
                    "updated_ts": null
                }],
                "period_count": 0,
                "period_end_timestamp": null,
                "period_end_timestamp_ts": null,
                "period_start_timestamp": null,
                "period_start_timestamp_ts": null,
                "private": 1,
                "publish_timestamp": null,
                "publish_timestamp_ts": null,
                "revision": 3,
                "shared_with": [],
                "sign_order": null,
                "sign_platform": null,
                "start_date": null,
                "start_timestamp": null,
                "start_timestamp_ts": null,
                "state": 0,
                "state_timestamp": "2020-05-29T09:15:47+0000",
                "state_timestamp_ts": 1590743747,
                "tags": [],
                "template_group": null,
                "terminate_timestamp": null,
                "terminate_timestamp_ts": null,
                "type": 4,
                "updated": "2020-05-29T09:15:56+0000",
                "updated_ts": 1590743756
            }],
            "count": 1
        }';

        $oneflow = new Oneflow(
            $this->getHttpClient($json),
            $this->createMock(Credentials::class)
        );
        $agreements = $oneflow->agreements()->all();

        $this->assertIsArray($agreements);
        $this->assertCount(1, $agreements);
        $agreement = $agreements[0];
        $this->assertInstanceOf(Agreement::class, $agreement);
        $this->assertEquals(1168244, $agreement->getId());
        $this->assertEquals('Avtalsnamn', $agreement->getName());

        $this->assertCount(2, $agreement->getParties());
        $this->assertEquals('LeanLink', $agreement->getParties()[0]->getName());
        $this->assertCount(1, $agreement->getParties()[0]->getParticipants());
        $this->assertEquals('Jon Gotlin', $agreement->getParties()[0]->getParticipants()[0]->getName());
        $this->assertEquals(2441535, $agreement->getParties()[0]->getParticipants()[0]->getId());
        $this->assertEquals('jon.gotlin@leanlink.io', $agreement->getParties()[0]->getParticipants()[0]->getEmail());
        $this->assertEquals(920753, $agreement->getParties()[0]->getParticipants()[0]->getPositionId());

        $this->assertEquals('Jonas Edbom', $agreement->getParties()[1]->getName());
        $this->assertCount(1, $agreement->getParties()[1]->getParticipants());
        $this->assertEquals('Jonas Edbom', $agreement->getParties()[1]->getParticipants()[0]->getName());
        $this->assertEquals(2441536, $agreement->getParties()[1]->getParticipants()[0]->getId());
        $this->assertEquals('jon@jon.se', $agreement->getParties()[1]->getParticipants()[0]->getEmail());
        $this->assertNull($agreement->getParties()[1]->getParticipants()[0]->getPositionId());
    }
}
