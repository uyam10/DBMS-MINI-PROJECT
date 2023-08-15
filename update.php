
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="plans.css">
    <title>UPLANS</title>
</head>
<body>
<div class="container">
<form action=" " method="POST">
      <h1 class="main_heading">UPDATE PLANS</h1>
      <?php
 include "connection1.php";
 $ids = $_GET['id'];

 $showquery = "select * from plan where Plan_no={$ids}";

 $showdata = mysqli_query($con,$showquery);

 $arrdata = mysqli_fetch_array( $showdata);

 if(isset($_POST['submit'])){
    $idupdate = $_GET['id'];
    $Amount= $_POST['amount'];
    $Description= $_POST['desc'];
    $Admin_id= $_POST['number'];
    

    $query= " update plan set Amount='$Amount' , Description='$Description' 
         where Plan_no='$idupdate' ";
    
        $res =  mysqli_query($con,$query);
    
        if($res){
            ?>
            <script>
                alert("Plan has been updated!");
                </script>
                <?php
        }else{
    
        ?>
            <script>
                alert("data not inserted successfully");
                </script>
                <?php
        }
    }
 ?>

        <p>Amount: <input type="text" name="amount" id="amount" value="<?php echo $arrdata['Amount']; ?>" required></p>
        <p>Description: <input type="text" name="desc" value="<?php echo $arrdata['Description'];?>" required>
        </p>
        <p>Admin ID: <input type="number" name="number" id="number" value="<?php echo $arrdata['Admin_id'];?>" required></p>
        <input type="submit" name="submit" value="Update plan" >
    </form>
</div>
</body>
</html>