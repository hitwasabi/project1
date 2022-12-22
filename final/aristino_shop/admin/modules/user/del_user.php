<?php 
    session_start();
    if(isset($_SESSION['user_login'])) {
        define("ISLOGGED",true);
        include_once "../../../config/connectDB.php";
        if(isset($_GET['EMP_ID'])) {
            $emp_id = $_GET['EMP_ID'];
            $sql_delete = "DELETE FROM employee WHERE EMP_ID=$emp_id";
            mysqli_query($conn, $sql_delete);
            header("location: /final/aristino_shop/admin/index.php?page=user");
        }
    }
?>