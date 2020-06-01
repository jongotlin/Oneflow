<?php

namespace JGI\Oneflow\Model;

class Template
{
    /**
     * @var int|null
     */
    private $id;

    /**
     * @var string|null
     */
    private $name;

    /**
     * @var Agreement|null
     */
    private $agreement;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

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
     * @return Agreement|null
     */
    public function getAgreement(): ?Agreement
    {
        return $this->agreement;
    }

    /**
     * @param Agreement|null $agreement
     */
    public function setAgreement(?Agreement $agreement): void
    {
        $this->agreement = $agreement;
    }
}
