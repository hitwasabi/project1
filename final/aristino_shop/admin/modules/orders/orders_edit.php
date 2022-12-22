<?php 
    session_start();
    if(isset($_SESSION['user_login'])) {
        define("ISLOGGED",true);
        include_once "../../../config/connectDB.php";
        if (isset($_GET['RECT_ID'])&&isset($_GET['case'])) {
            switch ($_GET['case']) {
                case '12':
                    $prd_id = $_GET['RECT_ID'];
                    $sql = "UPDATE receipt_status SET
                        status = 2
                        WHERE RECT_ID = $prd_id
                    ";
                    mysqli_query($conn, $sql);
                    header("location: /final/aristino_shop/admin/index.php?page=orders_processed");
                    break;
                case '23':
                    $prd_id = $_GET['RECT_ID'];
                    $sql = "UPDATE receipt_status SET
                        status = 3
                        WHERE RECT_ID = $prd_id
                    ";
                    mysqli_query($conn, $sql);
                    header("location: /final/aristino_shop/admin/index.php?page=orders_shiping");
                    break;
                case '34':
                    $prd_id = $_GET['RECT_ID'];
                    $sql = "UPDATE receipt_status SET
                        status = 4
                        WHERE RECT_ID = $prd_id
                    ";
                    mysqli_query($conn, $sql);
                    header("location: /final/aristino_shop/admin/index.php?page=orders_success");
                    break;
            }
        } else {
            header("location: /final/aristino_shop/admin/index.php?page=order");
        }
        
    }
?>