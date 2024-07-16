<?php
include '../function.php';


$obj = new query();

$username = $_POST['user'];
// echo $username;
// die;



$password = $_POST['userpass'];


$value = $obj->userlogin($username,$password);
// print_r($value);
// die;
// echo $value;
// die;



// print_r($value);
// die;
if($value > 0){

   
 echo "1";
  
}else{
  // echo '<p class="text-danger">login Failed</p>';
  echo "0";

}