<?php

require_once 'connection.php';

class Log
{

    public function __construct(public string $email, public string $password)
    {
        $this->pdo = new PDO('mysql:dbname=moviewiki;host=127.0.0.1', 'root', '');
    }

    public function verifyLog() {

        $validity = true;

        if ($this->email == '' || $this->password == '') {
            $validity = false;
        }
        return $validity;
    }

    public function isAdmin () {
        $query = "SELECT * FROM user WHERE email = '$this->email'";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        $users = $statement->fetchAll(PDO::FETCH_ASSOC);

        if ($this->email != '' || $this->password != '') {
            if ($this->email === $users[0]['email'] && md5($this->password . 'SALT') === $users[0]['password']) {
                $_SESSION['user'] = [$users[0]['id'], $users[0]['first_name'], $users[0]['last_name']];
                if ($users[0]['is_admin'] === 1) {
                    $_SESSION['admin'] = true;
                    header('Location: admin.php');
                } else {
                    $_SESSION['admin'] = false;
                    header('Location: my-account.php');
                }
            } else {
                return 'Email or Password is incorrect';
            }
        }
        return 'Email or Password has to be complete';

    }
}