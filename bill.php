<?php 
include 'connection1.php'; 
session_start();
error_reporting(0);

$id=$_GET['cid'];



$Name= $_SESSION['Name'];

$query="select Isp_id from isp where Name='$Name' ";




$ex=mysqli_query($con,$query);
$arr=mysqli_fetch_array($ex);
$Admin_id=$arr['Isp_id']; 


if(isset($_POST['submit'])){
$Amount=$_POST['amount'];
$Bill_date= $_POST['date'];
$Admin_id=$_POST['number'];
$Cust_id=$_POST['Cust_id'];
$insert_query=" insert into bill(Amount,Bill_date,Cust_id,Isp_id)
      values('$Amount','$Bill_date','$Cust_id','$Admin_id')";
    $res =  mysqli_query($con,$insert_query);
    if($res){
        ?>
        <script>
            alert("Bill has been issued!");
            </script>
            <?php
    }else{
    ?>
        <script>
            alert("Woops! error.");
            </script>
            <?php
    }
}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bill.css">
    <title>BILL</title>
</head>
<body>
<div class="container">
<form action="bill.php" method="POST">
      <h1 class="main_heading">BILL</h1>
        <p>Amount:* <input type="text" name="amount" required>
        </p>
        <p>Bill_date:* <input type="date" name="date" id="date"></p>
        
        <p style="    margin-bottom: 38px;
    margin-top: 27px;">Customer ID:<?php  echo $id; ?> </p> 
 <p>Customer ID:* <input type="number" name="Cust_id" value="<?php echo $arr['Cust_id'];?>" required></p>
        <p>Admin ID:* <input type="number" name="number" value="<?php echo $arr['Isp_id'];?>" required></p>
        <input type="submit" name="submit" value="Issue bill" >
    </form>
   
</div>
</body>
</html>