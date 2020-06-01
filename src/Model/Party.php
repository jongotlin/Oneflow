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
    private $orgnr;

    /**
     * @var string|null
     */
    private $country;

    /**
     * @var bool
     */
    private $consumer = false;

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
    public function getOrgnr(): ?string
    {
        return $this->orgnr;
    }

    /**
     * @param string|null $orgnr
     */
    public function setOrgnr(?string $orgnr): void
    {
        $this->orgnr = $orgnr;
    }

    /**
     * @return string|null
     */
    public function getCountry(): ?string
    {
        return $this->country;
    }

    /**
     * @param string|null $country
     */
    public function setCountry(?string $country): void
    {
        $this->country = $country;
    }

    /**
     * @return bool
     */
    public function isConsumer(): bool
    {
        return $this->consumer;
    }

    /**
     * @param bool $consumer
     */
    public function setConsumer(bool $consumer): void
    {
        $this->consumer = $consumer;
    }

    /**
     * @return Participant[]
     */
    public function getParticipants(): array
    {
        return $this->participants;
    }

    /**
     * @param Participant $participant
     */
    public function addParticipant(Participant $participant): void
    {
        $this->participants[] = $participant;
    }
}
