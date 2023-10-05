<?php

namespace JGI\Oneflow\Factory;

use JGI\Oneflow\Model\Contract;

class CreateContractParamsFactory
{
    public function create(Contract $contract): array
    {
        if (1 == count($contract->getParties()) && 'individual' == $contract->getParties()[0]->getType()) {
            $result = (new CreateIndividualContractParamsFactory())->create($contract);
        } else {
            $result = (new CreateBaseContractParamsFactory())->create($contract);
        }

        return $result;
    }
}
