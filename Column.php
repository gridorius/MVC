<?php
class Column{
  public $name;
  public $type;
  public $null = false;
  public $default = false;
  public $increment = false;
  public $primary = false;
  public $unique = false;

  public function __construct($name, $type){
    $this->name = $name;
    $this->type = $type;
  }

  public function primary(){
    $this->primary = true;
    return $this;
  }

  public function unique(){
    $this->unique = true;
    return $this;
  }

  public function increment(){
    $this->increment = true;
    return $this;
  }

  public function setDefault($default){
    $this->default = $default;
    return $this;
  }

  public function nullable(){
    $this->null = true;
    return $this;
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
