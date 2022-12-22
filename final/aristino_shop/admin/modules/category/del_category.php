<?php 
    session_start();
    if(isset($_SESSION['user_login'])) {
        define("ISLOGGED",true);
        include_once "../../../config/connectDB.php";
        if(isset($_GET['CATE_ID'])) {
            $cat_id = $_GET['CATE_ID'];
            $sql_delete = "DELETE FROM category WHERE CATE_ID=$cat_id";
            mysqli_query($conn, $sql_delete);
            header("location: /final/aristino_shop/admin/index.php?page=category");
        }
    }
?>