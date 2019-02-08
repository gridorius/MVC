<?php
class Foreign{
  public $for_table;
  public $ref_table;
  public $for_column;
  public $ref_column;

  public function __construct($ref_column, $ref_table){
    $this->for_column = $for_column;
    $this->ref_column = $ref_column;
    $this->ref_table = $ref_table;
  }

  public function setForColumn($for_column){
    $this->for_column = $for_column;
  }

  public function setForTable($for_table){
    $this->for_table = $for_table;
  }

  public function create(){
    return 'CONSTRAINT '.$this->for_column.'_'.$this->ref_table.' FOREIGN KEY ('.$this->for_column.')
    REFERENCES '.$this->ref_table.'('.$this->ref_column.')';
  }
}
?>
