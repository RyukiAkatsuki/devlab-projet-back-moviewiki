<?php

class User
{
    public string $id;

    public function __construct(
        public string $firstName,
        public string $lastName,
        public string $email,
        public string $password,
        public string $password2,
    )
    {
    }

    public function verifySign(): bool
    {
        $validity = true;
        if ($this->email == '' || $this->firstName == '' || $this->lastName == '') {
            $validity = false;
        }

        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $validity = false;
        }

        if ($this->password == '' || $this->password != $this->password2 || $this->password2 == '') {
            $validity = false;
        }

        return $validity;
    }
}