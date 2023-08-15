<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vbill.css">
    <title>View Bill</title>
</head>
<body>
<div class="container">
    <h1>Your Bill</h1>
    <hr>
    <?php echo "<h3>Name: " . $_SESSION['Name'] . "</h3>"; ?>
    <br>
    <hr>
<?php

        include 'connection1.php';
        $Name= $_SESSION['Name'];
        $condition="select * from customer where Name='$Name'";
        
        $conquery=mysqli_query($con,$condition);

        $result=mysqli_fetch_array($conquery);
        $Cust_id=$result['Cust_id'];

        //Query to select the Entire table [MAIN QUERY]
        $selectquery=" select  *  from  bill where Cust_id='$Cust_id' " ; 

       



        //Executing the QUERY
        $query=mysqli_query($con,$selectquery);

        //Iterating through Entire table using while loop
        //Using MYSQLI Fetch fuction to show that table
        while($res=mysqli_fetch_array($query))
        {
     ?>

    <?php echo "<h3>Your Bill ID : " . $res['Bill_id'] . "</h3>"; ?>
    <br>
    <hr>
    <?php echo "<h3>Total Amount/month : " . $res['Amount'] . "</h3>"; ?>
    <br>
    <hr>
    <?php echo "<h3>Bill date : " . $res['Bill_date'] . "</h3>"; ?>
    <br>
    <hr>
    <?php echo "<h3>Customer ID : " . $res['Cust_id'] . "</h3>"; ?>
    <br>
    <hr>
            <?php
        }
        ?>
         <input type="submit" name="submit" value="Pay now" >
         </div>
</body>
  
</html> 