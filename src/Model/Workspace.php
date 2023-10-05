<?php

namespace JGI\Oneflow\Model;

class Workspace
{
    /** @var int */
    private $id;

    /** @var string */
    private $name;

    /** @var string */
    private $companyName;

    /** @var string */
    private $registrationNumber;

    /** @var string */
    private $countryCode;

    /** @var string */
    private $dateFormat;

    /** @var string */
    private $description;

    /** @var \DateTime|null */
    private $createdAt;

    /** @var \DateTime|null */
    private $updatedAt;

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

    public function getCompanyName(): string
    {
        return $this->companyName;
    }

    public function setCompanyName(string $companyName): void
    {
        $this->companyName = $companyName;
    }

    public function getRegistrationNumber(): string
    {
        return $this->registrationNumber;
    }

    public function setRegistrationNumber(string $registrationNumber): void
    {
        $this->registrationNumber = $registrationNumber;
    }

    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

    public function setCountryCode(string $countryCode): void
    {
        $this->countryCode = $countryCode;
    }

    public function getDateFormat(): string
    {
        return $this->dateFormat;
    }

    public function setDateFormat(string $dateFormat): void
    {
        $this->dateFormat = $dateFormat;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTime $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }
}
