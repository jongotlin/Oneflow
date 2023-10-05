<?php

declare(strict_types=1);

namespace JGI\Oneflow\Tests\Provider;

use JGI\Oneflow\Credentials;
use JGI\Oneflow\Model\Contract;
use JGI\Oneflow\Oneflow;
use PHPUnit\Framework\TestCase;

class ContractProviderTest extends TestCase
{
    use ProviderTestTrait;

    /**
     * @test
     */
    public function contract_provider()
    {
        $json = $this->getJson();

        $oneflow = new Oneflow(
            $this->getHttpClient($json),
            $this->createMock(Credentials::class)
        );
        $contracts = $oneflow->contracts()->index();

        $this->assertIsArray($contracts);
        $this->assertCount(1, $contracts);
        $contract = $contracts[0];
        $this->assertInstanceOf(Contract::class, $contract);
        $this->assertEquals(51874, $contract->getId());
    }

    private function getJson()
    {
        return '{
            "_links": {
                "next": {
                    "href": "https://api.oneflow.com/v1/contracts?offset=1&limit=1"
                },
                "previous": {
                    "href": null
                },
                "self": {
                    "href": "https://api.oneflow.com/v1/contracts?offset=0&limit=1"
                }
            },
            "count": 1,
            "data": [
                {
                    "_links": {
                        "data_fields": {
                            "href": "https://api.oneflow.com/v1/contracts/51874/data_fields"
                        },
                        "events": {
                            "href": "https://api.oneflow.com/v1/contracts/51874/events"
                        },
                        "files": {
                            "href": "https://api.oneflow.com/v1/contracts/51874/files"
                        },
                        "parties": {
                            "href": "https://api.oneflow.com/v1/contracts/51874/parties"
                        },
                        "publish": {
                            "href": "https://api.oneflow.com/v1/contracts/51874/publish"
                        },
                        "self": {
                            "href": "https://api.oneflow.com/v1/contracts/51874"
                        },
                        "template": {
                            "href": "https://api.oneflow.com/v1/templates/11111"
                        },
                        "template_type": {
                            "href": "https://api.oneflow.com/v1/template_types/12222"
                        },
                        "workspace": {
                            "href": "https://api.oneflow.com/v1/workspaces/12345"
                        }
                    },
                    "_permissions": {
                        "contract:delete": true
                    },
                    "_private": {
                        "name": "My First Contract",
                        "value": {
                            "amount": "500.10",
                            "currency": "SEK"
                        },
                        "workspace_id": 12345
                    },
                    "_private_ownerside": {
                        "created_time": "2020-06-30T07:15:23+00:00",
                        "template_id": 11111,
                        "template_type_id": 12222
                    },
                    "id": 51874,
                    "tags": [
                        {
                            "id": 123456,
                            "name": "New Hire"
                        }
                    ],
                    "lifecycle_settings": {
                        "duration": "12m",
                        "end_date": null,
                        "initial_duration": null,
                        "notice_period": "3m",
                        "start_date": "2020-07-09",
                        "type": "recurring"
                    },
                    "lifecycle_state": {
                        "contract_end_time": null,
                        "contract_start_time": "2020-07-09T00:00:00+00:00",
                        "cancel_time": null,
                        "has_ended_by_termination": false,
                        "has_passed_notice_period_start_time": true,
                        "is_canceled": false,
                        "is_recurring": true,
                        "lifecycle_state": "active",
                        "lifecycle_state_updated_time": "2020-07-09T12:54:53+00:00",
                        "notice_period_start_time": "2021-04-09T00:00:00+00:00",
                        "period": 1,
                        "period_end_time": "2021-07-09T00:00:00+00:00",
                        "period_start_time": "2020-07-09T00:00:00+00:00"
                    },
                    "parties": [
                        {
                            "_private_ownerside": {
                                "created_time": "2020-06-30T07:15:23+00:00",
                                "updated_time": null
                            },
                            "country_code": "SE",
                            "id": 353218,
                            "identification_number": "11223344-5566",
                            "my_party": true,
                            "name": "My Company AB",
                            "participants": [
                                {
                                    "_permissions": {
                                        "contract:update": true
                                    },
                                    "_private_ownerside": {
                                        "created_time": "2020-06-30T07:15:23+00:00",
                                        "first_visited_time": "2020-06-30T07:15:23+00:00",
                                        "last_visited_time": "2020-08-04T10:14:30+00:00",
                                        "updated_time": "2020-08-04T10:14:30+00:00",
                                        "visits": 5
                                    },
                                    "delivery_channel": "email",
                                    "delivery_status": "success",
                                    "email": "mem@email.com",
                                    "id": 113703,
                                    "identification_number": "",
                                    "my_participant": false,
                                    "name": "First Last",
                                    "organizer": false,
                                    "phone_number": "",
                                    "sign_method": "standard_esign",
                                    "sign_state": "signed",
                                    "sign_state_updated_time": "2020-07-09T12:53:54+00:00",
                                    "signatory": true,
                                    "title": "",
                                    "two_step_authentication_method": "none"
                                }
                            ],
                            "type": "company"
                        },
                        {
                            "_private_ownerside": {
                                "created_time": "2020-06-30T07:17:17+00:00",
                                "updated_time": null
                            },
                            "country_code": "SE",
                            "id": 353219,
                            "identification_number": "111111",
                            "my_party": false,
                            "name": "Endpoint Test",
                            "participants": [
                                {
                                    "_permissions": {
                                        "contract:update": true
                                    },
                                    "_private_ownerside": {
                                        "created_time": "2020-06-30T07:17:17+00:00",
                                        "first_visited_time": "2020-07-09T12:54:42+00:00",
                                        "last_visited_time": "2020-07-09T12:54:55+00:00",
                                        "updated_time": "2020-07-09T12:55:00+00:00",
                                        "visits": 3
                                    },
                                    "delivery_channel": "email",
                                    "delivery_status": "success",
                                    "email": "you@me.com",
                                    "id": 113704,
                                    "identification_number": "",
                                    "my_participant": false,
                                    "name": "Endpoint Test",
                                    "organizer": false,
                                    "phone_number": "+111222333444",
                                    "sign_method": "standard_esign",
                                    "sign_state": "signed",
                                    "sign_state_updated_time": "2020-07-09T12:54:53+00:00",
                                    "signatory": true,
                                    "title": "",
                                    "two_step_authentication_method": "email"
                                }
                            ],
                            "type": "company"
                        }
                    ],
                    "published_time": "2020-06-30T07:38:55+00:00",
                    "signing_period_expiry_time": "2020-07-15T00:00:00+00:00",
                    "state": "signed",
                    "state_updated_time": "2020-07-09T12:54:53+00:00",
                    "updated_time": "2020-07-09T12:54:57+00:00"
                }
            ]
        }';
    }
}
