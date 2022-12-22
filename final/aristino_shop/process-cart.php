<?php 
session_start();
$action = $_GET['action'];
switch ($action) {
    case 'add':
        if(isset($_GET['PRODUCT_ID'])) {
            $prd_id = $_GET['PRODUCT_ID'];
        }
        if(isset($_SESSION['cart'][$prd_id])& isset($_POST['PRODUCT_AMOUNT'])) {
            $_SESSION['cart'][$prd_id]++ ; 
        }else{
            $kk = $_POST['PRODUCT_AMOUNT'];
            $_SESSION['cart'][$prd_id]= $kk;
        }

        header("location: cart.php");
        break;
    
    case 'submit':
        

        if(isset($_POST['muangay'])) {
            include_once "config/connectDB.php";
            $user_name = $_POST['user_name'];
            $user_phone = $_POST['user_phone'];
            $user_email = $_POST['user_email'];
            $user_address = $_POST['user_address'];

        $sqlUser = "INSERT INTO customer(CUS_NAME,CUS_EMAIL,CUS_PHONENUMBER,CUS_ADDRESS)
        VALUES('$user_name','$user_email','$user_phone','$user_address')";
        mysqli_query($conn,$sqlUser);
        $sqlCus ="SELECT * FROM customer WHERE CUS_PHONENUMBER='$user_phone'";
        $resultCus = mysqli_query($conn, $sqlCus);
        $customer = mysqli_fetch_array($resultCus);
        $cusId = $customer['CUS_ID'];



        $sum = 0;
            foreach($_SESSION['cart'] as $prd_id => $qty):
            $sqlsum = "select * from product where PRODUCT_ID = '$prd_id'";
            $resultsum = mysqli_query($conn,$sqlsum);
            $eachsum = mysqli_fetch_array($resultsum);
            $sum += $eachsum['PRODUCT_PRICE'] * $qty;
            endforeach;
        


        $sqlreceipt ="INSERT INTO receipt(CUS_ID,RECT_PRICE) 
        VALUES('$cusId','$sum')";
        mysqli_query($conn,$sqlreceipt);
        
        $receipt = "SELECT * FROM receipt WHERE CUS_ID ='$cusId'";
        $resultreceipt = mysqli_query($conn, $receipt);
        $receiptselect = mysqli_fetch_array($resultreceipt);
        $RECTId = $receiptselect['RECT_ID'];

        $sqlStatus = "INSERT INTO receipt_status(RECT_ID,STATUS) 
        VALUES('$RECTId','1')";
        mysqli_query($conn, $sqlStatus);  

        foreach($_SESSION['cart'] as $prd_id => $qty):
            $sqlreceiptdetail = "INSERT INTO receipt_detail(RECT_ID,AMOUNT,PRODUCT_ID) 
            VALUES('$RECTId','$qty','$prd_id')";
            mysqli_query($conn, $sqlreceiptdetail);
            endforeach;
            unset($_SESSION['cart']);
            header("location: succes.php");
        }
        break;
}

?>
