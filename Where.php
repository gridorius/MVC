<?php
class Where{
  public $where = '';

  public function where(){
    $ca = func_num_args();
    $args = func_get_args();

    if(!empty($this->where))
      $this->where.= ' AND';

    $this->whereWrite($ca, $args);
    return $this;
  }

  public function orWhere(){
    $ca = func_num_args();
    $args = func_get_args();

    if(!empty($this->where))
      $this->where.= ' OR';

    $this->whereWrite($ca, $args);
    return $this;
  }

  public function whereWrite($ca, $args){
    if($ca == 1)
      $this->where.= ' ('.$args[0](new Where())->get().')';
    else if($ca == 2)
      $this->where.= ' '.$args[0].' = '.$args[1];
    else if($ca == 3)
      $this->where.= ' '.$args[0].' '.$args[1].' '.$args[2];
  }

  public function get(){
    return $this->where;
  }
}
?>
