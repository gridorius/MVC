<?php
class Column{
  private $name;
  private $type;
  private $null;
  private $key;
  private $default;
  private $extra;

  public function __construct($name, $type){
    $this->name = $name;
    $this->type = $type;
  }
}
?>
