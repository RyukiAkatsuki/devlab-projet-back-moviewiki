<?php

require_once "user.php";

class Connection
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:dbname=moviewiki;host=127.0.0.1', 'root', '');
    }

    public function insertUser(User $user): bool
    {
        $query = 'INSERT INTO user (first_name, last_name, email, password)
                  VALUES (:first_name, :last_name, :email, :password)';

        $statement = $this->pdo->prepare($query);

        return $statement->execute([
            'first_name' => $user->firstName,
            'last_name' => $user->lastName,
            'email' => $user->email,
            'password' => md5($user->password . 'SALT')
        ]);
    }

    public function createAlbum($id_user, $name, $visibility): bool
    {
        $query = 'INSERT INTO album (id_user, name, visibility)
                  VALUES (:id_user, :name, :visibility)';

        $statement = $this->pdo->prepare($query);

        return $statement->execute([
            'id_user' => $id_user,
            'name' => $name,
            'visibility' => $visibility
        ]);
    }

}