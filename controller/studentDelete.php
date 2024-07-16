<?php

include '../function.php';
$id= $_POST['st_id'];


$obj = new query();
$value = $obj->deleteStudent($id);
if($value){
  echo 'confirm("Are you sure")';
}else{
  echo '<p class="text-success">Data Not Deleted Successfully</p>';

}
