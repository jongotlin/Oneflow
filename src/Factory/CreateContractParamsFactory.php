<?php

namespace JGI\Oneflow\Factory;

use JGI\Oneflow\Model\Contract;

class CreateContractParamsFactory
{
    /**
     * @param Contract $contract
     * @return array
     */
    public function create(Contract $contract): array
    {
        if (count($contract->getParties()) == 1 && $contract->getParties()[0]->getType() == 'individual') {
            $result = (new CreateIndividualContractParamsFactory())->create($contract);
        } else {
            $result = (new CreateBaseContractParamsFactory())->create($contract);
        }

        return $result;
    }
}