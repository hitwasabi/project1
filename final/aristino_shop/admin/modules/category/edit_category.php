<?php
	//Lấy các thông tin của danh mục cần sửa
	if(isset($_GET['CATE_ID'])) {
		$cat_id = $_GET['CATE_ID'];
		$sqlCategory = "SELECT * FROM category WHERE CATE_ID = $cat_id";
		$resultCategory = mysqli_query($conn, $sqlCategory);
		$CategoryEdit = mysqli_fetch_assoc($resultCategory);
    //Sửa danh mục
    if(isset($_POST['sbm'])) {
        if(empty($_POST['CATE_NAME'])) {
            echo "Bạn chưa nhập tên danh mục!";
        }else{
            $cat_name = $_POST['CATE_NAME'];
        }

        $sqlUpdate = "UPDATE category SET
                CATE_NAME = '$cat_name'
                WHERE CATE_ID = $cat_id";

        if(mysqli_query($conn, $sqlUpdate)) {
            header('location: index.php?page=category');
        }else{
            echo "<script>alert('Cập nhật danh mục không thành công');</script>";
        }
    }
        //Lưu ý khi người dùng không chọn hình ảnh mới thì lấy tên sản phẩm cũ chèn vào
        // Nếu người dùng có hình ảnh mới thì xử lý bình thường.
     //Viết câu truy vấn cập nhật thông tin sản phẩm
 }else{
     header('location: index.php?page=category');
 }
?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li><a href="">Quản lý danh mục</a></li>
				<li class="active"><?php echo $CategoryEdit['CATE_NAME'];  ?></li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Danh mục:<?php echo $CategoryEdit['CATE_NAME'];  ?></h1>
			</div>
		</div><!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-8">
                            
                        <form role="form" method="post">
                            <div class="form-group">
                                <label>Tên danh mục:</label>
                                <input type="text" name="CATE_NAME" required value="<?php echo $CategoryEdit['CATE_NAME'];  ?>" class="form-control" placeholder="Tên danh mục...">
                            </div>
                            <button type="submit" name="sbm" class="btn btn-primary">Cập nhật</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div><!-- /.col-->
	</div>	<!--/.main-->	



