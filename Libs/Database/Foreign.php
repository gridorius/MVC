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

  public function getQuery(){
    return 'CONSTRAINT '.$this->from_col.'_'.$this->from_name.' FOREIGN KEY ('.$this->from_col.')
    REFERENCES '.$this->to_name.'('.$this->to_col.')';
  }
}
?>
