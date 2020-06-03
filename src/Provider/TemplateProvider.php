<?php

namespace JGI\Oneflow\Provider;

use JGI\Oneflow\Model\Agreement;
use JGI\Oneflow\Model\Collection;
use JGI\Oneflow\Model\Template;

class TemplateProvider extends BaseProvider implements ProviderInterface
{
    /**
     * @return Template[]
     */
    public function all()
    {
        $data = $this->get('templates/');

        $templates = [];
        foreach ($data['collection'] as $row) {
            $template = new Template();
            $template->setId($row['id']);
            $template->setName($row['name']);

            $agreement = new Agreement();
            $agreement->setId($row['agreement']['id']);
            foreach ($row['agreement']['collections'] as $collectionData) {
                $collection = new Collection();
                $collection->setId($collectionData['id']);
                $collection->setName($collectionData['name']);
                $agreement->addCollection($collection);
            }

            $template->setAgreement($agreement);

            $templates[] = $template;
        }

        return $templates;
    }
}
