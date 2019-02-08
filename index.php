<?php
include_once 'Column.php';
include_once 'Table.php';
include_once 'Foreign.php';
include_once 'Database.php';
include_once 'Where.php';

$where = new Where();
$where->where('name', 'gridorius')->where('password', '123');
echo $where->get();
?>
