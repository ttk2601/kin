<?php
		include "include/header.php";
		include "include/slider.php";
?>
	<!--/ End Header -->
	

	
	<!-- Start Small Banner  -->
	<section class="small-banner section">
		<div class="container-fluid">
			<div class="row">
				<!-- Single Banner  -->
				<div class="col-lg-4 col-md-6 col-12">
					<div class="single-banner">
						<img src="images/boot.jpg" alt="#">
						<div class="content">
							<p>Phụ kiện</p>
							<h3>Bộ sưu tập <br></h3>
							<a href="#">Xem ngay</a>
						</div>
					</div>
				</div>
				<!-- /End Single Banner  -->
				<!-- Single Banner  -->
				<div class="col-lg-4 col-md-6 col-12">
					<div class="single-banner">
						<img src="images/boot.jpg" alt="#">
						<div class="content">
							<p>Khuyến mãi</p>
							<h3>Tất cả <br> sản phẩm </h3>
							<a href="#">Xem ngay</a>
						</div>
					</div>
				</div>
				<!-- /End Single Banner  -->
				<!-- Single Banner  -->
				<div class="col-lg-4 col-12">
					<div class="single-banner tab-height">
						<img src="images/boot.jpg" alt="#">
						<div class="content">
							<p>Bảo hành</p>
							<h3>Tất cả sản phẩm <br> 12 tháng </h3>
							<a href="#">Xem ngay</a>
						</div>
					</div>
				</div>
				<!-- /End Single Banner  -->
			</div>
		</div>
	</section>
	<!-- End Small Banner -->
	
	<!-- Start Product Area -->
    <div class="product-area section">
            <div class="container">
				<div class="row">
					<div class="col-12">
						<div class="section-title">
							<h2>Sản phẩm mới về </h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="product-info">
							<div class="nav-main">
								<!-- Tab Nav -->
								
								<!--/ End Tab Nav -->
							</div>
							<div class="tab-content" id="myTabContent">
								<!-- Start Single Tab -->
								<div class="tab-pane fade show active" id="xemay" role="tabpanel">
									<div class="tab-single">
										<div class="row">
										<?php
											$list_pro=$pro->getProductMoiVe();
											while ($result=$list_pro->fetch_assoc()) {
											 $result2=$selled->getSumById($result['productId']);
											 $conlai=0;
               								 if($result2){
                 							   $daBan=$result2->fetch_assoc();
                 							 $conlai=$result['productAmount']-$daBan['SUM(amount)'];

                 							}
                 							if($conlai>0){
                 						
												?>

										
											<div class="col-xl-4 col-lg-6 col-12">
												<div class="single-product">
													<div class="product-img">
														<a href="product-details.php">
															
															<img class="default-img"  src="admin/uploads/<?php echo $result['productImage'] ?>" >
															<span class="new">New</span>
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Xem ngay</span></a>
																<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Thêm vào danh sách yêu thích</span></a>
																<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>So sánh</span></a>
															</div>
															<div class="product-action-2">Thêm vào giỏ hàng</a>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h3><a href="product-details.html"><?php echo $result['productName'] ?></a></h3>
														<div class="product-price">
															<span><?php echo number_format($result['productPrice'], 0).' VND'?></span>
														</div>
													</div>
												</div>

											</div>
											<?php
										}
										?>
										<?php
											if($conlai==0){												

												?>
												<div class="col-xl-4 col-lg-6 col-12">
												<div class="single-product">
													<div class="product-img">
														<a href="product-details.php">
															
															<img class="default-img"  src="admin/uploads/<?php echo $result['productImage'] ?>" >
															<span class="out-of-stock">Hết hàng</span>
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Xem ngay</span></a>
																<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Thêm vào danh sách yêu thích</span></a>
																<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>So sánh</span></a>
															</div>
															
															
														</div>
													</div>
													<div class="product-content">
														<h3><a href="product-details.html"><?php echo $result['productName'] ?></a></h3>
														<div class="product-price">
															<span><?php echo number_format($result['productPrice'], 0).' VND'?></span>
														</div>
													</div>
												</div>

										</div>


										<?php			
											}
									
										}
												
										?>
									
											
											
										</div>
									</div>
								</div>
					
							</div>
						</div>
					</div>
				</div>
            </div>
    </div>
	<!-- End Product Area -->
	
	<!-- Start Midium Banner  -->
	<section class="midium-banner">
		<div class="container">
			<div class="row">
				<!-- Single Banner  -->
				<div class="col-lg-6 col-md-6 col-12">
					<div class="single-banner">
						<img src="images/bag.jpg" alt="#">
						<div class="content">
							<p>Xe máy</p>
							<h3>Giảm giá<br>Up to<span> 50%</span></h3>
							<a href="#">Xem ngay</a>
						</div>
					</div>
				</div>
				<!-- /End Single Banner  -->
				<!-- Single Banner  -->
				<div class="col-lg-6 col-md-6 col-12">
					<div class="single-banner">
						<img src="images/bag.jpg" alt="#">
						<div class="content">
							<p>Phụ kiện</p>
							<h3>Giảm giá <br> up to <span>70%</span></h3>
							<a href="#" class="btn">Xem ngay</a>
						</div>
					</div>
				</div>
				<!-- /End Single Banner  -->
			</div>
		</div>
	</section>
	<!-- End Midium Banner -->
	
	<!-- Start Most Popular -->
	<div class="product-area most-popular section">
        <div class="container">
            <div class="row">
				<div class="col-12">
					<div class="section-title">
						<h2>Sản phẩm bán chạy</h2>
					</div>
				</div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="owl-carousel popular-slider">
						<!-- Start Single Product -->

						<?php
											$list=$pro->getSPBanChay();
											while ($result=$list->fetch_assoc()) {
											
											 $conlai=0;
               							
                 							 $conlai=$result['productAmount']-$result['daban'];

                 						
                 							if($conlai>0){
                 						
												?>
						<div class="single-product">
							<div class="product-img">
								<a href="product-details.php">
									<img class="default-img"  src="admin/uploads/<?php echo $result['productImage'] ?>" alt="#">
									
									<span class="out-of-stock">Hot</span>
								</a>
								<div class="button-head">
									<div class="product-action">
										<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Xem ngay</span></a>
										<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Thêm vào danh sách yêu thích</span></a>
										<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Thêm vào danh sách so sánh</span></a>
									</div>
									<div class="product-action-2">
										<a title="Add to cart" href="#">Thêm giỏ hảng</a>
									</div>
								</div>
							</div>
							<div class="product-content">
								<h3><a href="product-details.php"><?php echo $result['productName']?></a></h3>
								<div class="product-price">
									<span class="old">600.000 VNĐ</span>
									<span>590.000 VNĐ</span>
								</div>
							</div>
						</div>

							
											<?php
										}
										?>
										<?php
											if($conlai==0){												

												?>

							<div class="single-product">
							<div class="product-img">
								<a href="product-details.php">
									<img class="default-img"  src="admin/uploads/<?php echo $result['productImage'] ?>" alt="#">
									
									<span class="out-of-stock">Hết hàng</span>
								</a>
								<div class="button-head">
									<div class="product-action">
										<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Xem ngay</span></a>
										<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Thêm vào danh sách yêu thích</span></a>
										<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Thêm vào danh sách so sánh</span></a>
									</div>
									
								</div>
							</div>
							<div class="product-content">
								<h3><a href="product-details.php"><?php echo $result['productName']?></a></h3>
								<div class="product-price">
									<span class="old">600.000 VNĐ</span>
									<span>590.000 VNĐ</span>
								</div>
							</div>
						</div>	
							
										<?php			
											}
									
										}
												
										?>
										</div>	
						
                    </div>
                </div>
            </div>
        </div>
    </div>
	<!-- End Most Popular Area -->
	
	
	

	
	
	<!-- Start Shop Services Area -->
	<section class="shop-services section home">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-rocket"></i>
						<h4>Miễn phí vận chuyển</h4>
						<p>Đơn hàng từ 500.000</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-reload"></i>
						<h4>Trả hàng miễn phí</h4>
						<p>Trong 30 ngày</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-lock"></i>
						<h4>Thanh toán an toàn</h4>
						<p>100% bảo mật</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-tag"></i>
						<h4>Giá hợp lí</h4>
						<p>Giá đảm bảo</p>
					</div>
					<!-- End Single Service -->
				</div>
			</div>
		</div>
	</section>
	<!-- End Shop Services Area -->
	
	<!-- Start Shop Newsletter  -->
	<section class="shop-newsletter section">
		<div class="container">
			<div class="inner-top">
				<div class="row">
					<div class="col-lg-8 offset-lg-2 col-12">
						<!-- Start Newsletter Inner -->
						<div class="inner">
							<h4>Email của bạn</h4>
							<p> Đăng ký để biết các chương trình <span>khuyến mãi</span></p>
							<form action="mail/mail.php" method="get" target="_blank" class="newsletter-inner">
								<input name="EMAIL" placeholder="Email ..." required="" type="email">
								<button class="btn">Đăng ký</button>
							</form>
						</div>
						<!-- End Newsletter Inner -->
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Shop Newsletter -->
	
	<!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row no-gutters">
							<div class="col-lg-6 offset-lg-3 col-12">
								<h4 style="margin-top:100px;font-size:14px; font-weight:500; color:#F7941D; display:block; margin-bottom:5px;">Độc Menswear</h4>
								<h3 style="font-size:30px;color:#333;">Currently You are using free lite Version of Eshop.<h3>
								<p style="display:block; margin-top:20px; color:#888; font-size:14px; font-weight:400;">Please, purchase full version of the template to get all pages, features and commercial license</p>
								<div class="button" style="margin-top:30px;">
									<a href="https://wpthemesgrid.com/downloads/eshop-ecommerce-html5-template/" target="_blank" class="btn" style="color:#fff;">Buy Now!</a>
								</div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <!-- Modal end -->
	
	<!-- Start Footer Area -->
	
	<!-- /End Footer Area -->
 	<?php
	include "include/footer.php";
	
	?>
	<!-- Jquery -->
  