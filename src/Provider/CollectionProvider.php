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
        /*
         * [{"id":401048,"name":"oneflow-collection","permissions":{"agreement:create":true}}]
         */
        $data = $this->get('collections/', $this->credentials->getPosition());

        $collections = [];
        foreach ($data as $row) {
            $collection = new Collection();
            $collection->setId($row['id']);
            $collection->setName($row['name']);

            $collections[] = $collection;
        }

        return $collections;
    }
}
