<?php
    include 'lib/session.php';
  
?>
<?php
	
	include 'lib/database.php';
	include 'helpers/format.php';

	spl_autoload_register(function($class){
		include_once "classes/".$class.".php";
	});
		

	$db = new Database();
	$fm = new Format();
	$cate = new category();	
	$pro = new product();
	$sale=new sale();	
	 $selled=new selled();


	
	      	 	
?>


<!DOCTYPE html>
<html lang="zxx">
<head>
	<!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name='copyright' content=''>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Title Tag  -->
    <title>Shop</title>
	<!-- Favicon -->
	<link rel="icon" type="image/png" href="images/favicon.png">
	<!-- Web Font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
	
	<!-- StyleSheet -->
	
	<!-- Bootstrap -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Magnific Popup -->
    <link rel="stylesheet" href="css/magnific-popup.min.css">
	<!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.css">
	<!-- Fancybox -->
	<link rel="stylesheet" href="css/jquery.fancybox.min.css">
	<!-- Themify Icons -->
    <link rel="stylesheet" href="css/themify-icons.css">
	<!-- Nice Select CSS -->
    <link rel="stylesheet" href="css/niceselect.css">
	<!-- Animate CSS -->
    <link rel="stylesheet" href="css/animate.css">
	<!-- Flex Slider CSS -->
    <link rel="stylesheet" href="css/flex-slider.min.css">
	<!-- Owl Carousel -->
    <link rel="stylesheet" href="css/owl-carousel.css">
	<!-- Slicknav -->
    <link rel="stylesheet" href="css/slicknav.min.css">
	
	<!-- Eshop StyleSheet -->
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">

	
	
</head>
<body class="js">
	
	<!-- Preloader -->
	<!-- hình ảnh load trang -->
	<div class="preloader">
		<div class="preloader-inner">
			<div class="preloader-icon">
				<span></span>
				<span></span>
			</div>
		</div>
	</div>
	<!-- End Preloader -->
	
	
	<!-- Header -->
	<header class="header shop">
		<!-- Topbar -->
		<div class="topbar"><!-- thanh header -->

			<div class="container">
				<div class="row">
					<div class="col-lg-5 col-md-12 col-12">
						<!-- Top Left -->
						<div class="top-left"> <!--  float left -->
							<ul class="list-main">
								
								<li><i class="ti-email"></i> support@gmail.com</li>
							</ul>
						</div>
						<!--/ End Top Left -->
					</div>
					<div class="col-lg-7 col-md-12 col-12">
						<!-- Top Right -->
						<div class="right-content"> <!--  float right -->
							<ul class="list-main"> 
								<li><i class="ti-location-pin"></i> Địa chỉ shop</li>
								
								<li><i class="ti-user"></i> <a href="#">Tài khoản</a></li>
								<li><i class="ti-power-off"></i><a href="login.php#">Đăng nhập</a></li>
							</ul>
						</div>
						
						<!-- End Top Right -->
					</div>
					
			</div>

		</div>
		<!-- End Topbar -->
		<div class="middle-inner">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 col-md-2 col-12">
						<!-- Logo -->
						<div class="logo">
							<a href="index.php"><img src="images/logo.jpg" alt="logo"></a>
						</div>
				
					

					</div>
					<div class="col-lg-8 col-md-7 col-12">
						<div class="search-bar-top">
							<div class="search-bar">
								
								<form method="POST" action="product-details.php">
									<input name="search" placeholder="Tìm kiếm ...." type="search" id="search">
									<button class="btnn" type="submit" name="submit-search"><i class="ti-search"></i></button>
								</form>
							</div>
						</div>
					</div>


			
				</div>
				  <div class="col-md-5" style="position: relative;margin-top: -28px;margin-left: 290px;">
        			<div class="list-group" id="search-pro">
        				<!-- <a href="#" class="list-group-item list-group-item-action border-1">adasdas</a> -->
        			</div>
      			</div>
			</div>
		</div>
<script type="text/javascript">
 function loadDoc() {
  

  setInterval(function(){

   var xhttp = new XMLHttpRequest();
   xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("search-pro").innerHTML = this.responseText;
    }
   };
   xhttp.open("GET", "/ajax/search.php", true);
   xhttp.send();

  },1000);


 }
 loadDoc();
</script>


		<!-- Header Inner -->
		<div class="header-inner">
			<div class="container">
				<div class="cat-nav-head">
					<div class="row">
						<div class="col-lg-3">
							<div class="all-category">
								<h3 class="cat-heading"><i class="fa fa-bars" aria-hidden="true"></i>Cửa hàng</h3>
								<ul class="main-category">
									

									<li><a href="#">Sản phẩm <i class="fa fa-angle-right" aria-hidden="true"></i></a>
										<ul class="sub-category">
									<?php
										$show=$cate->show_category();
										while ($result=$show->fetch_assoc()) {
											?>
									<li><a href="search-product.php?cateId=<?php echo  $result['cateId'] ; ?>"><?php echo $result['cateName']; ?></a></li>		
									<?php
										}
									?>
		
									<li><a href="search-product.php">Sản phẩm khuyến mãi </a>
										
									</li>
								
									<li><a href="search-product.php">Sản phẩm bán chạy</a></li>
									<li><a href="search-product.php">Sản phẩm mới về</a></li>
									<li><a href="search-product.php">Sản phẩm đánh giá cao</a></li>
									<li><a href="search-product.php">Sản phẩm được yêu thích nhiều nhất</a></li>
																			</ul>
									</li>


								</ul>
							</div>
						</div>
						<div class="col-lg-9 col-12">
							<div class="menu-area">
								<!-- Main Menu -->
								<nav class="navbar navbar-expand-lg">
									<div class="navbar-collapse">	
										<div class="nav-inner">	
											<ul class="nav main-menu menu navbar-nav">
													<li ><a href="index.php">Trang chủ</a></li>
													<li><a href="#">Sản phẩm</a></li>												
													<li><a href="#">Dịch vụ</a></li>
													<li><a href="#">Cửa hàng<i class="ti-angle-down"></i><span class="new">New</span></a>
														<ul class="dropdown">
															<li><a href="cart.php">Giỏ hàng</a></li>
															<li><a href="checkout.php">Thanh toán</a></li>
														</ul>
													</li>
													<li><a href="#">Tin tức</a></li>									
												
													<li><a href="contact.php">Liên hệ</a></li>
												</ul>
										</div>
									</div>
								</nav>
								<!--/ End Main Menu -->	
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/ End Header Inner -->
		<!--/ End Header Inner -->
	</header>