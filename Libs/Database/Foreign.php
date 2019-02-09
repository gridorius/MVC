<?php
class Foreign{
  public $to_name;
  public $from_name;
  public $to_col;
  public $from_col;

  public function setFrom($table, $column){
    $this->from_name = $table;
    $this->from_col = $column;
  }

  public function setTo($table, $column){
    $this->to_name = $table;
    $this->to_col = $column;
  }

  public function create(){
    return 'CONSTRAINT '.$this->from_col.'_'.$this->from_name.' FOREIGN KEY ('.$this->to_col.')
    REFERENCES '.$this->from_name.'('.$this->from_col.')';
  }
}
?>
