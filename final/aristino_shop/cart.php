<?php 
    session_start();
    include "config/connectDB.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ARISTINO</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <br>
<?php
    include_once "header.php";
?>
<br>
<form method="post" action="process-cart.php?action=submit">
            <h1 class="heading">
                Thông tin khách hàng
            </h1>
            <div id="divider"></div>
            <div class="inputBox">
                <input type="text" placeholder="Họ và tên" name="user_name" id="user_name">
                <span id="user_name_error"></span>
                <input type="email" placeholder="email" name="user_email" id="user_email">
                <span id="user_email_error"></span>
                <input type="text" placeholder="số điện thoại" name="user_phone" id="user_phone">
                <span id="user_phone_error"></span>
                <input type="text" placeholder="Địa Chỉ" name="user_address" id="user_address">
                <span id="user_address_error"></span>
            </div>
<br>
        <h1>Thông tin giỏ hàng</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Tên sản phẩm</th>
      <th scope="col">Đơn giá</th>
      <th scope="col">Số lượng</th>
      <th scope="col">Thành tiền</th>
    </tr>
  </thead>
  <tbody>
        <?php
        if(isset($_SESSION['cart'])){
          $tong=0;
          $sum=0;
          foreach($_SESSION['cart'] as $prd_id => $soluong ){
            $sql = "SELECT * FROM product WHERE PRODUCT_ID='$prd_id'";
            $product = mysqli_query($conn,$sql);
            $product1 = mysqli_fetch_array($product);
            foreach( $product as $row ){
            $tong=$row['PRODUCT_PRICE'] * $soluong;
            $sum +=$tong ;
          ?>
         <tr>    
         <td><?php echo $row['PRODUCT_NAME']?></td>
         <td><?php echo number_format($product1['PRODUCT_PRICE'],0,',','.') ?> VND</td>
         <td><?php echo $soluong?></td>
       <?php
      }?>
      <td><p id="total"> <?php echo number_format($tong,0,',','.') ?> VND</p>
</td>
      </tr>
      <tr>

         <?php
          }
          ?>
<?php
        }
      
      ?>
              <td colspan="3">Tổng tiền </td>
      <td> <p id="total"> <?php echo number_format($sum,0,',','.') ?> VND</p>
</td>
  </tbody>
</table>
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <button type="button" onclick="location.href='product.php'" class="csw-btn-button" >
      Tiếp tục mua hàng
      </button>
      &nbsp;&nbsp;&nbsp;
      <input type="submit" class="btn" name="muangay" onclick="return validateForm();" value="Mua ngay">
        </form>
        </div>
        </div>
        </div>
</div>
<?php
include 'footer.php';
?>

<script>
function validateForm() {
  const EMPTY_STR = "";
  var check = true;
  var user_name = document.getElementById('user_name');
  var user_phone = document.getElementById('user_phone');
  var user_email = document.getElementById('user_email');
  var user_address = document.getElementById('user_address');
  var user_name_error = document.getElementById('user_name_error');
  var user_phone_error = document.getElementById('user_phone_error');
  var user_email_error = document.getElementById('user_email_error');
  var user_address_error = document.getElementById('user_address_error');
  
  if(user_name.value==EMPTY_STR) {
      user_name.style.border = "1px solid red";
      user_name_error.innerHTML = "Bạn phải nhập họ tên";
      user_name_error.style.color = "red";
      check = false;
  }else{
    user_name.style.border = EMPTY_STR;
    user_name_error.innerHTML = EMPTY_STR;
    user_name_error.style.color = EMPTY_STR;
  }
  if(user_phone.value == EMPTY_STR) {
      user_phone.style.border = "1px solid red";
      user_phone_error.innerHTML = "Bạn phải nhập số điện thoại";
      user_phone_error.style.color = "red";
      check = false;
  }else{
    user_phone.style.border = EMPTY_STR;
    user_phone_error.innerHTML= EMPTY_STR;
    user_phone_error.style.color= EMPTY_STR;
  }
  if(user_email.value==EMPTY_STR) {
      user_email.style.border = "1px solid red";
      user_email_error.innerHTML = "Bạn phải nhập email";
      user_email_error.style.color = "red";
      check = false;
  }else{
    user_email.style.border = EMPTY_STR;
    user_email_error.innerHTML= EMPTY_STR;
    user_email_error.style.color= EMPTY_STR;
  }
  if(user_address.value==EMPTY_STR) {
    user_address.style.border = "1px solid red";
    user_address_error.innerHTML = "Bạn phải nhập địa chỉ lấy hàng!";
    user_address_error.style.color = "red";
      check = false;
  }else{
    user_address.style.border = EMPTY_STR;
    user_address_error.innerHTML= EMPTY_STR;
    user_address_error.style.color= EMPTY_STR;
  }
  
  return check;
}
</script>



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
    
