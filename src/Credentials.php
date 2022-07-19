<?php

namespace JGI\Oneflow;

class Credentials
{
    /** @var string  */
    private $token;

    /** @var string|null */
    private $email;

    /**
     * @param string $token
     * @param string $email
     */
    public function __construct(string $token, string $email = null)
    {
        $this->token = $token;
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }
}
