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
        <br>
        <br>
        <div class="thanhcong">
        <h1>Cảm ơn quí khách đã đặt hàng!<h1><br>
<font size=3px>Đơn hàng của quí khách sẽ được xử lí nhanh chóng . </font>
<br> 
<font size=2px>Nếu quí khách có vấn đề với sản phẩm hoặc muốn thay đổi sản phẩm của mình đã mua , thì hãy liên hệ với chúng tôi theo hotline: 066773508</font>
</div>
<button type="button" onclick="location.href='index.php'" class="csw-btn-button" >
      Quay về trang chủ
      </button>
        </div>
        </div>
  <?php      
include 'footer.php';
?>




    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
    
