<?php
include 'connection1.php';

session_start();
error_reporting(0);

if(isset($_POST['submit'])){
  $Email=$_POST['email'];
  $Password= md5($_POST['password']);

  $insert_query= "SELECT * FROM isp WHERE Email='$Email' AND Password='$Password'";
  $res =  mysqli_query($con,$insert_query);
  if($res->num_rows > 0){
    $row = mysqli_fetch_assoc($res);
    $_SESSION['Name']=$row['Name'];
    header("Location: admin1.php");
  }else {
    echo "<script> alert('Incorrect email or password!Please try again.')</script>";
  }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="acss.css">
    <title>ADMIN</title>
</head>
<body>
<div id="bg"></div>
<form action="admin.php" method="POST">
  <div class="form-field">
    <input type="email" name="email" placeholder="Email" value="<?php echo $Email; ?>" required>
  </div>
  <div class="form-field">
    <input type="password" name="password" placeholder="Password" value="<?php echo $_POST['password']; ?>" required>         
    </div>
  <div class="form-field">
    <button class="btn" type="submit" name="submit">Log in</button>
   <?php
    //<a href= " aregister.php "> Register</a>
   ?>
  </div>
</form>
</body>
</html>

