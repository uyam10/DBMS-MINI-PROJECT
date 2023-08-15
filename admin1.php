<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="a1css.css">
    <title>Welcome</title>
</head>
<body>
<?php echo "<h1>Welcome " . $_SESSION['Name'] . "</h1>"; ?>
<?php
        include 'connection1.php';

        $condition="select * from isp";
        
        $conquery=mysqli_query($con,$condition);

        $result=mysqli_fetch_array($conquery);

        $Admin_id=$result['Isp_id'];

        $Name= $_SESSION['Name'];

        //Query to select the Entire table [MAIN QUERY]
        $selectquery=" select  *  from  isp where Name='$Name' " ; 



        //Executing the QUERY
        $query=mysqli_query($con,$selectquery);

        //Iterating through Entire table using while loop
        //Using MYSQLI Fetch fuction to show that table
        while($res=mysqli_fetch_array($query))
        {
     ?>

    <?php echo "<h4>Your Admin ID : " . $res['Isp_id'] . "</h4>"; ?>
            <?php
        }
        ?>
        <form action="" method="post">
    <a class=" delete" href="logout1.php" style="
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
    <section>
    <a class="hello" href="Display.php">Display Customers</a>
</section>
<br>
<br>
<br>
<section >
    <a class="hello" href="fb.php" >View feedback</a>
</section>
    <br>
    <br>
    <br>
    <section >
    <a class="hello" href="plans.php" >Add plans</a>
    </section>
    <br>
    <br>
    <br> 
    <section>
    <a class="hello" href="eplans.php" >Edit plans</a>
    </section>
    <br>
    <br>
    <br> 
    <section>
    <a class="hello" href="custaccount.php">View customer account</a>
    </section>
</body>
</html>