<?php
include_once 'Bootstrap.php';

$config = json_decode(file_get_contents('configuration.json'));
Database::creteContext($config->dbname, $config->login, $config->password);


UsersInfoTable::createTable();
FilesInfoTable::createTable();
UserFilesInfoTable::createTable();

?>
