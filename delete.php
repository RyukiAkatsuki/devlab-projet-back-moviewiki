<?php

require_once 'class/get.php';

$connection = new Get();

$id = intval($_GET['id'], 10);

$movie = $connection->getMovie2($_GET['id']);

$del = $connection->delete($id);

header('Location: my-account.php');

