<?php
class Users{
  public $user_id;
  public $login;
  public $password;
  public $files;
}

class UsersTableInfo extends TableInfo{
  public static $user_id;
  public static $login;
  public static $password;
  public static $book;

  public function __construct(){
    static::$user_id = (new Column('int(3)'))->increment();
    static::$login = new Column('varchar(100)');
    static::$password = new Column('varchar(100)');
    static::$book = new Column('int(3)');
  }
}

class UsersForeigns{
  public static $files;
  public static $book;

  public function __construct(){
    $files = static::$files = new ViaForeign();
    $files->setFrom('users', 'user_id');
    $files->setVia('user_files', 'user_id' ,'file_id');
    $files->setTo('files', 'file_id');
  }
}

new UsersTableInfo();
new UsersForeigns();
?>
