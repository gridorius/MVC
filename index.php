<?php
include_once 'Bootstrap.php';
include_once 'Models/Users.php';

$config = json_decode(file_get_contents('configuration.json'));
Database::creteContext($config->dbname, $config->login, $config->password);

$users = Database::Users();
echo var_dump($users->toList());
?>
