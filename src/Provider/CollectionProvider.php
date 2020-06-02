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
        foreach ($data['collection'] as $collectionData) {
            $collections[] = $this->createCollectionObject($collectionData);
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
        $collection->setName($data['title']);

        return $collection;
    }
}
