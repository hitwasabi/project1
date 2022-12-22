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
                <li class="active">Báo cáo doanh thu</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Báo cáo doanh thu theo tháng</h1>
			</div>
		</div><!--/.row-->
    <table class="col-lg-6" width="50px;">
        <tr>
            <td>Chọn tháng
            <td>
            <select>
            <option>Tháng 1</option>
            <option>Tháng 2</option>
            <option>Tháng 3</option>
            <option>Tháng 4</option>
            <option>Tháng 5</option>
            <option>Tháng 6</option>
            <option>Tháng 7</option>
            <option>Tháng 8</option>
            <option>Tháng 9</option>
            <option>Tháng 10</option>
            <option>Tháng 11</option>
            <option>Tháng 12</option>
            </select>
            </td>
            <td>Đến ngày:</td>
            <td>
                <div id="current-time"></div>
                <script>
                var curDate = new Date();  
                var curDay = curDate.getDate();
                var curMonth = curDate.getMonth() + 1;
                var curYear = curDate.getFullYear();   
                document.getElementById('current-time').innerHTML = curDay + "/" + curMonth + "/" + curYear;
</script>
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
                                <th>Giá</th>
						    </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        <td >1</td>
                                        <td >Sản phẩm số 1</td>
                                        <td style="text-align: center"><img width="130" height="180" src="img/download.jpeg" /></td>
                                        <td>20</td>
                                        <td>100000đ</td>
                                       
                                    </tr>
                                    <tr>
                                            <td >1</td>
                                            <td >Sản phẩm số 2</td>
                                            <td style="text-align: center"><img width="130" height="180" src="img/download.jpeg" /></td>
                                            <td>5</td>
                                            <td>250000đ</td>
                                        </tr>
                                 </tbody>
                                 <tfoot><th colspan="2">Tổng doanh thu :3250000đ</th></tfoot>
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
        <p>Biểu đồ doanh thu</p>
        <canvas id="countries" width="600" height="400"></canvas>
        

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/chart.min.js"></script>
    <script src="js/chart-data.js"></script>
    <script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
    <script src="js/bootstrap-table.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/custom.js"></script>
    <script>
	var pieData = [
		{   
            label: "Áo",
			value: 20,
			color:"#878BB6"
		},
		{
            label: "Quần",
			value : 40,
			color : "#4ACAB4"
		},
	];

	// pie chart options
	var pieOptions = {
		segmentShowStroke : false,
		animateScale : true
	}

	// get pie chart canvas
	var countries= document.getElementById("countries").getContext("2d");

	// draw pie chart
	new Chart(countries).Pie(pieData, pieOptions);
	</script>
</body>

</html>
