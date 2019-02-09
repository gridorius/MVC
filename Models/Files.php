<?php
class File{}

class FilesInfoTable extends InfoTable{
	public static $id;
	public static $file_name;

	public function __construct(){
		static::$id = (new Column('int(3)'))->primary()->increment();
		static::$file_name = (new Column('varchar(100)'));
	}
}

class FilesForeigns {
	public static $Users;

	public function __construct(){
		static::$Users = new ViaForeign();
		static::$Users->setFrom('Files', 'id');
		static::$Users->setVia('userfiles', 'file_id', 'user_id');
		static::$Users->setTo('Users', 'id');

	}
}

new FilesInfoTable();
new FilesForeigns();
?>
