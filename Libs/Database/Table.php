<?php
class Table implements IteratorAggregate{
  protected $name;
  private $where;
  private $select = false;

  public function __construct($name){
    $this->name = $name;
    $this->where = new Where();
  }

  public function createQuery(){
    $select = $this->select ? join(', ', $this->select) : '*';
    $table = $this->name;
    $where = $this->wherr.'' ? 'WHERE '.$this->where : '';
    return "SELECT $select FROM $table $where";
  }

  public function getIterator(){
    return new ArrayIterator($this->toList());
  }

  public function toList(){
    return Database::execute($this->createQuery())->fetchAll(PDO::FETCH_OBJ);
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
?>
