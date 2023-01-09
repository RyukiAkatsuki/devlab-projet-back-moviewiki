<?php

require_once "user.php";

class Album
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:dbname=moviewiki;host=127.0.0.1', 'root', '');
    }

    public function verifyAlbum($name, $visibility): bool
    {
        $validity = true;
        if ($name == '' || $visibility == '') {
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