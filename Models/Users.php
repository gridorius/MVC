<?php
class User{}

class UsersInfoTable extends InfoTable{
	public static $id;
	public static $login;
	public static $password;
	public static $book;

	public function __construct(){
		static::$id = (new Column('int(3)'))->primary()->increment();
		static::$login = (new Column('varchar(100)'));
		static::$password = (new Column('varchar(100)'));
		static::$book = (new Column('int(3)'));
	}
}

class UsersForeigns {
	public static $Files;

	public function __construct(){
		static::$Files = new ViaForeign();
		static::$Files->setFrom('Users', 'id');
		static::$Files->setVia('userfiles', 'user_id', 'file_id');
		static::$Files->setTo('Files', 'id');

	}
}

new UsersInfoTable();
new UsersForeigns();
?>
