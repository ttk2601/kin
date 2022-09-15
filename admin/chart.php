<?php
        include "include/header.php";?>

<?php
        include "include/menu.php";?>
<section id="main-content">
	<section class="wrapper">
		<!-- //market-->
		<div class="market-updates">
				<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-3">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-usd"></i>
					</div>
					<div class="col-md-8 market-update-left">
							<h4>Doanh thu của cửa hàng</h4>
						<h4><?php
						$doanhthu=$selled->getDoanhThu();
						$sum=0;
						while($result=$doanhthu->fetch_assoc()){
							$sum+=$result['doanhthu'];
						}
						echo number_format($sum, 0, '', ',');
						?></h3>
						<p></p>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
				<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-4">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-shopping-cart" aria-hidden="true"></i>
					</div>
					<div class="col-md-8 market-update-left">
						<h4>Sản phẩm đã bán</h4>
						<h3>
							<?php
						$soluong=$selled->getSoLuong();
						$sum=0;
						while($result=$soluong->fetch_assoc()){
							$sum+=$result['SL'];
						}
						echo number_format($sum, 0, '', ',');
						?>
						</h3>
						
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-2">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-shopping-cart"> </i>
					</div>
					 <div class="col-md-8 market-update-left">
					 	<h4>Sản phẩm chưa bán</h4>
					 <h3>
							<?php
						$soluong=$selled->getSoLuong();
						$danhap=$selled->getSoLuongKho();
						$sum=0;
						if($result=$soluong->fetch_assoc()){
							$danhap1=$danhap->fetch_assoc();
							$sum=$danhap1['SL']-$result['SL'];
						}
						echo number_format($sum, 0, '', ',');
						?>
						</h3>
					
					
				  </div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-1">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-users" ></i>
					</div>
					<div class="col-md-8 market-update-left">
					<h4>Nhân viên bán hàng</h4>
						<h3>20</h3>
						
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
		
		



            
		   <div class="clearfix"> </div>
		</div>	
		<!-- //market-->
		<div class="row">
			<div class="panel-body">
				<div class="col-md-12 w3ls-graph">
					<!--agileinfo-grap-->
						<div class="agileinfo-grap">
							<div class="agileits-box">
								<header class="agileits-box-header clearfix">
									<h3>Thống kê doanh thu</h3>
										<div class="toolbar">
											
											
										</div>
								</header>
								<div class="agileits-box-body clearfix">
									<div id="hero-area"></div>
								</div>
							</div>
						</div>
	<!--//agileinfo-grap-->

				</div>
			</div>
		</div>


			<div class="agile-last-grids">

				<div class="col-md-12 agile-last-left agile-last-right">
					<div class="agile-last-grid">
						<div class="area-grids-heading">
							<h3>Thống kê theo tháng</h3>
						</div>
					<div id="curve_chart"></div>
					 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
   				 <script type="text/javascript">
     			 google.charts.load('current', {'packages':['corechart']});
     			 google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Doanh thu'],
    
         		<?php 
       						for ($i=1; $i <=5 ; $i++) { 
       						$dt=$selled->getDoanhThuTheoThang($i);
       						while ($result=$dt->fetch_assoc()) {
       						$thang='Tháng '."$i";
       					     echo"['".$thang."',".$result['doanhthu']."],";
       						}
       						}

       					 ?>
        ]);

        var options = {
         
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>

				</div>
				
			</div>
		
				
<div class="col-md-12 agile-last-left agile-last-right">
					<div class="agile-last-grid">
						<div class="area-grids-heading">
							<h3>Thống kê theo xe máy</h3>
						</div>
					<div id="graph7"></div>
					    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  						<script type="text/javascript">
  					    google.charts.load("current", {packages:['corechart']});
                        google.charts.setOnLoadCallback(drawChart);
    					function drawChart() {
     					 	var data = google.visualization.arrayToDataTable([
       					    ['Element', 'Density', { role: 'style'} ],
     
      					<?php 
       					$dt=$selled->getDoanhThuTheoXM();
       						while ($result=$dt->fetch_assoc()) {
       					
       					    echo"['".$result['productName']."',".$result['doanhthu'].",'#FF9900'],";
       						}
       						

       					 ?>


     					 ]);

     					var view = new google.visualization.DataView(data);
    					  view.setColumns([0, 1,
                       			{ calc: "stringify",
                        		 sourceColumn: 1,
                        		 type: "string",
                        		 role: "annotation" },
                     			  2]);

      		var options = {
        
       					width: 1140,
        				height: 400,
        				bar: {groupWidth: "35%"},
        				legend: { position: "none" },
     					 };
     			 var chart = new google.visualization.ColumnChart(document.getElementById("graph7"));
     				chart.draw(view, options);
 				 }
  				</script>

				</div>
				
			</div>

<div class="col-md-12 agile-last-left agile-last-right">
					<div class="agile-last-grid">
						<div class="area-grids-heading">
							<h3>Thống kê theo phụ kiện</h3>
						</div>
					<div id="graph8"></div>
					    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  						<script type="text/javascript">
  					    google.charts.load("current", {packages:['corechart']});
                        google.charts.setOnLoadCallback(drawChart);
    					function drawChart() {
     					 	var data = google.visualization.arrayToDataTable([
       					    ['Element', 'Density', { role: 'style'} ],
     
      					<?php 
       					$dt=$selled->getDoanhThuTheoPK();
       						while ($result=$dt->fetch_assoc()) {
       					
       					    echo"['".$result['productName']."',".$result['doanhthu'].",'#33CC33'],";
       						}
       						

       					 ?>


     					 ]);

     					var view = new google.visualization.DataView(data);
    					  view.setColumns([0, 1,
                       			{ calc: "stringify",
                        		 sourceColumn: 1,
                        		 type: "string",
                        		 role: "annotation" },
                     			  2]);

      		var options = {
        
       					width: 1140,
        				height: 400,
        				bar: {groupWidth: "35%"},
        				legend: { position: "none" },
     					 };
     			 var chart = new google.visualization.ColumnChart(document.getElementById("graph8"));
     				chart.draw(view, options);
 				 }
  				</script>

				</div>
				
			</div>

			

			</div>

</section>

</section>
<section id="main-content">
	<section class="wrapper">
			


</section>
</section>

<?php
        include "include/footer.php";?>
