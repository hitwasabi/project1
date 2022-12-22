<?php
	//Lấy các thông tin của khách hàng cần sửa
	if(isset($_GET['CUS_ID'])) {
		$cus_id = $_GET['CUS_ID'];
		$sqlCustomer = "SELECT * FROM customer WHERE CUS_ID = $cus_id";
		$resultCustomer = mysqli_query($conn, $sqlCustomer);
		$CustomerEdit = mysqli_fetch_assoc($resultCustomer);
    //Sửa danh mục
    if(isset($_POST['sbm'])) {
        if(empty($_POST['CUS_NAME'])) {
            echo "Bạn chưa nhập tên danh mục!";
        }else{
            $cus_name = $_POST['CUS_NAME'];
        }
            $cus_email = $_POST['CUS_EMAIL'];
            $cus_phonenumber = $_POST['CUS_PHONENUMBER'];

        $sqlUpdate = "UPDATE customer SET
                CUS_NAME = '$cus_name',
                CUS_EMAIL = '$cus_email',
                CUS_PHONENUMBER = '$cus_phonenumber'
                WHERE CUS_ID = $cus_id";

        if(mysqli_query($conn, $sqlUpdate)) {
            header('location: index.php?page=customer');
        }else{
            echo "<script>alert('Cập nhật danh mục không thành công');</script>";
        }
    }
        //Lưu ý khi người dùng không chọn hình ảnh mới thì lấy tên sản phẩm cũ chèn vào
        // Nếu người dùng có hình ảnh mới thì xử lý bình thường.
     //Viết câu truy vấn cập nhật thông tin sản phẩm
 }else{
     header('location: index.php?page=customer');
 }
?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li><a href="customer.php">Quản lý thành viên</a></li>
				<li class="active"><?php echo $CustomerEdit['CUS_NAME'];  ?></li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Khách hàng: <?php echo $CustomerEdit['CUS_NAME'];  ?></h1>
			</div>
        </div><!--/.row-->
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-8">
                            <form role="form" method="post">
                                <div class="form-group">
                                    <label>Họ & Tên</label>
                                    <input type="text" name="CUS_NAME" required class="form-control" value="<?php echo $CustomerEdit['CUS_NAME'];  ?>" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="CUS_EMAIL" required value="<?php echo $CustomerEdit['CUS_EMAIL'];  ?>" class="form-control">
                                </div> 
                                <div class="form-group">
                                    <label>SDT</label>
                                    <input type="text" name="CUS_PHONENUMBER" required value="<?php echo $CustomerEdit['CUS_PHONENUMBER'];  ?>" class="form-control">
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

