<?Php

include 'function.php';
session_start();
 $obj = new query();
 $value = $obj->getAllStudent();

// echo $_SESSION['user'];
// die;

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<style>
  .popup {
        width: 700px;
        height: 350px;
        box-shadow: 2px 2px 2px 2px rgba(0, 0, 0, 0.3);
        position: fixed;
        inset: 0;
        margin: auto;
        border-radius: 10px;
        transform: scale(0);
        transition: transform 0.25s ease-in-out;
      }
      .open.popup {
        transform: scale(1);
      }
      .close-icon {
        position: absolute;
        right: 16px;
        font-size: 24px;
        font-weight: 700;
        cursor: pointer;
      }
</style>
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
        
      </ul>
      <form >
        <a href="logout.php" class="btn btn-primary">logout</a>
      </form>
      
    </div>
  </div>
</nav>
  
<div class="container table-section mt-5 w-50 ">
  <div class="add-btn text-end">
  <button class="addStudent btn btn-primary fw-bold">Add student</button>
  </div>
  <div class="popup bg-light">
    <div class="close-icon">&times;</div>
    <div class="form-box container mt-1  border bg-white">
    <form id="my_form">
      <div class="header text-center">
        <h3 class="fw-bold">Student Details</h3>
      </div>
  <div class="mb-3">
    <label for="exampleInputName" class="form-label">Name</label>
    <input type="text" class="form-control" id="exampleInputname" aria-describedby="nameHelp">
    
  </div>
  <div class="mb-3">
    <label for="exampleInputsubject" class="form-label">Subject</label>
    <input type="text" class="form-control" id="exampleInputsubject">
  </div>
  <div class="mb-3">
    <label for="exampleInputmarks" class="form-label">Marks</label>
    <input type="text" class="form-control" id="exampleInputmarks">
  </div>
  <div class="" id="msg"></div>
  <div class="text-center">
  <button type="button" class="btn btn-success form-control fw-bold" id="addStudent">Add</button>
  </div>
</form>
</div>
      
    </div>
    <div id="deletemsg"></div>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">S.NO</th>
      <th scope="col">Name</th>
      <th scope="col">Subject</th>
      <th scope="col">Marks</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    
  <?php
  $i = 1;
  foreach($value as $row){
    $id = $row->id;
    $name = $row->name;
    $subject = $row->subject;
    $marks = $row->marks;

 ?>
  
    <tr>
      <td><?= $i++ ?></td>
      <td><?= $name ?></td>
      <td><?= $subject ?></td>
      <td><?= $marks ?></td>
      <td><a href="updateStudent.php?id=<?= $id ?>" class=" btn btn-success fw-bold"><i class="bi bi-pencil-square"></i> Edit</a>&nbsp;&nbsp;
      <button class="btn btn-danger fw-bold" id="deletebtn" data-id="<?= $id ?>"><i class="bi bi-pencil-square"></i> Delete</button></td>
    </tr>

    <?php }?>
   
    
  </tbody>
</table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
  let button =document.querySelector('.addStudent')
  let popup = document.querySelector(".popup");
  let close_icon = document.querySelector(".close-icon");
      button.addEventListener("click", (e) => {
        popup.classList.add("open");
        e.stopPropagation();
      });
      close_icon.addEventListener("click", (e) => {
        popup.classList.remove("open");
      });
      popup.addEventListener("click", (e) => {
        e.stopPropagation();
      });
      window.addEventListener("click", () => {
        popup.classList.remove("open");
      });
 



</script>


<script>
  $(document).ready(function(){
    $('#addStudent').click(function(){
      let name = $('#exampleInputname').val()
      let subject = $('#exampleInputsubject').val()
      let mark = $('#exampleInputmarks').val()
      $.ajax({
        url:'./controller/addStudent.php',
        type:'POST',
        data:{st_name:name,st_subject:subject,st_marks:mark,},
        success:function(data){
          $('#msg').html(data);

          $('#my_form').trigger("reset")


        }
      })
    })

    


  })
  $(document).ready(function(){
    $(document).on('click','#deletebtn',function(){
        let id = $(this).data("id");
        
        // Ask for confirmation before proceeding
        if(confirm("Are you sure you want to delete this record?")) {
            $.ajax({
                url: './controller/studentDelete.php',
                type: 'POST',
                data: { st_id: id },
                success: function(data){
                  location.reload()
                  
                }
            });
        }
    });
});

</script>
</body>
</html>