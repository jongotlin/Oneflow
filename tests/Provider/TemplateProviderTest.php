<?php

declare(strict_types=1);

namespace JGI\Oneflow\Tests\Provider;

use JGI\Oneflow\Credentials;
use JGI\Oneflow\Model\Collection;
use JGI\Oneflow\Model\Template;
use JGI\Oneflow\Oneflow;
use PHPUnit\Framework\TestCase;

class TemplateProviderTest extends TestCase
{
    use ProviderTestTrait;

    /**
     * @test
     */
    public function it_returns_an_array_of_templates()
    {
        $json = '{
            "collection": [{
                "account": {
                    "id": 395761
                },
                "agreement": {
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
                        "agreement:participant:colleague:create": "allow",
                        "agreement:participant:mfa:create": "allow",
                        "agreement:participant:mfa:update": "allow",
                        "agreement:party:create": "allow",
                        "agreement:remove": "allow",
                        "agreement:tag:use": "allow",
                        "agreement:update:config:comments": "allow",
                        "agreement:update:counterpart_decline": "allow",
                        "agreement:update:expire_date": "deny",
                        "agreement:update:language": "allow",
                        "agreement:update:name": "allow",
                        "agreement:update:template_group_id": "allow",
                        "agreement:update:visible": "allow",
                        "agreement:video:add": "deny",
                        "agreement:video:remove": "deny",
                        "agreement:video:view": "deny",
                        "agreement:view": "allow"
                    },
                    "available_options": {
                        "delivery_channels": [0],
                        "has_default_attachments_box": 0,
                        "has_default_pdf_box": 1,
                        "has_default_products_box": 0,
                        "mfa_channels": ["email"],
                        "naming": false,
                        "sign_methods": [0]
                    },
                    "cancel_timestamp": null,
                    "cancel_timestamp_ts": null,
                    "checksum": "7abd36eed068d68b4f6b52d5b16c59d791ec4b16",
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
                        "id": "28717b31-828c-4a46-ae97-dd126a93d299"
                    },
                    "counterpart_decline": 1,
                    "created": "2020-05-26T08:41:36+0000",
                    "created_by": null,
                    "created_ts": 1590482496,
                    "duration": "12m",
                    "end_date": null,
                    "expiration_count": 0,
                    "expire_date": null,
                    "id": 1160519,
                    "import": 0,
                    "initial_duration": null,
                    "is_shared": false,
                    "language": "sv",
                    "lifecycle": null,
                    "lifecycle_timestamp": null,
                    "lifecycle_timestamp_ts": null,
                    "locked": 0,
                    "name": "Standardmall",
                    "notice_period": "3m",
                    "owner": null,
                    "parent": null,
                    "participants": [],
                    "period_count": 0,
                    "period_end_timestamp": null,
                    "period_end_timestamp_ts": null,
                    "period_start_timestamp": null,
                    "period_start_timestamp_ts": null,
                    "private": 1,
                    "publish_timestamp": null,
                    "publish_timestamp_ts": null,
                    "revision": 8,
                    "shared_with": [],
                    "sign_order": null,
                    "sign_platform": null,
                    "start_date": null,
                    "start_timestamp": null,
                    "start_timestamp_ts": null,
                    "state": 6,
                    "state_timestamp": "2020-05-26T08:41:36+0000",
                    "state_timestamp_ts": 1590482496,
                    "tags": [],
                    "template_group": null,
                    "terminate_timestamp": null,
                    "terminate_timestamp_ts": null,
                    "type": 4,
                    "updated": "2020-05-26T08:42:09+0000",
                    "updated_ts": 1590482529
                },
                "created": "2020-05-26T08:41:36+0000",
                "created_ts": 1590482496,
                "id": 87090,
                "name": "Standardmall",
                "updated": null,
                "updated_ts": null,
                "visible": 1
            }, {
                "account": {
                    "id": 395761
                },
                "agreement": {
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
                        "agreement:participant:colleague:create": "allow",
                        "agreement:participant:mfa:create": "allow",
                        "agreement:participant:mfa:update": "allow",
                        "agreement:party:create": "allow",
                        "agreement:remove": "allow",
                        "agreement:tag:use": "allow",
                        "agreement:update:config:comments": "allow",
                        "agreement:update:counterpart_decline": "allow",
                        "agreement:update:expire_date": "deny",
                        "agreement:update:language": "allow",
                        "agreement:update:name": "allow",
                        "agreement:update:template_group_id": "allow",
                        "agreement:update:visible": "allow",
                        "agreement:video:add": "deny",
                        "agreement:video:remove": "deny",
                        "agreement:video:view": "deny",
                        "agreement:view": "allow"
                    },
                    "available_options": {
                        "delivery_channels": [0],
                        "has_default_attachments_box": 0,
                        "has_default_pdf_box": 1,
                        "has_default_products_box": 0,
                        "mfa_channels": ["email"],
                        "naming": false,
                        "sign_methods": [0]
                    },
                    "cancel_timestamp": null,
                    "cancel_timestamp_ts": null,
                    "checksum": "56b4022bf43eb7084eed82d96f69db289f816a80",
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
                        "id": "ca912f42-3163-40d6-931a-1e158c92b25c"
                    },
                    "counterpart_decline": 1,
                    "created": "2020-05-26T12:44:48+0000",
                    "created_by": 920753,
                    "created_ts": 1590497088,
                    "duration": "12m",
                    "end_date": null,
                    "expiration_count": 0,
                    "expire_date": null,
                    "id": 1161796,
                    "import": 0,
                    "initial_duration": null,
                    "is_shared": false,
                    "language": "sv",
                    "lifecycle": null,
                    "lifecycle_timestamp": null,
                    "lifecycle_timestamp_ts": null,
                    "locked": 0,
                    "name": "namnl\u00f6s",
                    "notice_period": "3m",
                    "owner": {
                        "id": 920753
                    },
                    "parent": null,
                    "participants": [],
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
                    "state": 6,
                    "state_timestamp": "2020-05-26T12:44:48+0000",
                    "state_timestamp_ts": 1590497088,
                    "tags": [],
                    "template_group": null,
                    "terminate_timestamp": null,
                    "terminate_timestamp_ts": null,
                    "type": 4,
                    "updated": "2020-05-26T12:45:06+0000",
                    "updated_ts": 1590497106
                },
                "created": "2020-05-26T12:44:48+0000",
                "created_ts": 1590497088,
                "id": 87130,
                "name": "namnl\u00f6s",
                "updated": "2020-05-26T12:45:15+0000",
                "updated_ts": 1590497115,
                "visible": 1
            }],
            "count": 2
        }';

        $oneflow = new Oneflow(
            $this->getHttpClient($json),
            $this->createMock(Credentials::class)
        );
        $templates = $oneflow->templates()->all();

        $this->assertIsArray($templates);
        $this->assertCount(2, $templates);
        $template = $templates[0];
        $this->assertInstanceOf(Template::class, $template);

        $this->assertEquals(87090, $template->getId());
        $this->assertEquals('Standardmall', $template->getName());
    }
}
