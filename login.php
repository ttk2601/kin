<?php
		include "include/header.php";
		
?>
	<!-- Breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bread-inner">
						<ul class="bread-list">
							<li><a href="index1.php">Trang chủ<i class="ti-arrow-right"></i></a></li>
							<li class="active"><a href="blog-single.php">Đăng nhập</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->
  
	<!-- Start Contact -->
		 <div class="login box box--big">
        <form action="#" method="post">
            <div class="agile-field-txt">
                <label>Tài khoản</label>
                <input type="text" name="name" placeholder="Nhập tài khoản..." required="" />
            </div>
            <div class="agile-field-txt">
                <label>Mật khẩu</label>
                <input type="password" name="password" placeholder="Nhập mật khẩu..." required="" id="myInput" />
                <div class="agile_label">
                    <input id="check3" name="check3" type="checkbox" value="show password" onclick="myFunction()">
                    <label class="check" for="check3">Hiện mật khẩu</label>
                </div>
                <div class="agile-right">
                    <a href="#">Quên mật khẩu ?</a>
                </div>
            </div>
            <!-- script for show password -->
            <script>
                function myFunction() {
                    var x = document.getElementById("myInput");
                    if (x.type === "password") {
                        x.type = "text";
                    } else {
                        x.type = "password";
                    }
                }
            </script>
            <!-- //end script -->
            <div class="agile-right">
                    <a href="res.php" >Đăng ký</a>
                </div>
                <input type="submit" value="ĐĂNG NHẬP">
        </form>
    </div>
	<!--/ End Contact -->
	
	<!-- Map Section -->
	
	<!-- End Shop Newsletter -->
	
	<?php
		include "include/footer.php";
		
?>
	
	
 
	<!-- Jquery -->
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate-3.0.0.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<!-- Popper JS -->
	<script src="js/popper.min.js"></script>
	<!-- Bootstrap JS -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Color JS -->
	<script src="js/colors.js"></script>
	<!-- Slicknav JS -->
	<script src="js/slicknav.min.js"></script>
	<!-- Owl Carousel JS -->
	<script src="js/owl-carousel.js"></script>
	<!-- Magnific Popup JS -->
	<script src="js/magnific-popup.js"></script>
	<!-- Fancybox JS -->
	<script src="js/facnybox.min.js"></script>
	<!-- Waypoints JS -->
	<script src="js/waypoints.min.js"></script>
	<!-- Jquery Counterup JS -->
	<script src="js/jquery-counterup.min.js"></script>
	<!-- Countdown JS -->
	<script src="js/finalcountdown.min.js"></script>
	<!-- Nice Select JS -->
	<script src="js/nicesellect.js"></script>
	<!-- Ytplayer JS -->
	<script src="js/ytplayer.min.js"></script>
	<!-- Flex Slider JS -->
	<script src="js/flex-slider.js"></script>
	<!-- ScrollUp JS -->
	<script src="js/scrollup.js"></script>
	<!-- Onepage Nav JS -->
	<script src="js/onepage-nav.min.js"></script>
	<!-- Easing JS -->
	<script src="js/easing.js"></script>
	<!-- Google Map JS -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDnhgNBg6jrSuqhTeKKEFDWI0_5fZLx0vM"></script>	
	<script src="js/gmap.min.js"></script>
	<script src="js/map-script.js"></script>
	<!-- Active JS -->
	<script src="js/active.js"></script>
</body>
</html>