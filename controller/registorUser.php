<?php
include '../function.php';
$user = $_POST['user'];
$username = $_POST['username'];
$useremail = $_POST['useremail'];
$userpassword = $_POST['userpass'];

$obj = new query();
if ($user == '' && $username == '' && $useremail == '' && $userpassword == '') {
  echo '<p class="text-danger">All Field Required</p>';
} else {
   $res = $obj->fetchuser($user);
   $count = mysqli_num_rows($res );
   if($count>0){
    echo '<p class="text-danger">Username already in  use</p>';

   }else{
    $value = $obj->fetchData($useremail );
  $total = mysqli_num_rows($value );
  if ($total> 0) {
    echo '<p class="text-danger">Email already in  use</p>';

  } else {
    $mysql = $obj->insertData($user, $username, $useremail, $userpassword);
    if ($mysql) {
      echo '<p class="text-success">Registration Successfully</p>';

    } else {

      echo '<p class="text-danger">Registration Failed</p>';

    }

  }

   }

  




}


