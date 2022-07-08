<?php

namespace JGI\Oneflow\Provider;

use JGI\Oneflow\Model\Position;
use JGI\Oneflow\Model\User;

class UserProvider extends BaseProvider implements ProviderInterface
{
    /**
     * @return User[]
     */
    public function index(): array
    {
        $data = $this->get('users/');

        $users = [];
        foreach ($data['data'] as $row) {
            $user = new User();
            $user->setId($row['id']);
            $user->setName($row['name']);
            $user->setIsActive($row['active']);
            $user->setEmail($row['email']);
            $user->setIsAdmin($row['is_admin']);
            $user->setPhoneNumber($row['phone_number']);
            $user->setState($row['state']);
            $user->setTitle($row['title']);

            $users[] = $user;
        }

        return $users;
    }
}
