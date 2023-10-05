<?php

namespace JGI\Oneflow\Provider;

use JGI\Oneflow\Model\Account;

class AccountProvider extends BaseProvider implements ProviderInterface
{
    public function index(): Account
    {
        $data = $this->get('accounts/me/');


        $account = new Account();
        $account->setId($data['id']);
        $account->setName($data['name']);
        $account->setRegistrationNumber($data['registration_number']);
        $account->setCountryCode($data['country_code']);

        return $account;
    }
}
