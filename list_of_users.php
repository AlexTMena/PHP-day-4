<?php 
include "Database.php";
include "restrict.php";
$conn = new Database();

if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];
    $conn->delete_user($id);
    header("location:list_of_users.php");

}

$result = $conn->get_all_users();

// print_r($result);

?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>List of Users</title>

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
            <div class="col-md-12">
            <h2>List of Users</h2>
            <?php if($_SESSION['ses_level_id'] == 1){ ?>
                <a href="add_user.php" class="btn btn-warning btn-sm">Add New User</a>
            <?php } ?>
            <hr>
            <table class="table table-dondensed table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Level</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Date Registered</th>
                        <?php if($_SESSION['ses_level_id'] == 1){ ?>
                            <th>ACTION</th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php if($result->num_rows > 0){ ?>
                        <?php while($row = $result->fetch_assoc()){ ?>

                            <tr>
                                <td><?php echo $row['user_id']; ?></td>
                                <td><?php echo $row['user_level_id']==1? 'Admin':'User'; ?></td>
                                <td><?php echo $row['user_username']; ?></td>
                                <td><?php echo $row['user_email']; ?></td>
                                <td><?php echo date('h:i:s a - l - d M Y', strtotime($row['user_date_registered'])); ?></td>
                                <?php if($_SESSION['ses_level_id'] == 1){ ?>
                                    <td>
                                        <a href="update_user.php?editid=<?php echo $row['user_id']; ?>" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i></a>
                                        <a onclick="return confirm('Delete?')" href="<?php echo $_SERVER['PHP_SELF']; ?>?deleteid=<?php echo $row['user_id']; ?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></a>
                                    </td>
                                <?php } ?>
                            </tr>
                        <?php } ?>
                    </tr>
                        <?php }else { ?>
                            <tr>
                            <td colspan="5">No records found</td>
                        </tr>
                        <?php } ?>
                </tblody>
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