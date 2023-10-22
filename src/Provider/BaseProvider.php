<?php

namespace JGI\Oneflow\Provider;

use JGI\Oneflow\Credentials;
use JGI\Oneflow\Exception\OneflowException;
use JGI\Oneflow\Oneflow;
use Symfony\Component\Mime\Part\DataPart;
use Symfony\Component\Mime\Part\Multipart\FormDataPart;
use Symfony\Contracts\HttpClient\HttpClientInterface;

abstract class BaseProvider implements ProviderInterface
{
    public function __construct(protected readonly HttpClientInterface $client, private readonly Credentials $credentials)
    {
    }

    protected function get(string $path): array
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

    protected function getPlain(string $path): string
    {
        $response = $this->client->request('GET',
            $this->getUrl($path),
            $this->createOptions(false)
        );

        $content = $response->getContent(false);

        $code = $response->getStatusCode();
        if ($code && 200 != $code) {
            throw new OneflowException($content);
        }

        return $content;
    }

    protected function post(string $path, array $data): array
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

        $data = json_decode($json, true);
        if (null === $data) {
            throw new OneflowException('Content is not json: '.$json);
        }

        return $data;
    }

    protected function postFile(string $path, \SplFileInfo $file): ?array
    {
        $options = $this->createOptions(false);

        $options['body'] = [
            'upload_as' => 'expanded_pdf',
            'file' => fopen($file->getRealPath(), 'r'),
        ];

        $response = $this->client->request('POST', $this->getUrl($path), $options);

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
