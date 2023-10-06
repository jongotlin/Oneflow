<?php

namespace JGI\Oneflow;

class Credentials
{
    public function __construct(private readonly string $token, private readonly ?string $email = null)
    {
    }

    public function getToken(): string
    {
        return $this->token;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }
}
