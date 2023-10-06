<?php

namespace JGI\Oneflow\Model;

class Account
{
    /** @var int */
    private $id;

    /** @var string */
    private $name;

    private $countryCode;

    /** @var string */
    private $registrationNumber;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getCountryCode()
    {
        return $this->countryCode;
    }

    public function setCountryCode($countryCode): void
    {
        $this->countryCode = $countryCode;
    }

    public function getRegistrationNumber(): string
    {
        return $this->registrationNumber;
    }

    public function setRegistrationNumber(string $registrationNumber): void
    {
        $this->registrationNumber = $registrationNumber;
    }
}
