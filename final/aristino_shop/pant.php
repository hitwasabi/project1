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
    <title>Quần</title>
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
        <div class="midtext">
          <text align="center">
          Aristino luôn sáng tạo và không ngừng đổi mới các thiết kế và đa dạng chủng loại từ quần áo, phụ kiện, nước hoa, kính mát cũng như vẫn tiếp tục duy trì tính thanh lịch và sang trọng mang đậm phong cách Ý. Đồng hành cùng chất liệu thương hạng là kiểu dáng thiết kế sang trọng và đẳng cấp với những đường nét phá cách và màu sắc đa dạng, làm tôn lên vẻ đẹp nam tính đầy khí phách cho phái mạnh..
        </text>
      </div>
      <br>
      Tìm kiếm sản phẩm bạn cần tại đây : 
      <br>
      <div class="search">   
      <div class="col-md-6"> 
      <i class='bx bxs-map' ></i> 
      <form action method="GET">
      <input name="search" type="search" placeholder="....."> 
      <button>Tìm kiếm</button>
      </form> 
      </div> 
      </div>
        <br>
        <br>
        <br>
        <div class="content">
            <div class= "row">
            <?php
            include "config/connectDB.php";
            $search=$_GET['search'] ?? '';
            $sql = "SELECT * FROM product WHERE CATE_ID='5' AND PRODUCT_NAME LIKE '%$search%'  ";
            $product = mysqli_query($conn,$sql);
            mysqli_close($conn);
            foreach( $product as $row ){
              ?>
                    <a href="product_detail.php">
                <div class ="col-12 col-sm-6 col-md-4  image image1">
                    <a href="product_detail.php?id=<?php echo $row['PRODUCT_ID'] ?>">
                   <image src="<?php echo "image/".$row['PRODUCT_IMG'] ?>">
                  <h3><font color="black"><?php echo $row['PRODUCT_NAME'] ?></font></h3>
                </a>
                </div>
                <?php
            }
            ?>
             </div>
        </div>
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
    
