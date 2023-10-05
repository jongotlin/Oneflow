<?php

namespace JGI\Oneflow\Provider;

use JGI\Oneflow\Credentials;
use JGI\Oneflow\Exception\OneflowException;
use JGI\Oneflow\Oneflow;
use Symfony\Contracts\HttpClient\HttpClientInterface;

abstract class BaseProvider implements ProviderInterface
{
    public function __construct(protected readonly HttpClientInterface $client, private readonly Credentials $credentials)
    {
    }

    protected function get(string $path): ?array
    {
        $response = $this->client->request('GET',
            $this->getUrl($path),
            $this->createOptions()
        );

        $json = $response->getContent(false);

        $code = $response->getStatusCode();
        if ($code && 200 != $code) {
            throw new OneflowException($json);
        }

        $data = json_decode($json, true);
        if (null === $data) {
            throw new OneflowException('Content is not json: '.$json);
        }

        return $data;
    }

    protected function post(string $path, array $data): ?array
    {
        $response = $this->client->request('POST',
            $this->getUrl($path),
            array_merge([
                'json' => $data,
            ], $this->createOptions())
        );

        $json = $response->getContent(false);

        $code = $response->getStatusCode();
        if ($code && 200 != $code) {
            throw new OneflowException($json);
        }

        return json_decode($json, true);
    }

    protected function postFile(string $path, \SplFileInfo $file): ?array
    {
        throw new \LogicException('Not implemented');
        /*
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
        if ($code && 200 != $code) {
            throw new OneflowException($json);
        }

        return json_decode($json, true);
        */
    }

    protected function deleteRequest(string $path): void
    {
        $response = $this->client->request('DELETE', $this->getUrl($path), $this->createOptions());

        $json = $response->getContent(false);

        $code = $response->getStatusCode();
        if ($code && 200 != $code) {
            throw new OneflowException($json);
        }
    }

    private function getUrl(string $path): string
    {
        return Oneflow::API_URL.$path;
    }

    private function createOptions(bool $isJson = true): array
    {
        $headers = ['x-oneflow-api-token' => $this->credentials->getToken()];

        if ($this->credentials->getEmail()) {
            $headers['x-oneflow-user-email'] = $this->credentials->getEmail();
        }

        $options = [
            'headers' => $headers,
        ];

        if ($isJson) {
            $options['headers']['Content-Type'] = 'application/json';
        }

        return $options;
    }
}
