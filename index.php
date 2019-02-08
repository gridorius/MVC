<?php
include_once 'Column.php';
include_once 'Table.php';
include_once 'Foreign.php';

$table = new Table('user_files', '');
$user_id = (new Column('user_id', 'int(3)'))->foreign(new Foreign('user_id', 'users'));
$file_id = (new Column('file_id', 'int(3)'))->foreign(new Foreign('file_id', 'files'));
$table->addColumns($user_id, $file_id);

echo $table->create();
?>
