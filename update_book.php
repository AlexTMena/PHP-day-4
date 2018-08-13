<?php 
include "Database.php";
$conn = new Database();

$categoryResult = $conn->get_categories();


if(isset($_GET['editid'])){
    $id = $_GET['editid'];
    $bookResult = $conn->get_specific_book($id);
    $bookRow = $bookResult->fetch_assoc();
}

if(isset($_POST['btnUpdateBook'])){
    $id           = $_POST['txtbookid'];    
    $bookname     = $_POST['txtbooktitle'];
    $bookprice    = $_POST['txtprice'];
    $bookauthor   = $_POST['txtauthor'];
    $bookcategory = $_POST['cmbcategory'];
    $bookstocks   = $_POST['txtstocks'];

    $conn->update_book(
        $id,
        $bookname,
        $bookprice,
        $bookauthor,
        $bookcategory,
        $bookstocks
    );

    header("location:add_book.php");

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
                <h2>Update Book Form</h2>
                <hr>
                
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                    
                    <label>Book ID:</label>
                    <input type="text" name="txtbookid" class="form-control" required readonly value="<?php echo $bookRow['book_id']; ?>">


                    <label>Book Title:</label>
                    <input type="text" name="txtbooktitle" class="form-control" required value="<?php echo $bookRow['book_name']; ?>">

                    <label>Price:</label>
                    <input type="text" name="txtprice" class="form-control" required value="<?php echo $bookRow['book_price']; ?>">

                    <label>Author:</label>
                    <input type="text" name="txtauthor" class="form-control" required value="<?php echo $bookRow['book_author_name']; ?>">

                    <label>Choose Category:</label>
                    <select name="cmbcategory" class="form-control">
                        <?php while($catRow = $categoryResult->fetch_assoc()){ ?>
                            <option 
                                <?php if($catRow['category_id']==$bookRow['book_category_id']){
                                    echo 'selected';
                                    } 
                                ?>
                                value="<?php echo $catRow['category_id']; ?>">
                                <?php echo $catRow['category']; ?>
                            </option>
                        <?php } ?>
                    </select>

                    <label>Stocks:</label>
                    <input type="text" name="txtstocks" class="form-control" required value="<?php echo $bookRow['book_stocks']; ?>">

                    <br>
                    <a href="list_of_books.php" class="btn btn-warning">View List of Books</a>
                    <button type="submit" name="btnUpdateBook" class="btn btn-primary">Update Book info</button>

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