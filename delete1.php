<?php

include 'connection1.php';

$id =$_GET['id'];

$deletequery = " delete from customer where Cust_id=$id ";

$query =mysqli_query($con,$deletequery);

if($query){
    ?>
    <script>
        alert("Customer has been deleted!")
        </script>
        <?php
}else{
    ?>
    <script>
        alert("Customer has not been deleted!")
        </script>
        <?php
}

header('location: display.php');

?>