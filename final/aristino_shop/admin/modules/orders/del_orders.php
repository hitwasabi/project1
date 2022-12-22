<?php 
    session_start();
    if(isset($_SESSION['user_login'])) {
        define("ISLOGGED",true);
        include_once "../../../config/connectDB.php";
        if(isset($_GET['RECT_ID'])) {
            $rect_id = $_GET['RECT_ID'];
            $sql_delete2 = "DELETE FROM receipt_status  WHERE RECT_ID= $rect_id";
            $sql_delete1 = "DELETE FROM receipt_detail  WHERE RECT_ID= $rect_id";
            $sql_delete = "DELETE FROM receipt  WHERE RECT_ID= $rect_id";

            mysqli_query($conn,$sql_delete2);
            mysqli_query($conn,$sql_delete1);
            mysqli_query($conn,$sql_delete);
            header("location: /final/aristino_shop/admin/index.php?page=order");
        } 
    }
?>