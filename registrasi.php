<?php
require 'functions.php';

if (isset($_POST["registrasi"])) {
  if (registrasi($_POST) > 0) {
    echo "<script>
            alert('User baru barhasil ditambahkan');
          </script>";
  } else {
    echo mysqli_error($conn);
  }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Register</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

</head>

<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-4">
        <h1 class='mt-2'>Registrasi</h1>
        <form action="" method="POST">
          <div class="form-group">
            <label for="username">Username :</label>
            <input class="form-control" id="username" type="text" name="username">
          </div>
          <div class="form-group">
            <label for="password">Password :</label>
            <input class="form-control" id="password" type="password" name="password">
          </div>
          <div class="form-group">
            <label for="password2">Confirmasi Password :</label>
            <input class="form-control" id="password2" type="password" name="password2">
          </div>
          <button name="registrasi" class="btn btn-primary" type="submit">Registrasi</button>
        </form>
      </div>
    </div>
  </div>
</body>

</html>