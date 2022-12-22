<?php 
  //Hiển thị các danh mục
  $sqlCategory = "SELECT * FROM category";
  $resultCategory = mysqli_query($conn, $sqlCategory);
 //Lấy các thông tin của sản phẩm cần sửa
 if(isset($_GET['PRODUCT_ID'])) {
     $prd_id = $_GET['PRODUCT_ID'];
     $sqlProd = "SELECT * FROM product WHERE PRODUCT_ID = $prd_id";
     $resultProd = mysqli_query($conn, $sqlProd);
     $prodEdit = mysqli_fetch_assoc($resultProd);
     //Sửa sản phẩm
     //Lấy thông tin mới
    if(isset($_POST['sbm'])) {
        if(empty($_POST['PRODUCT_NAME'])) {
            echo "Bạn chưa nhập tên sản phẩm!";
        }else{
            $prd_name = $_POST['PRODUCT_NAME'];
        }
        $prd_price = $_POST['PRODUCT_PRICE'];
        $prd_size = $_POST['PRODUCT_SIZE'];
        $cat_id = $_POST['CATE_ID'];
        $prd_status = $_POST['PRODUCT_STATUS'];
        $prd_details = $_POST['PRODUCT_DETAIL'];
         
        if(isset($_FILES['PRODUCT_IMG'])) {
            if($_FILES['PRODUCT_IMG']['name']) {
                if($_FILES['PRODUCT_IMG']['error'] > 0) {
                    $prd_image = 'no-img.png';
                }else{
                    //validate đầy đủ (bài làm chỉ minh họa bước upload)
                    $tmp_name = $_FILES['PRODUCT_IMG']['tmp_name'];
                    $target_file = "images/".$_FILES['PRODUCT_IMG']['name'];
                    move_uploaded_file($tmp_name,$target_file);
                    $prd_image = $_FILES['PRODUCT_IMG']['name'];
                }
            }else{
                $prd_image = $prodEdit['PRODUCT_IMG'];
            }
            
        }else{
            $prd_image = $prodEdit['PRODUCT_IMG'];
        }

        $sqlUpdate = "UPDATE product SET
                CATE_ID = $cat_id,
                PRODUCT_NAME = '$prd_name',
                PRODUCT_IMG =  '$prd_image',
                PRODUCT_PRICE = $prd_price,
                PRODUCT_SIZE = '$prd_size',
                PRODUCT_STATUS = $prd_status,
                PRODUCT_DETAIL = '$prd_details'
                WHERE PRODUCT_ID = $prd_id";

        if(mysqli_query($conn, $sqlUpdate)) {
            header("location: index.php?page=product");
        }else{
            echo "<script>alert('Cập nhật sản phẩm không thành công');</script>";
        }
    }
        //Lưu ý khi người dùng không chọn hình ảnh mới thì lấy tên sản phẩm cũ chèn vào
        // Nếu người dùng có hình ảnh mới thì xử lý bình thường.
     //Viết câu truy vấn cập nhật thông tin sản phẩm
 }else{
     header('location: index.php?page=product');
 }
?>

		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li><a href="">Quản lý sản phẩm</a></li>
				<li class="active"><?php echo $prodEdit['PRODUCT_NAME'];  ?></li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Sản phẩm: <?php echo $prodEdit['PRODUCT_NAME'];  ?></h1>
			</div>
        </div><!--/.row-->
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-6">
                                <form role="form" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Tên sản phẩm</label>
                                    <input type="text" name="PRODUCT_NAME" required class="form-control" value="<?php echo $prodEdit['PRODUCT_NAME']; ?>"  placeholder="">
                                </div>
                                                                
                                <div class="form-group">
                                    <label>Giá sản phẩm</label>
                                    <input type="number" name="PRODUCT_PRICE" required value="<?php echo $prodEdit['PRODUCT_PRICE']; ?>" class="form-control">
                                </div>          
                                <div class="form-group">
                                    <label>Size</label>
                                    <select name="PRODUCT_SIZE" class="form-control">
                                    <option value="0">-- Lựa chọn --</option>
                                    <option value="S">S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                    <option value="XL">XL</option>
                                    <option value="2XL">2XL</option>
                                    <option value="3XL">3XL</option>

                                  
                                </select>
                                </div>      
                                <!-- <div class="form-group">
                                    <label>Khuyến mãi</label>
                                    <input type="text" name="prd_promotion" required value="Xạc dự phòng" class="form-control">
                                </div>   -->
                                <!-- <div class="form-group">
                                    <label>Tình trạng</label>
                                    <input type="text" name="prd_new" required value="Like new 99%" type="text" class="form-control">
                                </div>   -->
                                
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ảnh sản phẩm</label>
                                    <input type="file" name="PRODUCT_IMG" onchange="preview();">
                                    <br>
                                    <div>
                                    <img width="150px" height="200px" id="PRODUCT_IMG" src="images/<?php echo $prodEdit['PRODUCT_IMG'];?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Danh mục</label>
                                    <select name="CATE_ID" class="form-control">
                                    <option value="0">-- Lựa chọn --</option>
                                    <?php if(mysqli_num_rows($resultCategory)) {
                                            while($cate = mysqli_fetch_assoc($resultCategory)) {
                                    ?>
                                        <option <?php if($prodEdit['CATE_ID'] == $cate['CATE_ID']) echo 'selected'; ?> value=<?php echo $cate['CATE_ID'] ?>><?php echo $cate['CATE_NAME'] ?></option>
                                    <?php 
                                        } 
                                    }
                                    ?>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label>Trạng thái</label>
                                    <select name="PRODUCT_STATUS" class="form-control">
                                    <option <?php if($prodEdit['PRODUCT_STATUS'] == 'CÒN HÀNG') echo 'selected'; ?> value=1>Còn hàng</option>
                                    <option <?php if($prodEdit['PRODUCT_STATUS'] == 'HẾT HÀNG') echo 'selected'; ?> value=2>Hết hàng</option>
                                </select>
                                </div>
                                
                                <!-- <div class="form-group">
                                    <label>Sản phẩm nổi bật</label>
                                    <div class="checkbox">
                                        <label>
                                            <input name="prd_featured" type="checkbox" value=1>Nổi bật
                                        </label>
                                    </div>
                                </div> -->
                                <div class="form-group">
                                        <label>Mô tả sản phẩm</label>
                                        <textarea name="PRODUCT_DETAIL" required class="form-control" rows="3"><?php echo $prodEdit['PRODUCT_DETAIL']; ?></textarea>
                                    </div>
                                <button type="submit" name="sbm" class="btn btn-primary">Cập nhật</button>
                                <button type="reset" class="btn btn-default">Làm mới</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div><!-- /.col-->
            </div><!-- /.row -->
		
	</div>	<!--/.main-->	
    <script>
    function preview() {
        PRODUCT_IMG.src=URL.createObjectURL(event.target.files[0]);
    }
</script>