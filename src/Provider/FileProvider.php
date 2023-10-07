<?php

namespace JGI\Oneflow\Provider;

use JGI\Oneflow\Model\File;

class FileProvider extends BaseProvider implements ProviderInterface
{
    /**
     * @return array<int, File>
     */
    public function index(int $contractId): array
    {
        $data = $this->get(sprintf('contracts/%s/files/', $contractId));

        $files = [];
        foreach ($data['data'] as $row) {
            $file = new File();
            $file->setId($row['id']);
            $file->setName($row['name']);
            $file->setExtension($row['extension']);
            $file->setType($row['type']);

            $files[] = $file;
        }

        return $files;
    }

    public function download(int $contractId, int $fileId): string
    {
        return $this->getPlain(sprintf('contracts/%s/files/%s?download=true', $contractId, $fileId));
    }
}
