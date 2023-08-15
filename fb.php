<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fbcss.css">
    <title>View feedback</title>
</head>
<body>
<h1 class="hello">Feedbacks</h1>

<div class="table-wrapper">
    <table class="fl-table">
        <thead>
        <tr>
            <th>Feedback ID</th>
            <th>Review</th>
            <th>Feedback_type</th>
            <th>Rating</th>
            <th>Customer ID</th>
        </tr>
        </thead>
        <tbody>
        <?php     
      include 'connection1.php';
      $selectquery = " SELECT * FROM feedback ";
      $query = mysqli_query($con,$selectquery);

       $nums = mysqli_num_rows($query);
       while($res = mysqli_fetch_array($query)){
           ?>
        <tr>
            <td><?php echo $res['Fid']; ?></td>
            <td><?php echo $res['Review']; ?></td>
            <td><?php echo $res['Feedback_type']; ?></td>
            <td><?php echo $res['Rating'];?></td>
            <td><?php echo $res['Cust_id'];?></td>
        </tr>
        <?php
       }
       ?>
        <tbody>
    </table>
</div>
</body>
</html>