<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pcss.css">
    <title>List of plans</title>
</head>
<body>
<h1 class="hello">List of plans</h1>

<div class="table-wrapper">
    <table class="fl-table">
        <thead>
        <tr>
            <th>Plan_no</th>
            <th>Amount</th>
            <th>Description</th>
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
        </tr>
        <?php
       }
       ?>
        <tbody>
    </table>
</div>
</body>
</html>