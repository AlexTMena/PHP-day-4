<?php
    session_start();
    class Database{


        // 1.prepare mysql credentials
        private $server = "localhost";
        private $user = "root";
        private $password = "";
        private $database = "bookdb";
        private $conn;

        // 2. execute the connection during instantiation
        function __construct(){
            $this->conn = new mysqli($this->server, $this->user, $this->password, $this->database);
            
            // if($this->conn){
            //     echo "MySQL Connection Successful";
            // }            
        }

        public function login($email,$password){
            $enc_password = sha1($password);
            $sql = "SELECT * FROM
                    `tbl_users`
                    WHERE
                    `user_email`='$email'
                    AND
                    `user_password`='$enc_password'
                    AND
                    `user_is_deleted`='1'";
            return $this->conn->query($sql);
        }


        public function add_user($username, $email, $password, $level){
            $enc_pass = sha1($password);
            
            $sql= "INSERT INTO `tbl_users` (`user_username`,`user_email`,`user_password`,`user_level_id`,`user_date_registered`) VALUES ('$username', '$email', '$enc_pass', '$level',NOW())";
            $this->conn->query($sql);
        }

        public function get_all_users(){
            $sql=" SELECT `user_id`, `user_level_id`, `user_username`, `user_email`, `user_date_registered` FROM `tbl_users` WHERE `user_is_deleted`='1'";
            return $this->conn->query($sql);
        }

        public function delete_user($id){
            
            // $sql="DELETE FROM `tbl_users` WHERE `user_id`='$id'";

            $sql="UPDATE `tbl_users` SET `user_is_deleted`='0' WHERE `user_id`='$id'";
            $this->conn->query($sql);
        }


        public function get_user($id){
            $sql= "SELECT * FROM `tbl_users` WHERE `user_id`='$id'";
            return $this->conn->query($sql); 
        }
        
        public function update_user($id, $username, $email, $password, $level){
            
            if($password != ""){
                $enc_pass = sha1($password);
                $p = ", `user_password`='$enc_pass'";
            }else{
                $p="";
            }
            $sql=   "UPDATE
                    `tbl_users`
                    SET 
                    `user_username`='$username',
                    `user_email`='$email',
                    `user_level_id`='$level'
                    $p
                    WHERE 
                    `user_id`='$id'";
            $this->conn->query($sql);   
        }

        //get all the book categories

        public function get_categories(){
            $sql = "SELECT * FROM `tbl_category` ORDER BY `category` ASC";
            return $this->conn->query($sql);

        }

        public function add_book(
                $bookname,
                $bookprice,
                $bookauthor,
                $bookcategory,
                $bookstocks){
             $sql= "INSERT INTO
                    `tbl_books` (
                        `book_name`,
                        `book_price`,
                        `book_author_name`,
                        `book_category_id`,
                        `book_stocks`,
                        `book_dated_added`
                        ) 
                    VALUES (
                        '$bookname',
                        '$bookprice',
                        '$bookauthor',
                        '$bookcategory',
                        '$bookstocks',
                        NOW())";
                $this->conn->query($sql);
            }

        public function get_all_books(){
            $sql = "SELECT * FROM
                `tbl_books`,
                `tbl_category`
                WHERE
                tbl_books.`book_category_id` = tbl_category.`category_id`
                AND
                tbl_books.`book_is_deleted`='1'";
                return $this->conn->query($sql);
        }

        public function delete_books($id){
            $sql = "UPDATE `tbl_books` SET `book_is_deleted`='0' WHERE `book_id`='$id' ";
            $this->conn->query($sql);
        }

        public function get_specific_book($id){
            $sql = "SELECT * FROM
            `tbl_books`
            WHERE
            `book_id`='$id'";
            return $this->conn->query($sql);
        }

        public function update_book(
            $id,
            $bookname,
            $bookprice,
            $bookauthor,
            $bookcategory,
            $bookstocks){
                $sql="UPDATE
                `tbl_books`
                SET 
                `book_name`         ='$bookname',
                `book_price`        ='$bookprice',
                `book_author_name`  ='$bookauthor',
                `book_category_id`  ='$bookcategory',
                `book_stocks`       ='$bookstocks'
                WHERE 
                `book_id`           ='$id'";
                $this->conn->query($sql);
            } 
    }


?>