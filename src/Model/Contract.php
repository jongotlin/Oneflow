<?php

namespace JGI\Oneflow\Model;

class Contract
{
    /**
     * @var int|null
     */
    private $id;

    /**
     * Used when creating contract.
     *
     * @var Workspace|null
     */
    private $workspace;

    /**
     * @var Workspace[]|null
     */
    private $workspaces;

    /**
     * @var Template|null
     */
    private $template;

    /**
     * @var Party[]
     */
    private $parties = [];
    private ?Party $myParty = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return Workspace[]|null
     */
    public function getWorkspaces(): ?array
    {
        return $this->workspaces;
    }

    public function addWorkspace(Workspace $workspace): void
    {
        if (is_null($this->workspaces)) {
            $this->workspaces = [];
        }

        $this->workspaces[] = $workspace;
    }

    public function getWorkspace(): ?Workspace
    {
        return $this->workspace;
    }

    public function setWorkspace(?Workspace $workspace): void
    {
        $this->workspace = $workspace;
    }

    public function getTemplate(): ?Template
    {
        return $this->template;
    }

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

    public function addParty(Party $party): void
    {
        $this->parties[] = $party;
    }

    public function getMyParty(): ?Party
    {
        return $this->myParty;
    }

    public function setMyParty(?Party $myParty): void
    {
        $this->myParty = $myParty;
    }
}
