<?php

include '../function.php';
$name = $_POST['st_name'];
$subject = $_POST['st_subject'];
$marks = $_POST['st_marks'];

$obj = new query();
$value = $obj->insertStudent($name,$subject,$marks);
if($value){
  echo '<p class="text-success">Data Added Successfully</p>';
}else{
  echo '<p class="text-success">Data Added Successfully</p>';

}
