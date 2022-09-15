<?php
    include '../lib/session.php';
    Session::checkSession();
?>
 <?php
  include '../classes/category.php';
 ?>
 <?php
  include '../classes/selled.php';
 ?>
  <?php
  include '../classes/product.php';
 ?>
   <?php
  include '../classes/sale.php';
 ?>
  <?php
    $pro = new product();
    $cate=new category();
    $selled=new selled();
    $sale = new sale();
?>
<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE html>
<head>
<title>Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="css/font.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<link rel="stylesheet" href="css/morris.css" type="text/css"/>
<!-- calendar -->
<link rel="stylesheet" href="css/monthly.css">
<!-- //calendar -->
<!-- //font-awesome icons -->
<script src="js/jquery2.0.3.min.js"></script>
<script src="js/raphael-min.js"></script>
<script src="js/morris.js"></script>
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="http://oss.maxcdn.com/jquery.form/3.50/jquery.form.min.js"></script>




<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>


</head>
<body>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a href="index.php" class="logo">
        Admin
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->
<div class="nav notify-row" id="top_menu">
    <!--  notification start -->
   
    <ul class="nav top-menu">
        <!-- settings start -->
       
      
        <!-- notification dropdown start-->
        <li id="header_notification_bar" class="dropdown">
          
           
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                      <i class="fa fa-bell-o" ></i>
                <span class="badge bg-warning" id="noti_number"></span>
            </a>
            <ul class="dropdown-menu extended notification">
              <li>
                <p>Thông báo</p>
              </li>

              <li  id="noti_number1">
               </li>
                
      
            </ul>
        
        </li>
        <!-- notification dropdown end -->
      
    </ul>

    <!--  notification end -->
</div>
<script type="text/javascript">
 function loadDoc() {
  

  setInterval(function(){

   var xhttp = new XMLHttpRequest();
   xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("noti_number").innerHTML = this.responseText;
    }
   };
   xhttp.open("GET", "../ajax/data.php", true);
   xhttp.send();

  },1000);


 }
 loadDoc();
</script>

<script type="text/javascript">
 function loadDoc() {
  

  setInterval(function(){

   var xhttp = new XMLHttpRequest();
   xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("noti_number1").innerHTML = this.responseText;
    }
   };
   xhttp.open("GET", "../ajax/data1.php", true);
   xhttp.send();

  },1000);


 }
 loadDoc();
</script>

<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <li>
            <input type="text" class="form-control search" placeholder=" Search">
        </li>
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="images/2.png">
                <span class="username"><?php echo Session::get('adminName') ?></span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="#"><i class=" fa fa-suitcase"></i>Thông tin cá nhân</a></li>
                <li><a href="#"><i class="fa fa-cog"></i> Cài đặt</a></li>
                    <?php
                            if(isset($_GET['action']) && $_GET['action']=='logout'){
                                Session::destroy();
                            }
                            ?>
                <li><a href="?action=logout"><i class="fa fa-key"></i> Đăng xuất</a></li>
            </ul>
        </li>
  
       
    </ul>

</div>
</header>


