
<?php
    //Thêm khách hàng
    if(isset($_POST['sbm'])) {
        if(empty($_POST['CUS_NAME'])) {
            echo "Bạn chưa nhập tên sản phẩm!";
        }else{
            $cus_name = $_POST['CUS_NAME'];
        }
        $cus_email = $_POST['CUS_EMAIL'];
        $cus_phonenumber = $_POST['CUS_PHONENUMBER'];
         
        $sqlInsert = "INSERT INTO customer(CUS_NAME,CUS_EMAIL,CUS_PHONENUMBER) VALUES 
        ('$cus_name','$cus_email',  '$cus_phonenumber')";

        if(mysqli_query($conn, $sqlInsert)) {
            header("location: index.php?page=customer");
        }else{
            echo "<script>alert('Thêm sản phẩm không thành công');</script>";
        }
}   
?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li><a href="customer.php">Quản lý khách hàng</a></li>
				<li class="active">Thêm khách hàng</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Thêm khách hàng</h1>
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
                                    <input name="CUS_NAME" required class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input name="CUS_EMAIL" required type="text" class="form-control">
                                </div>                       
                                <div class="form-group">
                                    <label>Số điện thoại</label>
                                    <input name="CUS_PHONENUMBER" required type="text" class="form-control">
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

