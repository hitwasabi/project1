<?php
	//Lấy các thông tin của khách hàng cần sửa
	if(isset($_GET['EMP_ID'])) {
		$emp_id = $_GET['EMP_ID'];
		$sqlEmployee = "SELECT * FROM employee WHERE EMP_ID = $emp_id";
		$resultEmployee = mysqli_query($conn, $sqlEmployee);
		$EmployeeEdit = mysqli_fetch_assoc($resultEmployee);
    //Sửa danh mục
    if(isset($_POST['sbm'])) {
        if(empty($_POST['EMP_NAME'])) {
            echo "Bạn chưa nhập tên danh mục!";
        }else{
            $emp_name = $_POST['EMP_NAME'];
        }
            $emp_email = $_POST['EMP_MAIL'];
            $emp_pass = $_POST['EMP_PASS'];
            $emp_adlevel = $_POST['EMP_ADLEVEL'];

        $sqlUpdate = "UPDATE employee SET
                EMP_NAME = '$emp_name',
                EMP_MAIL = '$emp_email',
                EMP_PASS = '$emp_pass',
                EMP_ADLEVEL = '$emp_adlevel'
                WHERE EMP_ID = $emp_id";

        if(mysqli_query($conn, $sqlUpdate)) {
            header('location: index.php?page=user');
        }else{
            echo "<script>alert('Cập nhật danh mục không thành công');</script>";
        }
    }
        //Lưu ý khi người dùng không chọn hình ảnh mới thì lấy tên sản phẩm cũ chèn vào
        // Nếu người dùng có hình ảnh mới thì xử lý bình thường.
     //Viết câu truy vấn cập nhật thông tin sản phẩm
 }else{
     header('location: index.php?page=user');
 }
?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li><a href="user.php">Quản lý thành viên</a></li>
				<li class="active"><?php echo $EmployeeEdit['EMP_NAME'];  ?></li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Thành viên: Nguyễn Văn A</h1>
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
                                    <input type="text" name="EMP_NAME" required class="form-control" value="<?php echo $EmployeeEdit['EMP_NAME'];  ?>" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="EMP_MAIL" required value="<?php echo $EmployeeEdit['EMP_MAIL'];  ?>" class="form-control">
                                </div>                       
                                <div class="form-group">
                                    <label>Mật khẩu</label>
                                    <input type="password" name="EMP_PASS" required  class="form-control" value="<?php echo $EmployeeEdit['EMP_PASS'];  ?>">
                                </div>
                                <div class="form-group">
                                    <label>Quyền</label>
                                    <select name="EMP_ADLEVEL" class="form-control" <?php echo $EmployeeEdit['EMP_ADLEVEL'];  ?>>
                                        <option value=1>Admin</option>
                                        <option value=2 selected>Member</option>
                                    </select>
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
