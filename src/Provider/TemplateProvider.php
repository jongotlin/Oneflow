<?php

namespace JGI\Oneflow\Provider;

use JGI\Oneflow\Helper\DateTimeHelper;
use JGI\Oneflow\Model\Template;
use JGI\Oneflow\Model\TemplateTag;
use JGI\Oneflow\Model\TemplateType;

class TemplateProvider extends BaseProvider implements ProviderInterface
{
    /**
     * @return array<int, Template>
     */
    public function index(): array
    {
        $data = $this->get('templates/');

        $result = [];
        foreach ($data['data'] as $row) {
            $template = new Template();
            $template->setId($row['id']);
            $template->setName($row['name']);
            $template->setType($this->getType($row));
            $template->setTags($this->getTags($row));

            $isActive = isset($row['template_active']) ? $row['template_active'] : true;
            $template->setIsActive($isActive);

            $template->setCreatedAt(DateTimeHelper::get($row, 'created_time'));
            $template->setUpdatedAt(DateTimeHelper::get($row, 'updated_time'));

            $result[] = $template;
        }

        return $result;
    }

    private function getType(array $row): ?TemplateType
    {
        if (!isset($row['template_type'])) {
            return null;
        }

        $row = $row['template_type'];

        $result = new TemplateType();
        $result->setId($row['id']);
        $result->setName($row['name']);
        $result->setDescription($row['description']);
        $result->setExtensionType($row['extension_type']);
        $result->setCreatedAt(DateTimeHelper::get($row, 'created_time'));
        $result->setUpdatedAt(DateTimeHelper::get($row, 'updated_time'));

        return $result;
    }

    /**
     * @return array<int, TemplateTag>
     */
    private function getTags(array $row): array
    {
        if (!isset($row['tags'])) {
            return [];
        }

        $result = [];
        foreach ($row['tags'] as $rowTag) {
            $tag = new TemplateTag();
            $tag->setId($rowTag['id']);
            $tag->setName($rowTag['name']);

            $result[] = $tag;
        }

        return $result;
    }
}
