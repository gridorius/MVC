<?php
class Database{
  private $connection;

  public function __construct($dbname, $login, $password){
    $this->connection = new PDO("mysql:dbname=$dbname;host=localhost;charset=utf8", $login, $password);
  }

  public function table($name){
    return new Table($name, $this);
  }

  public function execute($query, $args = []){
    $prepare = $this->connection->prepare($query);
    return $prepare->execute($args);
  }
}
?>
