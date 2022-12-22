

<?php 
    $rowPerPage = 5; //Số sản phẩm trên 1 trang.
    $sql_order = "SELECT * FROM receipt INNER JOIN customer ON customer.CUS_ID=receipt.CUS_ID INNER JOIN receipt_status ON receipt_status.RECT_ID = receipt.RECT_ID WHERE receipt_status.STATUS = 1   ORDER BY receipt.RECT_ID DESC";
    $resultAll = mysqli_query($conn, $sql_order);
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

    if($current_page > $totalPage && 0< $totalPage) {
        $current_page = $totalPage;
    }
    // SELECT * FROM table_name LIMIT $start,$rowPerPage;
    $start = ($current_page - 1)*$rowPerPage;
    $sql_pagination = "SELECT * FROM receipt INNER JOIN customer ON customer.CUS_ID=receipt.CUS_ID INNER JOIN receipt_status ON receipt_status.RECT_ID = receipt.RECT_ID WHERE receipt_status.STATUS = 1   ORDER BY receipt.RECT_ID DESC LIMIT $start,$rowPerPage";
    $resultPagination = mysqli_query($conn, $sql_pagination);
?>

		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="index.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Danh sách hóa đơn</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Danh sách hóa đơn</h1>
                <h2 > Hóa đơn chưa xử lí(
                <?php 
                echo $totalRecords
                ?>)
                 </h2>
               
			</div>
		</div><!--/.row-->
        <div id="toolbar" class="btn-group">
		<a href="index.php?page=order" class="btn btn-success" style="background: red">
			<i class="glyphicon glyphicon-plus"></i> Đơn chưa xử lý
		</a>
        <a href="index.php?page=orders_processed" class="btn btn-success" style="background:orange">
			<i class="glyphicon glyphicon-plus"></i> Đơn đã xử lý
		</a>
        <a href="index.php?page=orders_shiping" class="btn btn-success" style="background: lightblue">
			<i class="glyphicon glyphicon-plus"></i> Đơn đã đang giao
		</a>
        <a href="index.php?page=orders_success" class="btn btn-success" style="background:green;">
			<i class="glyphicon glyphicon-plus"></i> Đơn hàng đã thành công
		</a>
	</div>  
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
                        <table 
                            data-toolbar="#toolbar"
                            data-toggle="table">
						    <thead>
						    <tr>
						        <th data-field="id" data-sortable="true">ID</th>
                                <th data-field="date" data-sortable="true">Ngày tạo</th>
                                <th data-field="name1" data-sortable="true">Tên khách hàng</th>
                                <th data-field="email" data-sortable="true">Email</th>
                                <th data-field="status" data-sortable="true">Trạng thái</th>
                                <th>Hành động</th>
						    </tr>
                            </thead>
                            <tbody>
                            <?php  if(mysqli_num_rows($resultPagination) > 0) {
                                     while(  $row = mysqli_fetch_assoc($resultPagination)){
                            ?>      
                                <tr>
                                    <td style=""><?php echo $row['RECT_ID']; ?></td>
                                    <td style=""><?php echo $row['RECT_DATE']; ?></td>
                                    <td style=""><?php echo $row['CUS_NAME']; ?></td>
                                    <td style=""><?php echo $row['CUS_EMAIL']; ?></td>
                                    <td>
                                        <?php if($row['STATUS'] == '1') { ?>
                                            <span class="label label-danger">Đơn chưa xử lí </span>
                                        <?php }if($row['STATUS'] == '2') { ?>
                                            <span class="label label-warning">Đơn đã xử lí </span>
                                        <?php }if($row['STATUS'] == '3') { ?>
                                            <span class="label label-info">Đơn đang được giao </span>
                                        <?php } if($row['STATUS'] == '4') { ?>
                                            <span class="label label-success">Đơn hàng thành công </span>
                                        <?php } ?>
                                    
                                    </td>
                                    <td class="form-group">
                                        <a href="index.php?page=orders_detail&RECT_ID=<?php echo $row['RECT_ID']; ?>" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i> Chi tiết hóa đơn</a>
                                        <a href="modules/orders/orders_edit.php?RECT_ID=<?php echo $row['RECT_ID']; ?>&case=12" class="btn btn-success"><i class="glyphicon glyphicon-ok"></i> Xử lí</a>
                                        <a onclick="return confirmDel();" href="modules/orders/del_orders.php?RECT_ID=<?php echo $row['RECT_ID']; ?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i>Xóa</a>
                                    </td>
                                </tr>
                            <?php         
                                     }
                                } 
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="panel-footer">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <!-- Hiển thị nút trở về trang trước -->
                            <?php if($current_page > 1) { ?>
                                <li class="page-item"><a class="page-link" href="index.php?page=order&current_page=<?php echo $current_page-1; ?>">&laquo;</a></li>
                            <?php }else { ?>
                                <li class="page-item disabled"><a class="page-link" href="">&laquo;</a></li>
                           <?php } ?>
                            <!-- Page menu item -->
                            <?php for($i = 1; $i <= $totalPage; $i++) { 
                                    if($i > $current_page - 3 && $i < $current_page + 3) { 
                                        if($i == $current_page) {   
                            ?>
                                            <li class="page-item active"><a class="page-link" href="index.php?page=order&current_page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                        <?php }else { ?>
                                            <li class="page-item"><a class="page-link" href="index.php?page=order&current_page=<?php echo $i; ?>"><?php echo $i; ?></a></li>

                            <?php 
                                    }
                                }
                            }
                            ?>
                            <!-- Hiển thị nút next trang -->
                            <?php if($current_page < $totalPage) { ?>
                                <li class="page-item"><a class="page-link" href="index.php?page=order&current_page=<?php echo $current_page + 1; ?>">&raquo;</a></li>
                            <?php }else {?>
                                <li class="page-item disabled"><a class="page-link disabled" href="">&raquo;</a></li>
                            <?php } ?>
                        </ul>
                        </nav>
                    </div>
				</div>
			</div>
		</div><!--/.row-->	
	</div>	<!--/.main-->
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-table.js"></script>
    <script>
    function confirmDel() {
        return confirm("Bạn có chắc chắn xóa?");
    }
    </script>
