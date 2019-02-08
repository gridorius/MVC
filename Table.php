<?php
class Table{
  private $name;
  private $columns = [];

  public function __construct($name){
    $this->name = $name;
  }

  public function addColumns(){
    foreach(func_get_args() as $column)
      $this->columns[] = $column;
  }

  public function create(){
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
    }

    $fields = join(', ', $fields);

    if(count($primary))
      $constraints[] = "CONSTRAINT _".$this->name." PRIMARY KEY (".join(', ', $primary).")";

    if(count($unique))
      $constraints[] = "CONSTRAINT __".$this->name." UNIQUE (".join(', ', $unique).")";

    if(count($constraints))
      $fields.= ', '.join(', ', $constraints);

    $create = "CREATE TABLE ".$this->name."($fields)";

    return $create;
  }
}
?>
