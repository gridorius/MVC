<?php
class TableInfo{
  public function __construct($name){
    $this->name = $name;
  }

  public function addColumns(){
    foreach(func_get_args() as $column)
      $this->columns[$column->name] = $column;
  }

  public static function createTable(){
    $fields = [];
    $primary = [];
    $unique = [];
    $constraints = [];

    $name = preg_replace('/TableInfo/', '', static::class);
    $infoClass = new ReflectionClass(static::class);
    $columns = $infoClass->getStaticProperties();
    $foreigns = (new ReflectionClass("{$name}Foreigns"))->getStaticProperties();

    foreach($columns as $key => $column){
      $fields[] = $key.' '.$column->create();
      if($column->primary)
        $primary[] = $key;
      else if($column->unique)
        $unique[] = $key;
      else if($foreigns[$key])
        $constraints[] = $foreigns[$key]->getQuery();
    }

    $fields = join(', ', $fields);

    if(count($primary))
      $constraints[] = "CONSTRAINT primary_".$name." PRIMARY KEY (".join(', ', $primary).")";

    if(count($unique))
      $constraints[] = "CONSTRAINT unique_".$name." UNIQUE (".join(', ', $unique).")";

    if(count($constraints))
      $fields.= ', '.join(', ', $constraints);

    $create = "CREATE TABLE ".$name."($fields)";
    
    Database::execute($create);
  }
}
?>
