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

echo $result->num_rows;



$conn->close();
?>