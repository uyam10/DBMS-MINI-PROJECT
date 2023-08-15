<?php

include 'connection1.php';

$id =$_GET['id'];

$deletequery = " delete from customer where Cust_id=$id ";

$query =mysqli_query($con,$deletequery);

if($query){
    ?>
    <script>
        alert("Your account  has been deleted!")
        </script>
        <?php
}else{
    ?>
    <script>
        alert("Woops!, Something went wrong")
        </script>
        <?php
}

header('location: home.php');

?>