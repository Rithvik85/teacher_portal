<?php
include 'function.php';
$obj = new query();
$value = $obj->getAllStudent();

foreach($value as $row){
    $id = $row->id;
    $name = $row->name;
    $subject = $row->subject;
    $marks = $row->marks;

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Student</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold text-success" href="#">TEACHER PORTAL</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      
    </div>
  </div>
</nav>

<div class="form-box container w-50 mt-5   bg-white">
<div class="back-btn text-end" >
<a href="dashboard.php" class="btn btn-primary mb-2 fw-bold">BACK</a>
</div>
  
    <form id="my_form" class="border p-2 shadow">
      <div class="header text-center ">
        <h3 class="fw-bold">Edit Student Details </h3>
      </div>

      <div class="mb-3">
    
    <input type="hidden" class="form-control" id="exampleInputid" aria-describedby="idHelp" value="<?=  $id ?>">
    
  </div>
  <div class="mb-3">
    <label for="exampleInputName" class="form-label">Name</label>
    <input type="text" class="form-control" id="exampleInputname" aria-describedby="nameHelp" value="<?=  $name ?>">
    
  </div>
  <div class="mb-3">
    <label for="exampleInputsubject" class="form-label">Subject</label>
    <input type="text" class="form-control" id="exampleInputsubject" value="<?= $subject ?>">
  </div>
  <div class="mb-3">
    <label for="exampleInputmarks" class="form-label">Marks</label>
    <input type="text" class="form-control" id="exampleInputmarks" value="<?=  $marks ?>">
  </div>
  <div class="" id="msg"></div>
  <div class="text-center">
  <button type="button" class="btn btn-success form-control fw-bold" id="UpdateStudent">Update</button>
  </div>
</form>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<script>

  $(document).ready(function(){
    $('#UpdateStudent').click(function(){
      let id = $('#exampleInputid').val()
      let name = $('#exampleInputname').val()
      let subject = $('#exampleInputsubject').val()
      let mark = $('#exampleInputmarks').val()
      $.ajax({
        url:'./controller/studentEdit.php',
        type:'POST',
        data:{st_id:id,st_name:name,st_subject:subject,st_marks:mark,},
        success:function(data){
          $('#msg').html(data);

          $('#my_form').trigger("reset")


        }
      })
    })
  })

</script>
  
</body>
</html>