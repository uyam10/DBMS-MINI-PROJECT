<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="custcss.css">
    <title>Welcome</title>
</head>
<body>
<?php echo "<h1>Welcome " . $_SESSION['Name'] . "</h1>"; ?>
<?php
        include 'connection1.php';

        $condition="select * from customer";
        
        $conquery=mysqli_query($con,$condition);

        $result=mysqli_fetch_array($conquery);

        $Cust_id=$result['Cust_id'];
        $Email=$result['Email'];

        $Name= $_SESSION['Name'];

        //Query to select the Entire table [MAIN QUERY]
        $selectquery=" select  *  from  customer where Name='$Name' " ; 

        

        //Executing the QUERY
        $query=mysqli_query($con,$selectquery);

        //Iterating through Entire table using while loop
        //Using MYSQLI Fetch fuction to show that table
        while($res=mysqli_fetch_array($query))
        {
     ?>

    <?php echo "<h4>Your Customer ID : " . $res['Cust_id'] . "</h4>"; ?>
   <?php $c1=$res['Cust_id']; ?>
    <?php echo "<h4>Your Email : " . $res['Email'] . "</h4>"; ?>
            <?php
        }
        ?>
<form action="" method="post">
    <a class=" delete" href="logout.php" style="
    float: right;
    margin-top: -65px;
    background: red;
    padding: 18px;
    margin-left:10px;
    font-size:18px;
    ">Logout</a>
    <hr>
    <br>
    <br>
    <br>
    <section>
    <a class="hello" href="plan.php">Available plans</a>
    </section>
    <br>
    <br>
    <br>
    <section>
    <a class="hello" href="account.php">Fill account details</a>
    </section>
    <br>
    <br>
    <br>
    <section>
    <a class="hello" href="feedback.php">Give feedback</a>
   </section>
    <br>
    <br>
    <br>
    <section>
    <a class="hello" href="vbill.php">View bill</a>
   </section>
</body>
</html>