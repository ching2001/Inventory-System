
<?php
  if(isset($_POST['save'])){
      $conn = mysqli_connect("localhost", "root", "", "students");
      $user = $_POST['user'];
      $email = $_POST['email'];
      $password = $_POST['password']; 
      $cpassword = $_POST['cpassword'];
      $sql = "SELECT * FROM studentdata WHERE email = '{$email}'";
      $res = mysqli_query($conn, $sql);
      if(mysqli_num_rows($res)>0){
       echo "<div class='alert alert-danger'>Email already exist</div>";
      }
      else{
          if($password===$cpassword){
              $pass=md5($password);
              $sql1 = "INSERT INTO studentdata(username, email, password) VALUES('{$user}', '{$email}', '{$pass}')";
               if(mysqli_query($conn, $sql1)){
                echo "<div class='alert alert-danger'>Hello $user You have registered successfuly </div>";
               }else{
                   echo "Error"; 
               }
            }else{
            echo "<div class='alert alert-danger'>Password are not matching</div>";
           }
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<style>
body{
    background:url("images/back1.jpg");
    background-size:cover;
    color:snow;
}
.container{
    margin-top:95px;
}
form{
    padding:40px;
    background:#303952;
    box-shadow: 20px 30px 0px #130f40, -20px 30px 0px #130f40;
}    
</style>
<body>
      <div class="container">
        <div class="row">
         <div class="offset-md-4 col-md-4">
           <form action="<?php echo  $_SERVER['PHP_SELF']?>" method="POST">
            <h1 class="text-center">Register</h1>
            <div class="form-group">
             <label for="">Username</label>
             <input type="text" name="user" placeholder="Username" class="form-control">
            </div>
            <div class="form-group">
             <label for="">Email</label>
             <input type="email" name="email" placeholder="Email" class="form-control">
            </div>
            <div class="form-group">
             <label for="">Password</label>
             <input type="password" name="password" placeholder="password" class="form-control">
            </div>
            <div class="form-group">
             <label for="">Confirm Password</label>
             <input type="password" name="cpassword" placeholder="Confirm password" class="form-control">
            </div>
            <div class="form-group my-2">
             <input type="submit" name="save" class="form-control btn btn-success" value="Register">
            </div>
            <div class="form-group my-2">
            Already have a account? <span><a href="index.php">Login</a></span>
            </div>
           </form>  
         </div>   
        </div>
      </div>
</body>
</html>