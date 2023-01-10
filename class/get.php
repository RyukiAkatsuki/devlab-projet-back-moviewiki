<?php

require_once 'user.php';

class Get
{
    public int $id;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:dbname=moviewiki;host=127.0.0.1', 'root', '');
    }

    public function delete($id): bool
    {
        $query = 'SET FOREIGN_KEY_CHECKS=0;
                DELETE FROM movie WHERE id =' . $id;
        $statement = $this->pdo->prepare($query);

        return $statement->execute();
    }


    public function getAllUsers() {

        $query = 'SELECT * FROM user';
        $statement = $this->pdo->prepare($query);
        $statement->execute();

        $users = $statement->fetchAll(PDO::FETCH_ASSOC);

        $userObjects = [];

        foreach ($users as $user) {
            if ($user['first_name'] != 'Admin') {
                $userObject = new User(
                    $user['first_name'],
                    $user['last_name'],
                    $user['email'],
                    $user['password'],
                    ''
                );
                $userObject->id = $user['id'];

                $userObjects[] = $userObject;
            }
        }

        return $userObjects;
    }

    public function get(int $id): User
    {
        $query = 'SELECT * FROM user WHERE id = :id';
        $statement = $this->pdo->prepare($query);
        $statement->execute([
            'id' => $id
        ]);

        $user = $statement->fetch(PDO::FETCH_ASSOC);

        $userObject = new User(
            $user['first_name'],
            $user['last_name'],
            $user['email'],
            '',
            ''
        );
        $userObject->id = $user['id'];

        return $userObject;
    }

    public function getAlbums(int $id) {

        $query = 'SELECT * FROM album WHERE id_user=' . $id;
        $statement = $this->pdo->prepare($query);
        $statement->execute();

        $albums = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $albums;
    }

    public function getAlbumsLiked(int $id) {

        $query = 'SELECT * FROM likes WHERE id_user=' . $id;
        $statement = $this->pdo->prepare($query);
        $statement->execute();

        $albums = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $albums;
    }

    public function getMovie(int $id) {

        $query = 'SELECT * FROM movie WHERE id_album=' . $id;
        $statement = $this->pdo->prepare($query);
        $statement->execute();

        $movies = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $movies;
    }

    public function getMovie2(int $id) {

        $query = 'SELECT * FROM movie WHERE id=' . $id;
        $statement = $this->pdo->prepare($query);
        $statement->execute();

        $movies = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $movies;
    }

}