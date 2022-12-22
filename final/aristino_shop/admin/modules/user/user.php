<?php 
    $rowPerPage = 5; //Số sản phẩm trên 1 trang.
    $sql_user = "SELECT * FROM employee  ORDER BY EMP_ID DESC";
    $resultAll = mysqli_query($conn, $sql_user);
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

    if($current_page > $totalPage) {
        $current_page = $totalPage;
    }
    // SELECT * FROM table_name LIMIT $start,$rowPerPage;
    $start = ($current_page - 1)*$rowPerPage;
    $sql_pagination = "SELECT * FROM employee ORDER BY EMP_ID DESC LIMIT $start,$rowPerPage";
    $resultPagination = mysqli_query($conn, $sql_pagination);
?>

		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="admin.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Danh sách thành viên</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Danh sách thành viên</h1>
			</div>
		</div><!--/.row-->
		<div id="toolbar" class="btn-group">
            <a href="index.php?page=add_user" class="btn btn-success">
                <i class="glyphicon glyphicon-plus"></i> Thêm thành viên
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
						        <th data-field="name"  data-sortable="true">Họ & Tên</th>
                                <th data-field="email" data-sortable="true">Email</th>
                                <th data-field="password" data-sortable="true">Password</th>
                                <th data-field="level" data-sortable="true">Quyền</th>
                                <th>Hành động</th>
						    </tr>
                            </thead>
                            <?php  if(mysqli_num_rows($resultPagination) > 0) {
                                        while ($row = mysqli_fetch_assoc($resultPagination)) {
                            		?>      
                                    <tr>
                                    <td style=""><?php echo $row['EMP_ID']; ?></td>
                                    <td style=""><?php echo $row['EMP_NAME']; ?></td>
                                    <td style=""><?php echo $row['EMP_MAIL']; ?></td>
                                    <td style=""><?php echo $row['EMP_PASS']; ?></td>
                                    <td>
                                        <?php if($row['EMP_ADLEVEL'] == '1') { ?>
                                            <span class="label label-success">Admin</span>
                                        
                                        <?php } else { ?> 
                                            <span class="label label-danger">Member</span>
                                        <?php } ?>
                                      
                                    </td>
                                    <td class="form-group">
                                        <a href="index.php?page=edit_user&EMP_ID=<?php echo $row['EMP_ID']; ?>" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
                                        <a onclick="return confirmDel();" href="modules/user/del_user.php?EMP_ID=<?php echo $row['EMP_ID']; ?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                                    </td>
                                </tr>
                            <?php         
                                    }
                                } 
                            ?>
                            <!-- <tbody>
                                <tr>
                                    <td >1</td>
                                    <td >Admin</td>
                                    <td >admin@gmail.com</td>
                                    <td><span class="label label-danger">Admin</span></td>
                                    <td class="form-group">
                                        <a href="edit_user.php" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
                                        <a href="" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                        <td >2</td>
                                        <td >Nguyễn Văn A</td>
                                        <td >nguyenvana@gmail.com</td>
                                        <td><span class="label label-warning">Member</span></td>
                                        <td class="form-group">
                                            <a href="edit_user.php" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
                                            <a href="" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                                        </td>
                                    </tr>
                            </tbody> -->
						</table>
                    </div>
                    <div class="panel-footer">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                  <!-- Hiển thị nút trở về trang trước -->
                            <?php if($current_page > 1) { ?>
                                <li class="page-item"><a class="page-link" href="index.php?page=user&current_page=<?php echo $current_page-1; ?>">&laquo;</a></li>
                            <?php }else { ?>
                                <li class="page-item disabled"><a class="page-link" href="">&laquo;</a></li>
                           <?php } ?>
                            <!-- Page menu item -->
                            <?php for($i = 1; $i <= $totalPage; $i++) { 
                                    if($i > $current_page - 3 && $i < $current_page + 3) { 
                                        if($i == $current_page) {   
                            ?>
                                            <li class="page-item active"><a class="page-link" href="index.php?page=user&current_page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                        <?php }else { ?>
                                            <li class="page-item"><a class="page-link" href="index.php?page=user&current_page=<?php echo $i; ?>"><?php echo $i; ?></a></li>

                            <?php 
                                    }
                                }
                            }
                            ?>
                            <!-- Hiển thị nút next trang -->
                            <?php if($current_page < $totalPage) { ?>
                                <li class="page-item"><a class="page-link" href="index.php?page=user&current_page=<?php echo $current_page + 1; ?>">&raquo;</a></li>
                            <?php }else {?>
                                <li class="page-item disabled"><a class="page-link disabled" href="">&raquo;</a></li>
                            <?php } ?>
                                <!-- <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li> -->
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
