<?php

include 'database.php';



class query{
  
  function insertData($user,$name,$email,$pass){
    $obj = new connection();
    $mysql= $obj->connect();
    $sql = "INSERT INTO `registor`(username,name,email,password)VALUES('$user','$name','$email', '$pass')";
    $result = $mysql->query($sql);
    return $result;
        }
  function fetchData($email){
    $obj = new connection();
    $mysql= $obj->connect();
    $sql = "SELECT * FROM `registor` WHERE email = '$email'  ";
    $result = $mysql->query($sql);
      return $result;

       }
  function fetchuser($username){
    $obj = new connection();
    $mysql= $obj->connect();
    $sql = "SELECT * FROM `registor` WHERE username = '$username'  ";
    $result = $mysql->query($sql);
      return $result;
    
     }

   function userlogin($username,$password){
    $obj = new connection();
    $mysql= $obj->connect();
    $sql = "SELECT * FROM `registor` WHERE `username` = '$username' AND `password` ='$password' ";
    $result = $mysql->query($sql);
    $result = mysqli_num_rows($result);
    
      $_SESSION['user'] = $username;
    
     return $result;

      }

    function insertStudent($name,$subject,$mark){
    $obj = new connection();
    $mysql= $obj->connect();
    $sql = "INSERT INTO `student`(name,subject,marks)VALUES('$name','$subject','$mark')";
    $result = $mysql->query($sql);
    return $result;
      
  }

  function getAllStudent(){
    $obj = new connection();
    $mysql= $obj->connect();
    $sql = "SELECT * FROM `student` ORDER BY `id` DESC";
    $result = $mysql->query($sql);
    $response = [];
    while($row = $result->fetch_object()){
      $response[] = $row;
    }
    return $response;
      
  }

  function updateStudent($id,$name,$subject,$marks)
	{
		
		$mysq = new Connection;
		$mysqli = $mysq->connect();
		$sql = "UPDATE `student` SET `name`='$name',`subject`='$subject',`marks`='$marks' WHERE `id`='$id'";		
		$response = $mysqli->query($sql);
		$response = $mysqli->affected_rows;
		return $response;
		
	}

  function deleteStudent($id)
	{
		
		$mysq = new Connection;
		$mysqli = $mysq->connect();
		$sql = "DELETE FROM `student` WHERE `id`='$id'";		
		$response = $mysqli->query($sql);
		// $response = $mysqli->affected_rows;
		return $response;
		
	}




  


}