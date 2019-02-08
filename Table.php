<?php
class Table{
  private $name;
  private $database;
  private $columns = [];

  public function __construct($name, $database){
    $this->name = $name;
    $this->database = $database;
  }

  public function addColumns(){
    foreach(func_get_args() as $column)
      $this->columns[$column->name] = $column;
  }

  public function createQuery(){
    $fields = [];
    $primary = [];
    $unique = [];
    $constraints = [];

    foreach($this->columns as $column){
      $fields[] = $column->create();
      if($column->primary)
        $primary[] = $column->name;
      else if($column->unique)
        $unique[] = $column->name;
      else if($column->foreign)
        $constraints[] = $column->foreign->create();
    }

    $fields = join(', ', $fields);

    if(count($primary))
      $constraints[] = "CONSTRAINT primary_".$this->name." PRIMARY KEY (".join(', ', $primary).")";

    if(count($unique))
      $constraints[] = "CONSTRAINT unique_".$this->name." UNIQUE (".join(', ', $unique).")";

    if(count($constraints))
      $fields.= ', '.join(', ', $constraints);

    $create = "CREATE TABLE ".$this->name."($fields)";

    return $create;
  }

  public function create(){
    $this->database->execute($this->createQuery());
  }
}
?>
