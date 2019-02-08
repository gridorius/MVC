<?php
class Column{
  private $name;
  private $type;
  private $null = false;
  private $default = false;
  private $increment = false;
  private $primary = false;
  private $unique = false;

  public function __construct($name, $type){
    $this->name = $name;
    $this->type = $type;
  }

  public function primary(){
    $this->primary = true;
  }

  public function unique(){
    $this->unique = true;
  }

  public function increment(){
    $this->increment = true;
  }

  public function setDefault($default){
    $this->default = $default;
  }

  public function nullable(){
    $this->null = true;
  }

  public function create(){
    $column = $this->name.' '.$this->type;
    $column.= $this->null ? ' NULL' : ' NOT NULL';
    $column.= $this->default ? " DEFAULT ".$this->default : '';
    $column.= $this->increment ? ' AUTO_INCREMENT' : '';

    return $column;
  }
}
?>
