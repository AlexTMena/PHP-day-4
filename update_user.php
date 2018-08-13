<?php 
include "Database.php";
$conn = new Database();

if(isset($_GET['editid'])){
    $id = $_GET['editid'];
    $editResult = $conn->get_user($id);
    $row = $editResult->fetch_assoc();
}

if(isset($_POST['btnUpdateUser'])){
  echo  $id         = $_POST['txtuserid'];
    $username   = $_POST['txtusername'];
    $email      = $_POST['txtemail'];
    $password   = $_POST['txtpassword'];
    $level      = $_POST['cmblevel'];

    $conn->update_user($id,$username, $email, $password, $level);

    header("location:list_of_users.php");

}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <!-- JavaScript -->
  </head>
  <body>
  <?php include "navigation.php"; ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Update User Form</h2>
                <hr>

                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                    <label>ID:</label>
                    <input type="text" name="txtuserid" value="<?php echo $row['user_id']; ?>" readonly class="form-control"></input>

                    <label>User  Desired Username:</label>
                    <input type="text" name="txtusername" value="<?php echo $row['user_username']; ?>" class="form-control" required>

                    <label>Email:</label>
                    <input type="text" name="txtemail" value="<?php echo $row['user_email']; ?>" class="form-control" required>

                    <label>Type Password:</label>
                    <input type="password" name="txtpassword" class="form-control">

                    <label>Choose Level:</label>
                    <select name="cmblevel" class="form-control">
                        <option value="1" <?php if($row['user_level_id']==1 ){ echo "selected";}?>>Admin</option>
                        <option value="2" <?php if($row['user_level_id']==2 ){ echo "selected";}?>>User </option>
                    </select>   

                    <br>
                    <a href="list_of_users.php" class="btn btn-warning">View List of Users</a>
                    <button type="submit" name="btnUpdateUser" class="btn btn-primary">Update record</button>

            </div>
        </div>
    </div>
    
    


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="main.js"></script>
  </body>
</html>