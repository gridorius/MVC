<?php
include_once 'Bootstrap.php';
new Database('test', 'root', '');

$table = new Table('users');

foreach($table->select('user_id', 'login') as $user)
  echo $user->login;
?>
