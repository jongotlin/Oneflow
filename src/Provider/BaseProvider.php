<?php

namespace JGI\Oneflow\Provider;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use JGI\Oneflow\Credentials;
use JGI\Oneflow\Oneflow;

abstract class BaseProvider implements ProviderInterface
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * @var Credentials
     */
    protected $credentials;

    /**
     * @param Client $client
     * @param Credentials $credentials
     */
    public function __construct(Client $client, Credentials $credentials)
    {
        $this->client = $client;
        $this->credentials = $credentials;
    }

    /**
     * @param string $path
     * @param int|null $position
     *
     * @return array|null
     */
    protected function get(string $path, ?int $position = null): ?array
    {
        $response = $this->client->get(
            $this->getUrl($path),
            $this->createOptions($position)
        );

        $json = $response->getBody()->getContents();

        if ($response->getStatusCode() == 401) {
            throw new \Exception($json);
        }

        return json_decode($json, true);
    }

    /**
     * @param string $path
     * @param array $data
     * @param int|null $position
     *
     * @return array|null
     */
    protected function post(string $path, array $data, ?int $position): ?array
    {
        $response = $this->client->post(
            $this->getUrl($path),
            array_merge([
                RequestOptions::JSON => $data,
            ], $this->createOptions($position))
        );

        $json = $response->getBody()->getContents();

        if ($response->getStatusCode() == 401) {
            throw new \Exception($json);
        }

        return json_decode($json, true);
    }

    /**
     * @param string $path
     * @param \SplFileInfo $file
     * @param int|null $position
     *
     * @return array|null
     */
    protected function postFile(string $path, \SplFileInfo $file, ?int $position): ?array
    {
        $response = $this->client->post(
            $this->getUrl($path),
            array_merge([
                RequestOptions::MULTIPART => [
                    [
                        'name' => 'file',
                        'contents' => fopen($file->getPathname(), 'r'),
                        'filename' => 'file.pdf',
                    ],
                ],
            ], $this->createOptions($position, false))
        );

        $json = $response->getBody()->getContents();

        return json_decode($json, true);
    }

    /**
     * @param string $path
     *
     * @return string
     */
    private function getUrl(string $path): string
    {
        return Oneflow::API_URL . $path;
    }

    private function createOptions(?int $position, bool $json = true): array
    {
        $options = [
            RequestOptions::HEADERS => [
                'X-Flow-API-Token' => $this->credentials->getToken(),
            ],
        ];
        if ($json) {
            $options[RequestOptions::HEADERS]['Content-Type'] = 'application/json';
        }

        if (!is_null($position)) {
            $options[RequestOptions::HEADERS]['X-Flow-Current-Position'] = $position;
        }

        return $options;
    }
}
