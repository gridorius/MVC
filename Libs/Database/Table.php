<?php
class Table implements IteratorAggregate{
  protected $name;
  protected $columns = [];
  private $where;
  private $select = false;
  private $rows = [];

  public function __construct($name){
    $this->name = $name;
    $this->where = new Where();
  }

  public function addColumns(){
    foreach(func_get_args() as $column)
      $this->columns[$column->name] = $column;
  }

  public function createQuery(){
    $select = $this->select ? join(', ', $this->select) : '*';
    $table = $this->name;
    $where = $this->where;
    return "SELECT $select FROM $table WHERE $where";
  }

  public function getIterator(){
    Database::execute($query);
  }

  public function where(){
    (new ReflectionMethod('Where', 'where'))->invokeArgs($this->where, func_get_args());
    return $this;
  }

  public function orWhere(){
    (new ReflectionMethod('Where', 'orWhere'))->invokeArgs($this->where, func_get_args());
    return $this;
  }

  public function select(){
    $this->select = func_get_args();
    return $this;
  }
}



class NewTable extends Table{

  public function createTable(){
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
    Database::execute($this->createTable());
  }
}
?>
