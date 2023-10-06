<?php

namespace JGI\Oneflow\Provider;

use JGI\Oneflow\Model\Workspace;

class WorkspaceProvider extends BaseProvider implements ProviderInterface
{
    /**
     * @return array<int, Workspace>
     */
    public function index(): array
    {
        $data = $this->get('workspaces/');

        $workspaces = [];
        foreach ($data['data'] as $row) {
            $workspace = new Workspace();
            $workspace->setId($row['id']);
            $workspace->setName($row['name']);
            $workspace->setCompanyName($row['company_name']);
            $workspace->setRegistrationNumber($row['registration_number']);
            $workspace->setCountryCode($row['country_code']);
            $workspace->setDateFormat($row['date_format']);
            $workspace->setDescription($row['description']);

            $workspaces[] = $workspace;
        }

        return $workspaces;
    }
}
