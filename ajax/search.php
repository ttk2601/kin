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

  if (isset($_POST['query'])) {
    $inpText = $_POST['query'];
    $sql = "SELECT tbl_product.productName FROM tbl_product WHERE productName LIKE '%inpText%' ";

  if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
    	
    		 echo '<a href="" class="list-group-item list-group-item-action border-1">' . $row['productName'] . '</a>';
	  
    
 
}

} else {
    echo '<p class="list-group-item border-1">No Record</p>';
}



$conn->close();
?>