<?php
include_once 'Bootstrap.php';

$table = new Table('users');
echo $table->select('uer_id', 'login')->where('password', '123')->createQuery();
?>
