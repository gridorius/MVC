<?php
class Database{
  private static $connection;
  private static $context;

  public function __construct($dbname, $login, $password){
    static::$connection = new PDO("mysql:dbname=$dbname;host=localhost;charset=utf8", $login, $password);
    static::$context = $this;
  }

  public static function table($name){
    return new Table($name);
  }

  public static function execute($query, $args = []){
    $prepare = static::$connection->prepare($query);
    $prepare->execute($args);
    return $prepare;
  }
}
?>
