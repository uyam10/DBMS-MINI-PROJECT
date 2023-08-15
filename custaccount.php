<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="custaccount.css">
    <title>CACCOUNT</title>
</head>
<body>
<h1 class="hello">List of chosen plans</h1>
<div class="table-wrapper">
    <table class="fl-table">
        <thead>
        <tr>
            <th>Account_id</th>
            <th>Status</th>
            <th>Customer_id</th>
            <th>Plan_no</th>
            <th>Issue Bill</th>
        </tr>
        </thead>
        <tbody>
        <?php     
      include 'connection1.php';
      session_start();

      $selectquery = " SELECT * FROM account ";
      $query = mysqli_query($con,$selectquery);

       $nums = mysqli_num_rows($query);
       while($res = mysqli_fetch_array($query)){
           ?>
        <tr>
            <td><?php echo $res['Acc_id']; ?></td>
            <td><?php echo $res['Status']; ?></td>
            <td><?php echo $res['Cust_id']; ?></td>
            <td><?php echo $res['Plan_no']; ?></td>
            <td> <a href="" data-toggle="tooltip" title="Issue Bill!"><a style="color:#00ff00;" title="Issue bill" href="bill.php?cid=<?php  echo $res['Cust_id'];       ?>"><i class="fa fa-edit" aria-hidden="true"></i></a></td>
        </tr>
        <?php
       }
       ?>
        <tbody>
    </table>
</div>
<script>
   $(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});
</body>
</html> 