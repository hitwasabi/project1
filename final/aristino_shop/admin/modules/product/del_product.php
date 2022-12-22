<?php 
    session_start();
    if(isset($_SESSION['user_login'])) {
        define("ISLOGGED",true);
        include_once "../../../config/connectDB.php";
        if(isset($_GET['PRODUCT_ID'])) {
            $prd_id = $_GET['PRODUCT_ID'];
            $sql_delete = "DELETE FROM product WHERE PRODUCT_ID=$prd_id";
            mysqli_query($conn, $sql_delete);
            header("location: /final/aristino_shop/admin/index.php?page=product");
        }
    }
?>