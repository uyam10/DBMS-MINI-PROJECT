<?php
include 'connection1.php';

session_start();
error_reporting(0);

if(isset($_POST['submit'])){
  $Email=$_POST['email'];
  $Password= md5($_POST['password']);

  $insert_query= "SELECT * FROM customer WHERE Email='$Email' AND Password='$Password'";
  $res =  mysqli_query($con,$insert_query);
  if($res->num_rows > 0){
    $row = mysqli_fetch_assoc($res);
    $_SESSION['Name']=$row['Name'];
    header("Location: customer.php");
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
    <link rel="stylesheet" href="homecss.css">
    <title>HOMEPAGE</title>
</head>
<body>
<nav id="navbar">
    <ul>
        <li class="item"><a href="register.php" target="_blank">Register</a></li>
        <li class="item"><a href="plan.php" target="_blank">Plans</a></li>
        <li class="item"><a href="admin.php" target="_blank">Admin</a></li>
        <li class="item"><a href="#">Help</a></li>
    </ul>
    </nav>    
    
    <section id="home"> 
    <div class="login-box">
  <h2> Customer login</h2>
  <form action="" method="POST">
    <div class="user-box">
      <input type="email" name="email" value="<?php echo $Email; ?>" required>
      <label>Email</label>
    </div>
    <div class="user-box">
      <input type="password" name="password" value="<?php echo $_POST['password']; ?>" required>
      <label>Password</label>
    </div>
    <a href="#">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <input type="submit" name="submit" value="Log in" >
    </a>
  </form>
</div>
</section>
</div>
</body>
</html>