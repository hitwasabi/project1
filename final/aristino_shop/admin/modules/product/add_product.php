<?php
    //Hiển thị các danh mục
    $sqlCategory = "SELECT * FROM category";
    $resultCategory = mysqli_query($conn, $sqlCategory);
    //Thêm sản phẩm
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
            if($_FILES['PRODUCT_IMG']['error'] > 0) {
                $prd_image = 'no-img.png';
            }else{
                //validate đầy đủ (bài làm chỉ minh họa bước upload)
                $tmp_name = $_FILES['PRODUCT_IMG']['tmp_name'];
                $target_file = "images/".$_FILES['PRODUCT_IMG']['name'];
                move_uploaded_file($tmp_name,$target_file);
                $prd_image = $_FILES['PRODUCT_IMG']['name'];
            }
        }
        $sqlInsert = "INSERT INTO product(CATE_ID, PRODUCT_NAME,PRODUCT_IMG, PRODUCT_PRICE, PRODUCT_SIZE, PRODUCT_STATUS, PRODUCT_DETAIL) VALUES 
        ($cat_id, '$prd_name','$prd_image',  $prd_price, '$prd_size', $prd_status,  '$prd_details')";

        if(mysqli_query($conn, $sqlInsert)) {
            header("location: index.php?page=product");
        }else{
            echo "<script>alert('Thêm sản phẩm không thành công');</script>";
        }
}   
?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li><a href="product.php">Quản lý sản phẩm</a></li>
				<li class="active">Thêm sản phẩm</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Thêm sản phẩm</h1>
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
                                    <input required name="PRODUCT_NAME" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label>Giá sản phẩm</label>
                                    <input required name="PRODUCT_PRICE" type="number" min="0" class="form-control">
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
                                    <input required name="prd_promotion" type="text" class="form-control">
                                </div>   -->
                                <!-- <div class="form-group">
                                    <label>Tình trạng</label>
                                    <input required name="prd_new" type="text" class="form-control">
                                </div>   -->
                                
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ảnh sản phẩm</label>
                                    <input required name="PRODUCT_IMG" type="file" onchange="preview();">
                                    <br>
                                    <div>
                                        <img id="PRODUCT_IMG" width="150px" height="200px" src="img/no-img.png">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Danh mục</label>
                                    <select name="CATE_ID" class="form-control">
                                    <option value="0">-- Lựa chọn --</option>
                                    <?php if(mysqli_num_rows($resultCategory)) {
                                            while($cate = mysqli_fetch_assoc($resultCategory)) {
                                    ?>
                                        <option value=<?php echo $cate['CATE_ID'] ?>><?php echo $cate['CATE_NAME'] ?></option>
                                    <?php 
                                        } 
                                    }
                                    ?>
                                </select>
                                </div>
                                
                                <div class="form-group">
                                    <label>Trạng thái</label>
                                    <select name="PRODUCT_STATUS" class="form-control">
                                        <option value=1 selected>Còn hàng</option>
                                        <option value=0>Hết hàng</option>
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
                                        <textarea required name="PRODUCT_DETAIL" class="form-control" rows="3"></textarea>
                                    </div>
                                <button name="sbm" type="submit" class="btn btn-success">Thêm mới</button>
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
