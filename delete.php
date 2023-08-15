<?php

include 'connection1.php';

$id =$_GET['id'];

$deletequery = " delete from plan where Plan_no=$id ";

$query =mysqli_query($con,$deletequery);

if($query){
    ?>
    <script>
        alert("Plan has been deleted!")
        </script>
        <?php
}else{
    ?>
    <script>
        alert("Plan has not been deleted!")
        </script>
        <?php
}

header('location: eplans.php');

?>