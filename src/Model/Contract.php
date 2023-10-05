<?php

namespace JGI\Oneflow\Model;

class Contract
{
    /**
     * @var int|null
     */
    private $id;

    /**
     * Used when creating contract
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
     * @return Workspace[]|null
     */
    public function getWorkspaces(): ?array
    {
        return $this->workspaces;
    }

    /**
     * @param Workspace $workspace
     */
    public function addWorkspace(Workspace $workspace): void
    {
        if (is_null($this->workspaces)) {
           $this->workspaces = [];
        }

        $this->workspaces[] = $workspace;
    }

    /**
     * @return Workspace|null
     */
    public function getWorkspace(): ?Workspace
    {
        return $this->workspace;
    }

    /**
     * @param Workspace|null $workspace
     */
    public function setWorkspace(?Workspace $workspace): void
    {
        $this->workspace = $workspace;
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

    /**
     * @return Party|null
     */
    public function getMyParty(): ?Party
    {
        return $this->myParty;
    }

    /**
     * @param Party|null $myParty
     */
    public function setMyParty(?Party $myParty): void
    {
        $this->myParty = $myParty;
    }
}
