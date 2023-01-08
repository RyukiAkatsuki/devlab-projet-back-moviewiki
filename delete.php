<?php

require_once 'get.php';

$connection = new Get();
$user = $connection->get($_GET['id']);

$connection->delete($user);

if ($_SESSION['admin'] === true) {
    header('Location: admin.php');
} else {
    header('Location: admin.php');
}
