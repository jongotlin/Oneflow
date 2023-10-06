<?php

namespace JGI\Oneflow\Model;

class Participant
{
    private ?int $id = null;
    private ?string $name = null;
    private ?string $title = null;
    private ?string $email = null;
    private string $deliveryChannel = 'none';
    private string $signMethod = 'standard_esign';
    private ?string $identificationNumber = null;
    private bool $signatory = true;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    public function getDeliveryChannel(): string
    {
        return $this->deliveryChannel;
    }

    public function setDeliveryChannel(string $deliveryChannel): void
    {
        $this->deliveryChannel = $deliveryChannel;
    }

    public function getSignMethod(): string
    {
        return $this->signMethod;
    }

    public function setSignMethod(string $signMethod): void
    {
        $this->signMethod = $signMethod;
    }

    public function getIdentificationNumber(): ?string
    {
        return $this->identificationNumber;
    }

    public function setIdentificationNumber(?string $identificationNumber): void
    {
        $this->identificationNumber = $identificationNumber;
    }

    public function isSignatory(): bool
    {
        return $this->signatory;
    }

    public function setSignatory(bool $signatory): void
    {
        $this->signatory = $signatory;
    }
}
