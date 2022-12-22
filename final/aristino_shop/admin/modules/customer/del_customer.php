<?php 
    session_start();
    if(isset($_SESSION['user_login'])) {
        define("ISLOGGED",true);
        include_once "../../../config/connectDB.php";
        if(isset($_GET['CUS_ID'])) {
            $cus_id = $_GET['CUS_ID'];
            $sql_delete = "DELETE FROM customer WHERE CUS_ID= $cus_id";
            mysqli_query($conn, $sql_delete);
            header("location: /final/aristino_shop/admin/index.php?page=customer");
        } 
    }
?>