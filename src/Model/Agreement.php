<?php

namespace JGI\Oneflow\Model;

class Agreement
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
     * Used when creating agreement
     *
     * @var Collection|null
     */
    private $collection;

    /**
     * @var Collection[]|null
     */
    private $collections;

    /**
     * @var Template|null
     */
    private $template;

    /**
     * @var Party[]
     */
    private $parties = [];

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
     * @return Collection[]|null
     */
    public function getCollections(): ?array
    {
        return $this->collections;
    }

    /**
     * @param Collection $collection
     */
    public function addCollection(Collection $collection): void
    {
        if (is_null($this->collections)) {
           $this->collections = [];
        }
        $this->collections[] = $collection;
    }

    /**
     * @return Collection|null
     */
    public function getCollection(): ?Collection
    {
        return $this->collection;
    }

    /**
     * @param Collection|null $collection
     */
    public function setCollection(?Collection $collection): void
    {
        $this->collection = $collection;
    }

    /**
     * @return Template|null
     */
    public function getTemplate(): ?Template
    {
        return $this->template;
    }

    /**
     * @param Template|null $template
     */
    public function setTemplate(?Template $template): void
    {
        $this->template = $template;
    }

    /**
     * @return Party[]
     */
    public function getParties(): array
    {
        return $this->parties;
    }

    /**
     * @param Party $party
     */
    public function addParty(Party $party): void
    {
        $this->parties[] = $party;
    }
}
