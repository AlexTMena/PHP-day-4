<?php 
include "Database.php";
include "restrict.php";
$conn = new Database();

if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];
    $conn->delete_books($id);
    header("location:list_of_books.php");

}

$result = $conn->get_all_books();


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
            <h2>List of Books</h2>
            <?php if($_SESSION['ses_level_id'] == 1){ ?>
                <a href="add_book.php" class="btn btn-warning btn-sm">Add New Book</a>
            <?php } ?>
            <hr>
            <table class="table table-dondensed table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Book Title</th>
                        <th>Price</th>
                        <th>Author</th>
                        <th>Category</th>
                        <th>Stocks</th>
                        <th>Date Added</th>
                        <?php if($_SESSION['ses_level_id'] == 1){ ?>
                            <th>ACTION</th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php if($result->num_rows > 0){ ?>
                        <?php while($row = $result->fetch_assoc()){ ?>

                            <tr>
                                <td><?php echo $row['book_id']; ?></td>
                                <td><?php echo $row['book_name']; ?></td>
                                <td><?php echo $row['book_price']; ?></td>
                                <td><?php echo $row['book_author_name']; ?></td>
                                <td><?php echo $row['category']; ?></td>
                                <td><?php echo $row['book_stocks']; ?></td>
                                <td><?php echo date('h:i:s a - l - d M Y', strtotime($row['book_dated_added'])); ?></td>
                                <?php if($_SESSION['ses_level_id'] == 1){ ?>
                                    <td>
                                        <a href="update_book.php?editid=<?php echo $row['book_id']; ?>" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i></a>
                                        <a onclick="return confirm('Delete?')" href="<?php echo $_SERVER['PHP_SELF']; ?>?deleteid=<?php echo $row['book_id']; ?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></a>
                                    </td>
                                <?php } ?>
                            </tr>
                        <?php } ?>
                    </tr>
                        <?php }else { ?>
                            <tr>
                            <td colspan="8">No records found</td>
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


<?php if($_SESSION['ses_level_id'] == 1){ ?>
                <a href="add_book.php" class="btn btn-warning btn-sm">Add New Book</a>
            <?php } ?>