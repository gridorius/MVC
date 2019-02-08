<?php
class Table{
  private $name;
  private $columns = [];

  public function __construct($name){
    $this->name = $name;
  }

  public function addColumn($column){
    $this->columns[] = $column;
  }

  public function create(){
    $fields = [];
    foreach($this->columns as $column)
      $fields[] = $column->create();
    return join(',', $fields);
  }
}
?>
