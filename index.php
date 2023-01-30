<?php
if (isset($_POST['submit'])) {
  $conn = mysqli_connect("localhost", "root", "", "students");
  $email = $_POST['email'];
  $password = $_POST['password'];
  $incpass = md5($password);
  $sql = "SELECT * FROM studentdata WHERE email = '{$email}'";
  $res = mysqli_query($conn, $sql);
  if (mysqli_num_rows($res) > 0) {
    $row = mysqli_fetch_assoc($res);
    $pass = $row['password'];
    if ($pass == $incpass) {
      session_start();
      $_SESSION['user'] = $row['username'];
      $_SESSION['image'] = $row['image'];
      header("location://localhost/register/Homepage.php");
    } else {
      echo "<div class='alert alert-danger'>Invalid password</div>";
    }
  } else {
    echo "<div class='alert alert-danger'>Invalid email</div>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<style>
  body {
    background: url("images/back1.jpg");
    background-size: cover;
    color: snow;
  }

  .container {
    margin-top: 185px;
  }

  form {
    padding: 40px;
    background: #303952;
    box-shadow: 20px 30px 0px #130f40, -20px 30px 0px #130f40;
  }
</style>

<body>
  <div class="container">
    <div class="row">
      <div class="offset-md-4 col-md-4">
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
          <h1 class="text-center">Login</h1>
          <div class="form-group">
            <label for="">Email</label>
            <input type="email" name="email" placeholder="Email" class="form-control">
          </div>
          <div class="form-group">
            <label for="">Password</label>
            <input type="password" name="password" placeholder="password" class="form-control">
          </div>
          <div class="form-group my-2">
            <input type="submit" name="submit" class="form-control btn btn-success" value="Login">
          </div>
          <div class="form-group my-2">
            Not have a account? <span><a href="register.php">Register</a></span>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>