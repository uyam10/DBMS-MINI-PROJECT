<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="epcss.css">
    <title>Edit Plans</title>
</head>
<body>
<h1 class="hello">Edit plans</h1>

<div class="table-wrapper">
    <table class="fl-table">
        <thead>
        <tr>
            <th>Plan_no</th>
            <th>Amount</th>
            <th>Description</th>
            <th>Operation</th>
        </tr>
        </thead>
        <tbody>
        <?php     
      include 'connection1.php';
      $selectquery = " SELECT * FROM plan ";
      $query = mysqli_query($con,$selectquery);

       $nums = mysqli_num_rows($query);
       while($res = mysqli_fetch_array($query)){
           ?>
        <tr>
            <td><?php echo $res['Plan_no']; ?></td>
            <td><?php echo $res['Amount']; ?></td>
            <td><?php echo $res['Description'];?></td>
            <td> <a href="" data-toggle="tooltip" title="Update!"><a style="color:#00ff00;" title="UPDATE" href="update.php?id=<?php echo $res['Plan_no']; ?>"><i class="fa fa-edit" aria-hidden="true"></i></a><span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</span><a href="" data-toggle="tooltip" title="Update!"><a style="color:red;" title="DELETE" href="delete.php?id=<?php echo $res['Plan_no']; ?>"><i class="fa fa-trash" aria-hidden="true"></i></a></a>
           </td> 
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
</script>
</body>
</html>
