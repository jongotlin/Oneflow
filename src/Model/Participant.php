<?php

namespace JGI\Oneflow\Model;

class Participant
{
    /**
     * @var int|null
     */
    private $id;

    /**
     * @var int|null
     */
    private $positionId;

    /**
     * @var string|null
     */
    private $name;

    /**
     * @var string|null
     */
    private $title;

    /**
     * @var string|null
     */
    private $email;

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
     * @return int|null
     */
    public function getPositionId(): ?int
    {
        return $this->positionId;
    }

    /**
     * @param int|null $positionId
     */
    public function setPositionId(?int $positionId): void
    {
        $this->positionId = $positionId;
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
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     */
    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }
}
