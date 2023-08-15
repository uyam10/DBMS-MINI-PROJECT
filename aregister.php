<?php
include 'connection1.php';

error_reporting(0);

if(isset($_POST['submit'])){
$Name= $_POST['name'];
$Email=$_POST['email'];
$Password= md5($_POST['password']);
$Cpassword= md5($_POST['cpassword']);

if($Password == $Cpassword) {
    $insert_query="insert into isp(Name,Email,Password)
            values('$Name','$Email','$Password')";
            $res =  mysqli_query($con,$insert_query);
          if($res){ 
              echo "<script> alert('Registration Complete')</script>";
              $Name="";
              $Email="";
              $_POST['password']="";
              $_POST['cpassword']="";
          } else{
              echo "<script> alert('Something went wrong!Please try again.')</script>";
            }
        }
     else {
        echo "<script> alert('Password not matched' )</script>";
    }
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="arcss.css">
    <title>ADMIN REGISTER</title>
</head>
<body>
<div class="container">
<form action="aregister.php" method="POST">
      <h1 class="main_heading">ADMIN REGISTER FORM</h1>
      <p>Required fields are followed by *</p>
        <h2>---Admin Information---</h2>
        <p>Name:* <input type="text" name="name" placeholder="XXXX YYYY" value="<?php echo $Name; ?>" required></p>
        <p>Email:* <input type="email" name="email" id="email"  value="<?php echo $Email; ?>" required></p>
        <p>Password*: <input type="password" name="password" id="password" placeholder="Enter new password"   value="<?php echo $_POST['password']; ?>" required></p>
        <p>Confirm password*: <input type="password" name="cpassword" id="password" placeholder="Enter password"   value="<?php echo $_POST['cpassword']; ?>" required></p>
        <input type="submit" name="submit" value="Register" >
    </form>
</div>
</body>
</html>