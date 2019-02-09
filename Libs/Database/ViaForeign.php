<?php
class ViaForeign{
  public $from_name;
  public $to_name;
  public $via_name;
  public $from_col;
  public $to_col;
  public $via_from;
  public $via_to;

  public function setFrom($table, $column){
    $this->from_name = $table;
    $this->from_col = $column;
  }

  public function setTo($table, $column){
    $this->to_name = $table;
    $this->to_col = $column;
  }

  public function setVia($table, $column_from, $column_to){
    $this->via_name = $table;
    $this->via_from = $column_from;
    $this->via_to = $column_to;
  }

  public function getQuery(){
    $to = $this->to_name;
    $via = $this->via_name;
    $to_col = $this->to_col;
    $via_to = $this->via_to;
    $via_from = $this->via_from;
    return "SELECT * FROM $to INNER JOIN $via  ON $to.$to_col = $via.$via_to  WHERE $via.$via_from = ";
  }
}
?>
