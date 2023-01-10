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

        return $validity;
    }



}