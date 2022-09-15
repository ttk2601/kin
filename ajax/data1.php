<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "moto_project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$query="SELECT A.productId,(A.productAmount-A.daban) AS conlai,A.productName FROM (SELECT tbl_product.productId,SUM(amount) AS daban,productAmount,productName FROM tbl_selled,tbl_product WHERE tbl_product.productId=tbl_selled.productId GROUP BY(tbl_selled.productId) ) AS A WHERE A.productAmount-A.daban<10";
$result = $conn->query($query);


if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
    	if($row['conlai'] ==0){
    		echo '<li><div class="alert alert-info clearfix">
                        <span class="alert-icon"><i class="fa fa-bolt" ></i></span>
                        <div class="noti-info" style="color:red" > Sản phẩm : '. $row["productName"]. ' hết hàng'.' </div></div>';
	  
    }
    else{
    		echo '<li><div class="alert alert-info clearfix">
                        <span class="alert-icon"><i class="fa fa-bolt" ></i></span>
                        <div class="noti-info" style="color:blue" > Sản phẩm : '. $row["productName"].' sắp hết hàng còn lại '. $row['conlai']. ' </div></div>';
 
    	
    }
}
} else {
    echo "0 results";
}

$conn->close();
?>