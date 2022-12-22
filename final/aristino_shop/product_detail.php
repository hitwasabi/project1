<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ARISTINO</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <br>
<?php
    include 'header.php';
?>
        <br>
        <br>
        <div class="content">
        <?php
        $id = $_GET['id'] ?? '';
        include "config/connectDB.php";
            $sql = "SELECT * FROM product WHERE PRODUCT_ID='$id'";
            $product = mysqli_query($conn,$sql);
            $product1 = mysqli_fetch_array($product);
            mysqli_close($conn);
            foreach( $product as $row ){
              ?>
        <h1><font color="red"><?php echo $row['PRODUCT_NAME']; $tshirt=$row['CATE_ID'] ?></font></h1>
            <br>
            <br>
            <div class="anh">
            <image src="<?php echo "image/".$row['PRODUCT_IMG'] ?>"></image>
            </div>
            <div class="chu">
            <h2>Áo Nam <font color="blue">@aonam</font>
                <hr>
                    Chi tiết sản phẩm
                    <br>
                    <font size="2px">

CHI TIẾT:<br>
-<?php echo $row['PRODUCT_DETAIL'] ?><br>
SIZE:<br>
- <?php echo $row['PRODUCT_SIZE'] ?><br>
Giá :<br>

 <?php echo number_format($product1['PRODUCT_PRICE'],0,',','.') ?> VND<br>
Số lượng :<br>
<form action="process-cart.php?PRODUCT_ID=<?php echo $id?>&action=add" method="post">
<input type="number" name="PRODUCT_AMOUNT" min=1 max=100 value="">
<br>
<br>
<input type="submit" name="cart" value="Thêm vào giỏ hàng" >

</form>
<br>
<br>
<br>
</font>

            </div>
            </div>
            </div>
            <br><br><br><br><br><br><br><br><br>
            <br><br><br><br><br><br><br><br><br>
            <br><br><br><br><br><br><br><br><br><br>
            <?php

}
?>
          <div class="sap">
            &nbsp;&nbsp;&nbsp;&nbsp;<h1><font color="blue">Sản phẩm có liên quan</font></h1>
            <br>
            <br>
            <div class="row">
          <?php
            include "config/connectDB.php";
            $sql = "SELECT * FROM product WHERE CATE_ID LIKE '%$tshirt%'  LIMIT 3 ";
            $product = mysqli_query($conn,$sql);
            mysqli_close($conn);
            foreach( $product as $column ){
              ?>
                    <a href="product_detail.php?id=<?php echo $column['PRODUCT_ID'] ?>">
                <div class ="col-12 col-sm-6 col-md-4  image image1">
                    <a href="product_detail.php?id=<?php echo $column['PRODUCT_ID'] ?>">
                   <image src="<?php echo "image/".$column['PRODUCT_IMG'] ?>">
                </a>
                </div>
                <?php
            }
            ?>
            </div>

          
          </div>
          <br>
          <br>

</div>
          <?php
include 'footer.php';
?>




    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
    