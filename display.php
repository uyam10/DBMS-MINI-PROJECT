
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="dcss.css">
    <title>CREGISTER</title>
</head>
<body>
<h1 class="hello">List of customers registered</h1>

<div class="table-wrapper">
    <table class="fl-table">
        <thead>
        <tr>
            <th>Customer_id</th>
            <th>Name</th>
            <th>Address</th>
            <th>Email</th>
            <th>Phone</th>
        </tr>
        </thead>
        <tbody>
        <?php     
      include 'connection1.php';
      $selectquery = " SELECT * FROM customer ";
      $query = mysqli_query($con,$selectquery);

       $nums = mysqli_num_rows($query);
       while($res = mysqli_fetch_array($query)){
           ?>
        <tr>
            <td><?php echo $res['Cust_id']; ?></td>
            <td><?php echo $res['Name']; ?></td>
            <td><?php echo $res['Address']; ?></td>
            <td><?php echo $res['Email']; ?></td>
            <td><?php echo $res['Phone']; ?></td>
           
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