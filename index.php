<?php session_start();
  if(isset($_SESSION['user_email'])){
    header('location:home.php');
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Secret diary</title>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="IE=edge, chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css"> 
</head>

<body>
  <div class="container text-center">
    <h1 class="heading">Secret Diary</h1>
    <h4>Store your thoughts permanently and securely</h4>
    <div id="errors" class="alert alert-danger mx-auto col-md-4" style="display:none;"></div>
    <h4>Login using your username and password</h4>

    <div class="row">
      <div class="col-md-offset-3 col-md-4 mx-auto">
        <form method="POST" action="" onsubmit="return validation()" id="submit" name="myform">
          <div class="form-group">
            <input id="email" type="email" class="form-control" name="email" autocomplete placeholder="Your Email">
          </div>
          <div class="form-group">
            <input id="password" type="password" class="form-control" name="password" autocomplete placeholder="Password" >
          </div>
          <div class="form-group">
            <label style="padding-left: 10px; color: #000;"> <input type="checkbox" name="rememberme" id="remember_me" >&nbsp;&nbsp;Stay logged in</label>
          </div>
          <div class="form-group">
            <input type="submit" class="btn btn-success" name="log_in" value="Log In!" style="padding:6px 20px;">
          </div>
        </form>
        <div class="sign_up"><a href="signup.php" style="font-weight: bold;text-decoration: underline; ">Sign up</a></div>
      </div>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script>
    function validation() {
      var email = document.myform.email.value;
      var password = document.myform.password.value;
      var errors = "";
      if (!email) {
        errors = errors.concat("<p>Please enter the email address</p>");
      } 
      console.log("checking password now!");
      if(!password){
        console.log("Please enter the password");
        errors = errors.concat("<p>Please enter password</p>");
      }
      if (errors) {
        document.getElementById('errors').style.display = "block";
        document.getElementById('errors').innerHTML = errors;
        return false;
      }
    }
  </script>
</body>
</html>
 <?php
      $con = mysqli_connect("localhost", "root", "", "test");
      if (isset($_POST['log_in'])&& isset($_POST['password'])){
        $email = htmlentities(mysqli_real_escape_string($con, $_POST['email']));
        $password = htmlentities(mysqli_real_escape_string($con, $_POST['password']));
        $pass=$_POST['password'];
        $user_login = "select * from diary_users where user_email = '$email' and user_password = md5($pass)";
        $user_login_query = mysqli_query($con, $user_login);
        if (!$user_login_query || mysqli_num_rows($user_login_query) == 0){
          echo "<script>alert('check your email and password!')</script>";
        }else{
            $_SESSION['user_email'] = $email;
            $user_email = $_SESSION['user_email'];
            echo "<script>window.open('home.php','_self')</script>";
          }
        }
 ?> 