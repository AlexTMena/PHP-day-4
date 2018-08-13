<?php 
include "Database.php";
$conn = new Database();

    if(isset($_POST['btnLogin'])){
        $email          = $_POST['txtemail'];
        $password       = $_POST['txtpassword'];
        $loginResult    = $conn->login($email,$password);

        if($loginResult->num_rows == 1){
        //     echo 'User found';
        // }else{
        //     echo 'USER not FOOUND';
            $row = $loginResult->fetch_assoc();
            $_SESSION['ses_username'] = $row['user_username'];
            $_SESSION['ses_isLoggedIn'] = true;
            $_SESSION['ses_level_id'] = $row['user_level_id'];
            header("location:list_of_books.php");
        }else{
            $_SESSION['ses_username'] = "";
            $_SESSION['ses_isLoggedIn'] = false;
            $_SESSION['ses_level_id'] = "";
            header("location:index.php");
        }
    }else{
        $_SESSION['ses_username'] = "";
        $_SESSION['ses_isLoggedIn'] = false;
        $_SESSION['ses_level_id'] = "";
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <!-- JavaScript -->
  </head>
  <body>
  
    <div class="container">
                <div class="fullpage">
        <div class="row text-center mx-auto">
            <div class="col-4">
                    <h2>Members Login</h2>
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                        <Label>Username:</Label>
                        <input type="email" name="txtemail" class="form-control" placeholder="Enter email">
                        <Label>Password:</Label>
                        <input type="password" name="txtpassword" class="form-control" placeholder="Enter email">
                        <br>
                        <button type="submit" name="btnLogin" class="btn btn-primary btn-block">Login to my Account</button>
                    </form>
                </div>
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