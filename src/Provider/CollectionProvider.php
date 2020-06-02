<?php

namespace JGI\Oneflow\Provider;

use JGI\Oneflow\Model\Collection;

class CollectionProvider extends BaseProvider implements ProviderInterface
{
    /**
     * @return Collection[]
     */
    public function all()
    {
        $data = $this->get('collections/', $this->credentials->getPosition());

        $collections = [];
        foreach ($data as $row) {
            $collections[] = $this->createCollectionObject($row);
        }

        return $collections;
    }

    /**
     * @param array $data
     *
     * @return Collection
     */
    private function createCollectionObject(array $data): Collection
    {
        $collection = new Collection();
        $collection->setId($data['id']);
        $collection->setName($data['name']);

        return $collection;
    }
}
