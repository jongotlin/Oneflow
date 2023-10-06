<?php

declare(strict_types=1);

namespace JGI\Oneflow\Tests\Provider;

use JGI\Oneflow\Credentials;
use JGI\Oneflow\Model\Template;
use JGI\Oneflow\Model\TemplateTag;
use JGI\Oneflow\Model\TemplateType;
use JGI\Oneflow\Oneflow;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\MockResponse;

class TemplateProviderTest extends TestCase
{
    /**
     * @test
     */
    public function template_provider()
    {
        $oneflow = new Oneflow(
            new MockHttpClient(new MockResponse($this->getJson())),
            $this->createMock(Credentials::class)
        );
        $templates = $oneflow->templates()->index();

        $this->assertIsArray($templates);
        $this->assertCount(2, $templates);

        /** @var Template $template */
        $template = $templates[1];
        $this->assertInstanceOf(Template::class, $template);
        $this->assertEquals(110010, $template->getId());
        $this->assertEquals('Code of Conduct', $template->getName());
        $this->assertEquals(true, $template->isActive());
        $this->assertEquals('2021-05-05', $template->getCreatedAt()->format('Y-m-d'));
        $this->assertEquals('2021-06-07', $template->getUpdatedAt()->format('Y-m-d'));

        $type = $template->getType();
        $this->assertInstanceOf(TemplateType::class, $type);
        $this->assertEquals(5, $type->getId());
        $this->assertEquals('Hubspot Template', $type->getName());
        $this->assertEquals('Hubspot data fields', $type->getDescription());
        $this->assertEquals('hubspot', $type->getExtensionType());
        $this->assertEquals('2021-05-27', $type->getCreatedAt()->format('Y-m-d'));
        $this->assertEquals('2021-06-07', $type->getUpdatedAt()->format('Y-m-d'));

        $tag = $template->getTags()[0];
        $this->assertInstanceOf(TemplateTag::class, $tag);
        $this->assertEquals(12346, $tag->getId());
        $this->assertEquals('HR', $tag->getName());
    }

    private function getJson(): string
    {
        return '{
            "_links": {
                "next": {
                    "href": null
                },
                "previous": {
                    "href": "https://api.oneflow.com/v1/templates?offset=0&limit=1"
                },
                "self": {
                    "href": "https://api.oneflow.com/v1/templates?offset=1&limit=1"
                }
            },
            "count": 2,
            "data": [
                {
                    "_links": {
                        "self": {
                            "href": "https://api.oneflow.com/v1/templates/110008"
                        },
                        "template_type": {
                            "href": null
                        }
                    },
                    "available_options": {
                        "can_receive_attachments": false,
                        "can_receive_expanded_pdf": false,
                        "can_receive_products": false,
                        "delivery_channels": [
                            {
                                "name": "email",
                                "preferred": true,
                                "required_participant_attributes": [
                                    "email"
                                ]
                            },
                            {
                                "name": "none",
                                "preferred": false,
                                "required_participant_attributes": []
                            }
                        ],
                        "sign_methods": [
                            {
                                "name": "standard_esign",
                                "preferred": true
                            }
                        ],
                        "two_step_authentication_methods": [
                            {
                                "name": "email",
                                "preferred": false,
                                "required_participant_attributes": [
                                    "email"
                                ]
                            },
                            {
                                "name": "none",
                                "preferred": true,
                                "required_participant_attributes": []
                            }
                        ]
                    },
                    "created_time": "2021-05-04T12:00:09+00:00",
                    "id": 110008,
                    "name": "Sales Proposal",
                    "tags": [
                        {
                            "id": 12345,
                            "name": "Enterprise"
                        }
                    ],
                    "template_type": null,
                    "updated_time": "2021-06-08T06:54:42+00:00"
                },
                {
                    "_links": {
                        "self": {
                            "href": "https://api.oneflow.com/v1/templates/110010"
                        },
                        "template_type": {
                            "href": "https://api.oneflow.com/v1/template_types/5"
                        }
                    },
                    "available_options": {
                        "can_receive_attachments": false,
                        "can_receive_expanded_pdf": true,
                        "can_receive_products": false,
                        "delivery_channels": [
                            {
                                "name": "email",
                                "preferred": true,
                                "required_participant_attributes": [
                                    "email"
                                ]
                            },
                            {
                                "name": "none",
                                "preferred": false,
                                "required_participant_attributes": []
                            }
                        ],
                        "sign_methods": [
                            {
                                "name": "standard_esign",
                                "preferred": true
                            }
                        ],
                        "two_step_authentication_methods": [
                            {
                                "name": "email",
                                "preferred": false,
                                "required_participant_attributes": [
                                    "email"
                                ]
                            },
                            {
                                "name": "none",
                                "preferred": true,
                                "required_participant_attributes": []
                            }
                        ]
                    },
                    "created_time": "2021-05-05T07:40:11+00:00",
                    "id": 110010,
                    "name": "Code of Conduct",
                    "tags": [
                        {
                            "id": 12346,
                            "name": "HR"
                        }
                    ],
                    "template_type": {
                        "created_time": "2021-05-27T16:45:56+00:00",
                        "description": "Hubspot data fields",
                        "extension_type": "hubspot",
                        "id": 5,
                        "name": "Hubspot Template",
                        "updated_time": "2021-06-07T07:43:39+00:00"
                    },
                    "updated_time": "2021-06-07T07:43:39+00:00"
                }
            ]
        }';
    }
}
