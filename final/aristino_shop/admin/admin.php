<?php 
// session_start();
if(!defined("ISLOGGED")) {
	header("location: index.php");
}

?>
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
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php"><span>Aristino</span>shop</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Admin <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Hồ sơ</a></li>
							<li><a href="logout.php"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Đăng xuất</a></li>
						</ul>
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">

<ul class="nav menu">
    <li class="active"><a href="index.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
    <li><a href="index.php?page=user"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>Quản lý thành viên</a></li>
    <li><a href="index.php?page=category"><svg class="glyph stroked open folder"><use xlink:href="#stroked-open-folder"/></svg>Quản lý danh mục</a></li>
    <li><a href="index.php?page=product"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>Quản lý sản phẩm</a></li>
    <li><a href="index.php?page=order"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>Quản lý hóa đơn</a></li>
    <!-- <li class="parent "><a data-toggle="collapse" href="#sub-item-1" class="" aria-expanded="true"><svg class="glyph stroked chain"><use xlink:href="#stroked-chain"></use></svg>
        <em class="fa fa-navicon fa-minus"></em>Báo cáo thống kê <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right" aria-expanded="true"><em class="fa fa-plus fa-minus"></em></span>
        </a>
        <ul class="children collapse in" id="sub-item-1" aria-expanded="true" >
            <li><a class="" href="statistic.php">
                <span class="fa fa-arrow-right">&nbsp;</span> Báo cáo sản phẩm
            </a></li>
            <li><a class="" href="salesreport.php">
                <span class="fa fa-arrow-right">&nbsp;</span> Báo cáo doanh thu
            </a></li>
        </ul>
    </li> -->
</ul>

	</div><!--/.sidebar-->		
	<?php 
	// switch-case
	
	if(isset($_GET['page'])) {
		switch ($_GET['page']) {
			//category customer
			case 'add_customer':
				require_once "modules/customer/add_customer.php";
				break;
			case 'edit_customer':
				require_once "modules/customer/edit_customer.php";
				break;
			case 'customer':
				require_once "modules/customer/customer.php";
				break;
			case 'del_customer':
				require_once "modules/customer/del_customer.php";
				break;
			// category module
			case 'add_category':
				require_once "modules/category/add_category.php";
				break;
			case 'edit_category':
				require_once "modules/category/edit_category.php";
				break;
			case 'category':
				require_once "modules/category/category.php";
				break;
			case 'del_category':
				require_once "modules/category/del_category.php";
				break;
			// product module
			case 'product':
				require_once "modules/product/product.php";
				break;
			case 'add_product':
				require_once "modules/product/add_product.php";
				break;
			case 'edit_product':
				require_once "modules/product/edit_product.php";
				break;
			case 'del_product':
				require_once "modules/product/del_product.php";
				break;
			// user module
			case 'user':
				require_once "modules/user/user.php";
				break;
			case 'add_user':
				require_once "modules/user/add_user.php";
				break;
			case 'edit_user':
				require_once "modules/user/edit_user.php";
				break;
			case 'del_user':
				require_once "modules/user/del_user.php";
				break;
			//order module
			case 'order':
				require_once "modules/orders/order.php";
				break;
			case 'orders_processed':
				require_once "modules/orders/orders_processed.php";
				break;
			case 'orders_shiping':
				require_once "modules/orders/orders_shiping.php";
				break;
			case 'orders_success':
				require_once "modules/orders/orders_success.php";
				break;
			case 'orders_edit':
				require_once "modules/orders/orders_edit.php";
				break;
			case 'orders_detail':
				require_once "modules/orders/orders_detail.php";
				break;
		}
	}else{
		require_once "static.php";
	}
	?>
	<!-- ./Main Content -->
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-table.js"></script>	
</body>

</html>
