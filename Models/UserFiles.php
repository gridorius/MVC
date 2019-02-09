<?php
class UserFile{}

class UserFilesInfoTable extends InfoTable{
	public static $user_id;
	public static $file_id;

	public function __construct(){
		static::$user_id = (new Column('int(3)'));
		static::$file_id = (new Column('int(3)'));
	}
}

class UserFilesForeigns {
	public static $Users;
	public static $Files;

	public function __construct(){
		static::$Users = new Foreign();
		static::$Users->setFrom('Users', 'id');
		static::$Users->setTo('userfiles', 'user_id');

		static::$Files = new Foreign();
		static::$Files->setFrom('Files', 'id');
		static::$Files->setTo('userfiles', 'file_id');

	}
}

new UserFilesInfoTable();
new UserFilesForeigns();
?>
