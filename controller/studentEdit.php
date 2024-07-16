<?php


include '../function.php';
$id = $_POST['st_id'];
$name = $_POST['st_name'];
$subject = $_POST['st_subject'];
$marks = $_POST['st_marks'];

$obj = new query();
$value = $obj->updateStudent($id,$name,$subject,$marks);
if($value){
  echo '<p class="text-success">Data Updated Successfully</p>';
}else{
  echo '<p class="text-success">Data Not Updated Successfully</p>';

}