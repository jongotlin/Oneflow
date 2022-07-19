<?php

namespace JGI\Oneflow\Provider;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use JGI\Oneflow\Credentials;
use JGI\Oneflow\Exception\OneflowException;
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
     * @return array|null
     */
    protected function get(string $path): ?array
    {
        $response = $this->client->get(
            $this->getUrl($path),
            $this->createOptions()
        );

        $json = $response->getBody()->getContents();

        $code = $response->getStatusCode();
        if ($code && $code != 200) {
            throw new OneflowException($json);
        }

        return json_decode($json, true);
    }

    /**
     * @param string $path
     * @param array $data
     * @return array|null
     */
    protected function post(string $path, array $data): ?array
    {
        $response = $this->client->post(
            $this->getUrl($path),
            array_merge([
                RequestOptions::JSON => $data,
            ], $this->createOptions())
        );

        $json = $response->getBody()->getContents();

        $code = $response->getStatusCode();
        if ($code && $code != 200) {
            throw new OneflowException($json);
        }

        return json_decode($json, true);
    }

    /**
     * @param string $path
     * @param \SplFileInfo $file
     * @return array|null
     */
    protected function postFile(string $path, \SplFileInfo $file): ?array
    {
        $options = array_merge([
            RequestOptions::MULTIPART => [
                [
                    'name' => 'upload_as',
                    'contents' => 'expanded_pdf',
                ],
                [
                    'name' => 'file',
                    'contents' => fopen($file->getPathname(), 'r'),
                ],
            ],
        ], $this->createOptions(false));

        $response = $this->client->post($this->getUrl($path), $options);
        $json = $response->getBody()->getContents();

        $code = $response->getStatusCode();
        if ($code && $code != 200) {
            throw new OneflowException($json);
        }

        return json_decode($json, true);
    }

    /**
     * @param string $path
     */
    protected function deleteRequest(string $path): void
    {
        $response = $this->client->delete($this->getUrl($path), $this->createOptions());

        $json = $response->getBody()->getContents();

        $code = $response->getStatusCode();
        if ($code && $code != 200) {
            throw new OneflowException($json);
        }
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

    /**
     * @param bool $isJson
     * @return array
     */
    private function createOptions(bool $isJson = true): array
    {
        $headers = ['x-oneflow-api-token' => $this->credentials->getToken()];

        if ($this->credentials->getEmail()) {
            $headers['x-oneflow-user-email'] = $this->credentials->getEmail();
        }

        $options = [
            RequestOptions::HEADERS => $headers,
        ];

        if ($isJson) {
            $options[RequestOptions::HEADERS]['Content-Type'] = 'application/json';
        }

        return $options;
    }
}
