<?php 
include 'connection1.php'; 
session_start();
error_reporting(0);


$Name= $_SESSION['Name'];

$query="select Cust_id from customer where Name='$Name' ";

$ex=mysqli_query($con,$query);
$arr=mysqli_fetch_array($ex);
$Cust_id=$arr['Cust_id'];

if(isset($_POST['submit'])){
$Review= $_POST['review'];
$Rating= $_POST['rating'];
$Feedback_type=$_POST['feedback_type'];
$Cust_id=$_POST['number'];

$insert_query=" insert into feedback(Review,Rating,Feedback_type,Cust_id)
      values('$Review','$Rating','$Feedback_type','$Cust_id')";
    $res =  mysqli_query($con,$insert_query);
    if($res){
        ?>
        <script>
            alert("Feedback given successfully");
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
    <link rel="stylesheet" href="css2.css">
    <title>FEEDBACK</title>
</head>
<body>
<div class="container">
<form action="feedback.php" method="POST">
      <h1 class="main_heading">FEEDBACK FORM</h1>
      <p>Required fields are followed by *</p>
        <p>
            Review:
            <br>
             <textarea name="review" id="review" cols="50" rows="2" placeholder="Enter your review">
             </textarea>
            </p>
            <fieldset>
               <legend>Rating*</legend>
           <p>
           <select name="rating" id="rating" required>
           <option value="">---Select rating---</option>
                <option value="1">1</option>
                <option value="2">2</option> 
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
             </select>
           </p>
        </fieldset>
        <p>Feedback_type*:
            <select name="feedback_type" id="feedback_type" required>
                <option value="">---Select feedback type---</option>
                <option value="positive">Positive</option>
                <option value="negative">Negative</option>
            </select>
        </p>
        <p>Customer_id*
            <input type="number" name="number" value="<?php echo $arr['Cust_id'];?>" required>
        </p>
        <input type="submit" name="submit" value="Give feedback" >
    </form>
</div>
</body>
</html>