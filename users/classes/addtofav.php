<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
//ALTER TABLE boikhujo.fav ADD CONSTRAINT user_book UNIQUE(user_id,bookpost_id);
// echo "your book is added " . rand(100,400) ." ". $_POST['bookid'];
if(isset($_POST['bookid'])){
    require "../../connection.php";
    $id = $conn->escape_string($_POST['bookid']);
    $userid = $conn->escape_string($_SESSION['user_id']);
    $addtowishlist = "insert into fav(user_id,bookpost_id) values ('$userid','$id')";
    $conn->query($addtowishlist);
    if($conn->affected_rows > 0){
        echo "Book Added to your fav list";
    }
    else{
        echo "already added or something wrong";
    }

}