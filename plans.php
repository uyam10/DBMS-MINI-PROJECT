

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="plans.css">
    <title>PLANS</title>
</head>
<body>
<div class="container">
<form action="plans.php" method="POST">
      <h1 class="main_heading">ADD PLANS</h1>
        <p>Amount: <input type="text" name="amount" id="amount"  required></p>
        <p>Description: <input type="text" name="desc"  required>
        </p>
        <p>Admin ID: <input type="number" name="number" id="number" required></p>
        <input type="submit" name="submit" value="Add this plan" >
    </form>
</div>
</body>
</html>
<?php
 include "connection1.php";
 error_reporting(0);
 if(isset($_POST['submit'])){
    $Amount= $_POST['amount'];
    $Description= $_POST['desc'];
    $Admin_id= $_POST['number'];

    if($Amount<0){
        ?>
        <script>
            alert("Woops!Amount cannot be negative.");
      </script>
        <?php
        }
    $insert_query=" insert into plan(Amount,Description,Admin_id)
          values('$Amount','$Description','$Admin_id')";
        $res =  mysqli_query($con,$insert_query);
        if($res){
            ?>
            <script>
                alert("Plan has been added!");
                </script>
                <?php
        }else{
    
        ?>
            <script>
                alert("data not inserted successfully");
                </script>
                <?php
        }
    }
 ?>
