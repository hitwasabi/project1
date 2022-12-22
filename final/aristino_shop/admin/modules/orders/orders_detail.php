<?php 

 if(isset($_GET['RECT_ID'])) {
     $order_id = $_GET['RECT_ID'];
     $sqlOrder = "SELECT * FROM receipt_detail INNER JOIN receipt ON receipt_detail.RECT_ID = receipt.RECT_ID INNER JOIN customer ON customer.CUS_ID = receipt.CUS_ID INNER JOIN PRODUCT ON PRODUCT.PRODUCT_ID = receipt_detail.PRODUCT_ID WHERE receipt.RECT_ID = $order_id ORDER BY receipt.RECT_ID DESC";
     $resultOrder = mysqli_query($conn, $sqlOrder);
     $orderEdit = mysqli_fetch_assoc($resultOrder);
 
        //Lưu ý khi người dùng không chọn hình ảnh mới thì lấy tên sản phẩm cũ chèn vào
        // Nếu người dùng có hình ảnh mới thì xử lý bình thường.
     //Viết câu truy vấn cập nhật thông tin sản phẩm
    $rowPerPage = 5; //Số product trên 1 trang.
    $sql_product = "SELECT * FROM receipt_detail INNER JOIN receipt ON receipt_detail.RECT_ID = receipt.RECT_ID INNER JOIN customer ON customer.CUS_ID = receipt.CUS_ID INNER JOIN PRODUCT ON PRODUCT.PRODUCT_ID = receipt_detail.PRODUCT_ID WHERE receipt.RECT_ID = $order_id ORDER BY receipt.RECT_ID DESC";
    $resultAll = mysqli_query($conn, $sql_product);
    $totalRecords = mysqli_num_rows($resultAll); //số bản ghi lấy được.
    //Tổng số trang
    $totalPage = ceil($totalRecords/$rowPerPage);

    //lấy trang hiện tại từ đường dẫn.
    if(isset($_GET['current_page'])) {
        $current_page = $_GET['current_page'];
    }else{
        $current_page = 1;
    }
    
    if($current_page < 1) {
        $current_page = 1;
    }

    if($current_page > $totalPage && $totalPage>0) {
        $current_page = $totalPage;
    }
    // SELECT * FROM table_name LIMIT $start,$rowPerPage;
    $start = ($current_page - 1)*$rowPerPage;
	var_dump($current_page);
    $sql_pagination = "SELECT * FROM receipt_detail INNER JOIN receipt ON receipt_detail.RECT_ID = receipt.RECT_ID INNER JOIN customer ON customer.CUS_ID = receipt.CUS_ID INNER JOIN PRODUCT ON PRODUCT.PRODUCT_ID = receipt_detail.PRODUCT_ID WHERE receipt.RECT_ID = $order_id ORDER BY receipt.RECT_ID DESC";
    $resultPagination = mysqli_query($conn, $sql_pagination);

    } else {
        header("Location: index.php?page=order");
    }
    

?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li><a href="index.php?page=order">Quản lý hóa đơn</a></li>
				<li class="active"><?php echo $orderEdit['RECT_ID'];  ?></li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Hóa đơn số: # <?php echo $orderEdit['RECT_ID'];  ?></h1>
			</div>
        </div><!--/.row-->
        <div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-body">
                        <table 
                            data-toolbar="#toolbar"
                            data-toggle="table">
						    <thead>
                            <tr>
						        <th data-field="id" data-sortable="true">ID</th>
                                <th data-field="name" data-sortable="true">Tên khách hàng</th>
                                <th data-field="name1" data-sortable="true">Tên sản phẩm</th>
                                <th data-field="number" data-sortable="true">Số lượng</th>
                                <th data-field="number2" data-sortable="true">Giá</th>
                                <th data-field="number3" data-sortable="true">Tổng thiệt hại</th>
                                <th data-field="email" data-sortable="true">Email khách hàng</th>
                                <th data-field="phonenumber" data-sortable="true">SDT khách hàng</th>
                            
						    </tr>
                            </thead>
                            <tbody>
                            <?php  if(mysqli_num_rows($resultPagination) > 0) {
                                        while ($row = mysqli_fetch_assoc($resultPagination)) {
                            	?>
						    
                            
                                <tr>
                                    <td style=""><?php echo $row['RECT_ID']; ?></td>
                                    <td style=""><?php echo $row['CUS_NAME']; ?></td>
                                    <td style=""><?php echo $row['PRODUCT_NAME']; ?></td> 
                                    <td style=""><?php echo $row['AMOUNT']; ?></td>
                                    <td style=""><?php echo $row['PRODUCT_PRICE']; ?> VND</td>
                                    <td style=""><?php echo $row['RECT_PRICE']; ?> VND</td>
                                    <td style=""><?php echo $row['CUS_EMAIL']; ?></td>
                                    <td style=""><?php echo $row['CUS_PHONENUMBER']; ?></td>
                                </tr>
                                <?php         
                                    }
                                } 
                                ?>
                        </tbody>
                    </table>
                </div>
			</div>
		</div>
        <!-- <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-6">
                                <form role="form" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Tên sản phẩm</label>

                                </div>
                                <div class="form-group">
                                <label>Số lượng</label>

                                </div>                                 
                                <div class="form-group">
                                    <label>Giá hóa đơn</label>

                                </div>          
                                <div class="form-group">
                                <label>Ngày tạo</label>

                                </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- /.col-->
            <!-- /.row -->
		
	</div>	<!--/.main-->	