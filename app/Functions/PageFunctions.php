<?php
session_start();

function validateDate($date, $format = 'Y-m-d')
{
    $d = DateTime::createFromFormat($format, $date);
    // The Y ( 4 digits year ) returns TRUE for any integer with any number of digits so changing the comparison from == to === fixes the issue.
    return $d && $d->format($format) === $date;
}

function transform_result2array($result,$key,$value)
{
  for( $i=0,$obj=$result[0];$i<sizeof($result);$i++){
    $obj=$result[$i];
    $ret[$obj->$key] = $obj->$value;
  }
  return $ret;
}

function aasort (&$array, $key) {
  $sorter=array();
  $ret=array();
  reset($array);
  foreach ($array as $ii => $va) {
      $sorter[$ii]=$va[$key];
  }
  asort($sorter);
  foreach ($sorter as $ii => $va) {
      $ret[$ii]=$array[$ii];
  }
  $array=$ret;
}

function get_form_value($var_name)
{
  return request()->get($var_name)?request()->get($var_name):request()->old($var_name);
}

function get_form_sub_array_value($var_name,$index,$sub_index)
{
  if( isset($_POST[$var_name][$index][$sub_index]) )
    return $_POST[$var_name][$index][$sub_index];
}

function swap(&$x, &$y) {
  $tmp=$x;
  $x=$y;
  $y=$tmp;
}

?>
