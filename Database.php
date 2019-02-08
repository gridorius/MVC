<?php
class Database{
  private $connection;

  public function __construct($dbname, $login, $password){
    $connection = new PDO("mysql:dbname=$dbname;host=localhost;charset=utf8", $login, $password);
    $this->connection = $connection;
  }

  public function execute($query, $args){
    $connection->prepare($query);
    return $connection->execute($args);
  }
}
?>
