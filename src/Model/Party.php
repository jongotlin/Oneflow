<?php

namespace JGI\Oneflow\Model;

class Party
{
    /**
     * @var string|null
     */
    private $name;

    /**
     * @var string|null
     */
    private $identificationNumber;

    /**
     * @var string|null
     */
    private $countryCode;

    /**
     * @var bool
     */
    private $isMyParty = false;

    /** @var string  */
    private $type = 'company';

    /**
     * @var Participant[]
     */
    private $participants = [];

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     */
    public function getIdentificationNumber(): ?string
    {
        return $this->identificationNumber;
    }

    /**
     * @param string|null $identificationNumber
     */
    public function setIdentificationNumber(?string $identificationNumber): void
    {
        $this->identificationNumber = $identificationNumber;
    }

    /**
     * @return string|null
     */
    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }

    /**
     * @param string|null $countryCode
     */
    public function setCountryCode(?string $countryCode): void
    {
        $this->countryCode = $countryCode;
    }

    /**
     * @return bool
     */
    public function isMyParty(): bool
    {
        return $this->isMyParty;
    }

    /**
     * @param bool $isMyParty
     */
    public function setIsMyParty(bool $isMyParty): void
    {
        $this->isMyParty = $isMyParty;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return Participant[]
     */
    public function getParticipants(): array
    {
        return $this->participants;
    }

    /**
     * @param Participant[] $participants
     */
    public function setParticipants(array $participants): void
    {
        $this->participants = $participants;
    }

    /**
     * @param Participant $participant
     */
    public function addParticipant(Participant $participant): void
    {
        $this->participants[] = $participant;
    }
}
