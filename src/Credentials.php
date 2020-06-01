<?php

namespace JGI\Oneflow;

class Credentials
{
    /**
     * @var string
     */
    private $token;

    /**
     * @var int|null
     */
    private $position;

    /**
     * @param string $token
     * @param int|null $position
     */
    public function __construct(string $token, ?int $position = null)
    {
        $this->token = $token;
        $this->position = $position;
    }

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * @return int|null
     */
    public function getPosition(): ?int
    {
        return $this->position;
    }

    /**
     * @param int|null $position
     */
    public function setPosition(?int $position): void
    {
        $this->position = $position;
    }
}
