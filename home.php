<?php
session_start();
  
$con = mysqli_connect("localhost","root","","Test");


if(!isset($_SESSION['user_email'])){

echo "<script>window.open('index.php','_self')</script>";

}

else {
  $email = $_SESSION['user_email'];
  $query = mysqli_query($con,"select user_diary from diary_users where user_email='$email' ");
  $data = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Secret diary</title>
	<meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="IE=edge, chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<nav class="navbar navbar-fixed-top navbar-expand-lg bg-white" role="navigation" id="navigation">
 <div class="container-fluid"> 
     <a class="navbar-brand" href="#">Secret Diary</a>
     <div class=""><a href="logout.php" class="btn btn-outline-success">logout</a>
     </div>
 </div>
</nav>
<div class="container-fluid">
 <form action="insert_thought.php" method="post" name="userdata"> 
	<textarea id="notes" name="notes" onmouseleave="return data()"><?php  echo $data['user_diary'];   ?></textarea>
</form>
</div>

<script type="text/javascript">
  function data(){
    document.forms["userdata"].submit();
  }
</script>	
</body>
</html>
<?php } ?>