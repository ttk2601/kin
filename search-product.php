<?php
		include "include/header.php"; 
?>

<?php
	if(isset($_GET['cateId'])  ){
	     	$id=$_GET['cateId'];
        $search_pro_by_cateId=$pro->getProductByCateId($id);
      	
      	$search_cateName=$pro->getCateName($id);
      	$result1=$search_cateName->fetch_assoc();
  
?>

 <div class="product-area section">
            <div class="container">
				<div class="row">
					<div class="col-12">
						<div class="section-title">
							<h2><?php echo $result1['cateName']; ?> </h2>
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
											   while($result=$search_pro_by_cateId->fetch_assoc()){  
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


<?php

	  }
	

?>










	<?php
	include "include/footer.php";
	     
	?>
