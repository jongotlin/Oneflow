<?php

namespace JGI\Oneflow\Model;

class TemplateType
{
    /** @var int */
    private $id;

    /** @var string */
    private $name;

    /** @var string */
    private $description;

    /** @var string */
    private $extensionType;

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

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getExtensionType(): string
    {
        return $this->extensionType;
    }

    public function setExtensionType(string $extensionType): void
    {
        $this->extensionType = $extensionType;
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
