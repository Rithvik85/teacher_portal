<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
  <div class="container w-25">
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-12 col-12 border mt-5 bg-light shadow-sm">
        <div class="header text-center">
          <h3>Ragistration</h3>
        </div>
        <form id="my_form">
          <div class="mb-3">
            <label for="exampleInputUser" class="form-label">Username</label>
            <input type="text" class="form-control" id="exampleInputUser" aria-describedby="userHelp" required>

          </div>
          <div class="mb-3">
            <label for="exampleInputName" class="form-label">Name</label>
            <input type="text" class="form-control" id="exampleInputName" aria-describedby="nameHelp" required>

          </div>
          <div class="mb-3">
            <label for="exampleInputEmail" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" required>

          </div>
          <div class="mb-3">
            <label for="exampleInputPassword" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword" required>
          </div>
          <div class="error" id="error_msg"></div>
          <div class="regis-btn text-center">
            <button type="button" class="btn btn-success form-control " id="registor">Registor</button>

            <p>Already have an account <a href="login.php">login</a></p>

          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

  <script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function () {
      $('#registor').click(function () {
        let user_name = $('#exampleInputUser').val()
        let name = $('#exampleInputName').val()
        let email = $('#exampleInputEmail').val()
        let pass = $('#exampleInputPassword').val()

        $.ajax({
          url: './controller/registorUser.php',
          type: 'POST',
          data: { user: user_name, username: name, useremail: email, userpass: pass },
          success: function (data) {
            $('#error_msg').html(data)
            $('#my_form').trigger("reset")

          }
        })
      })

    })
  </script>
</body>

</html>