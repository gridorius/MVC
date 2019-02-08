<?php
include_once 'Column.php';
include_once 'Table.php';

$table = new Table('users_test');
$id = (new Column('id', 'int(3)'))->increment()->primary();
$login = new Column('login', 'varchar(100)');
$table->addColumns($id, $login);

echo $table->create();
?>
