<?php
    //Thêm nhân viên
    if(isset($_POST['sbm'])) {
        if(empty($_POST['EMP_NAME'])) {
            echo "Bạn chưa nhập tên nhân viên!";
        }else{
            $emp_name = $_POST['EMP_NAME'];
        }
        $emp_email = $_POST['EMP_MAIL'];
        $emp_pass = $_POST['EMP_PASS'];
        $emp_adlevel = $_POST['EMP_ADLEVEL'];

        $sqlInsert = "INSERT INTO employee(EMP_NAME,EMP_MAIL,EMP_PASS,EMP_ADLEVEL) VALUES 
        ('$emp_name','$emp_email',  '$emp_pass', $emp_adlevel)";

        if(mysqli_query($conn, $sqlInsert)) {
            header("location: index.php?page=user");
        }else{
            echo "<script>alert('Thêm sản phẩm không thành công');</script>";
        }
}   
?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li><a href="user.php">Quản lý thành viên</a></li>
				<li class="active">Thêm thành viên</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Thêm thành viên</h1>
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
                                    <input name="EMP_NAME" required class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input name="EMP_MAIL" required type="text" class="form-control">
                                </div>                       
                                <div class="form-group">
                                    <label>Mật khẩu</label>
                                    <input name="EMP_PASS" required type="password"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Quyền</label>
                                    <select name="EMP_ADLEVEL" class="form-control">
                                        <option value=1>Admin</option>
                                        <option value=2>Member</option>
                                    </select>
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

