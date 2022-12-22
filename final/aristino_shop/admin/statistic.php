<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Aristino Shop - Administrator</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/bootstrap-table.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<!--Icons-->
<script src="js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
<?php
	include('modules/header.php');
	?>
		
	<?php
	include('modules/sidebar.php');
	?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="admin.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Báo cáo thống kê</li>
                <li class="active">Báo cáo sản phẩm</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Báo cáo thống kê sản phẩm bán chạy</h1>
			</div>
		</div><!--/.row-->
    <table class="col-lg-6" width="50px;">
        <tr>
            <td>Từ Ngày
            <td>
                <input type="text" id="timeCheckIn" class="form-control"  />
            </td>
            <td>Đến ngày:</td>
            <td>
                <input type="text" id="timeCheckOut" class="form-control" />
            </td>
            <td>
                <button>Lọc</button>
            </td>
        </tr>
    </table>

		<!-- <div id="toolbar" class="btn-group">
            <a href="add_product.php" class="btn btn-success">
                <i class="glyphicon glyphicon-plus"></i> Thêm sản phẩm
            </a>
        </div> -->
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
						        <th data-field="name"  data-sortable="true">Tên sản phẩm</th>
                                <th>Ảnh sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Hành động</th>
						    </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        <td >1</td>
                                        <td >Sản phẩm số 1</td>
                                        <td style="text-align: center"><img width="130" height="180" src="img/download.jpeg" /></td>
                                        <td>20</td>
                                        <td class="form-group">
                                            <a href="" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i>Chi tiết hóa đơn</a>
                                        </td>
                                    </tr>
                                    <tr>
                                            <td >1</td>
                                            <td >Sản phẩm số 2</td>
                                            <td style="text-align: center"><img width="130" height="180" src="img/download.jpeg" /></td>
                                            <td>5</td>
                                            <td class="form-group">
                                                <a href="" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i>Chi tiết hóa đơn</a>
                                            </td>
                                        </tr>
                                 </tbody>
						</table>
                    </div>
                    <div class="panel-footer">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                            </ul>
                        </nav>
                    </div>
				</div>
			</div>
		</div><!--/.row-->	
        <div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Báo cáo thống kê sản phẩm tồn kho</h1>
			</div>
		</div><!--/.row-->

        <table class="col-lg-6" width="50px;">
        <tr>
            <td>Từ Ngày
            <td>
                <input type="text" id="timeCheckIn1" class="form-control"  />
            </td>
            <td>Đến ngày:</td>
            <td>
                <input type="text" id="timeCheckOut1" class="form-control" />
            </td>
            <td>
                <button>Lọc</button>
            </td>
        </tr>
    </table>
		<!-- <div id="toolbar" class="btn-group">
            <a href="add_product.php" class="btn btn-success">
                <i class="glyphicon glyphicon-plus"></i> Thêm sản phẩm
            </a>
        </div> -->
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
						        <th data-field="name"  data-sortable="true">Tên sản phẩm</th>
                                <th>Ảnh sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Hành động</th>
						    </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        <td >1</td>
                                        <td >Sản phẩm số 1</td>
                                        <td style="text-align: center"><img width="130" height="180" src="img/download.jpeg" /></td>
                                        <td>20</td>
                                        <td class="form-group">
                                            <a href="" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i>Chi tiết hóa đơn</a>
                                        </td>
                                        </td>
                                    </tr>
                                    <tr>
                                            <td >1</td>
                                            <td >Sản phẩm số 2</td>
                                            <td style="text-align: center"><img width="130" height="180" src="img/download.jpeg" /></td>
                                            <td>5</td>
                                            <td class="form-group">
                                                <a href="" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i>Chi tiết hóa đơn</a>
                                            </td>
                                        </tr>
                                 </tbody>
						</table>
                    </div>
                    <div class="panel-footer">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
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
    <script src="js/bootstrap-datepicker.js"></script>
    <script>
    $(function () {
        'use strict';
        var nowTemp = new Date();
        var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

        var checkin = $('#timeCheckIn').datepicker({
            onRender: function (date) {
                return date.valueOf() < now.valueOf() ? 'disabled' : '';
            }
        }).on('changeDate', function (ev) {
            if (ev.date.valueOf() > checkout.date.valueOf()) {
                var newDate = new Date(ev.date)
                newDate.setDate(newDate.getDate() + 1);
                checkout.setValue(newDate);
            }
            checkin.hide();
            $('#timeCheckOut')[0].focus();
        }).data('datepicker');
        var checkout = $('#timeCheckOut').datepicker({
            onRender: function (date) {
                return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
            }
        }).on('changeDate', function (ev) {
            checkout.hide();
        }).data('datepicker');
    });
    $(function () {
        'use strict';
        var nowTemp = new Date();
        var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

        var checkin = $('#timeCheckIn1').datepicker({
            onRender: function (date) {
                return date.valueOf() < now.valueOf() ? 'disabled' : '';
            }
        }).on('changeDate', function (ev) {
            if (ev.date.valueOf() > checkout.date.valueOf()) {
                var newDate = new Date(ev.date)
                newDate.setDate(newDate.getDate() + 1);
                checkout.setValue(newDate);
            }
            checkin.hide();
            $('#timeCheckOut1')[0].focus();
        }).data('datepicker');
        var checkout = $('#timeCheckOut1').datepicker({
            onRender: function (date) {
                return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
            }
        }).on('changeDate', function (ev) {
            checkout.hide();
        }).data('datepicker');
    });
</script>
</body>

</html>
