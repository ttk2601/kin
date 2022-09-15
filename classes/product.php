<?php
	
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>

<?php


class product 
{
	private $db;
	private $fm;


	function __construct()
	{
		$this->db =new Database();
		$this->fm =new Format();
	}

		public function add_product($data,$files){

			

			$cateId= mysqli_real_escape_string($this->db->link,$data['cateId']);
			
			$productName= mysqli_real_escape_string($this->db->link,$data['productName']);
			$productDesc= mysqli_real_escape_string($this->db->link,$data['productDesc']);
			$productPrice= mysqli_real_escape_string($this->db->link,$data['productPrice']);
			$productAmount= mysqli_real_escape_string($this->db->link,$data['productAmount']);
			$productStatus= mysqli_real_escape_string($this->db->link,$data['productStatus']);

			//Kiem tra hình ảnh và lấy hình ảnh cho vào folder upload
			
			$permited  = array('jpg', 'jpeg', 'png', 'gif');
			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];

			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			$uploaded_image = "uploads/".$unique_image;



				if(empty($productName )  || empty($productDesc ) ||empty($productPrice ) ||empty($file_name)){
					$alert="Không được bỏ trống";
					return $alert;
				}else
				{
					move_uploaded_file($file_temp,$uploaded_image);
					$query="INSERT INTO tbl_product(cateId,productName,productDesc,productPrice,productStatus,productImage,productAmount) VALUES('$cateId','$productName','$productDesc','$productPrice','$productStatus','$unique_image','$productAmount') ";
					$result=$this->db->insert($query);}

				if($result){
					$alert="Thêm sản phẩm thành công";
					return $alert;
				}
				else{
					$alert="Thêm sản phẩm không thành công";
					return $alert;
				}
			
		}
		public function show_product(){
			$query="SELECT * FROM tbl_product order by productId desc";
			$result=$this->db->select($query);
			return $result;

		}
		public function getProductById($id){
			$query="SELECT * FROM tbl_product WHERE productId='$id'";
			$result=$this->db->select($query);
			return $result;
		}
		public function update_product($data,$files,$id){
			$cateId= mysqli_real_escape_string($this->db->link,$data['cateId']);
			
			$productName= mysqli_real_escape_string($this->db->link,$data['productName']);
			$productDesc= mysqli_real_escape_string($this->db->link,$data['productDesc']);
			$productPrice= mysqli_real_escape_string($this->db->link,$data['productPrice']);
			$productAmount= mysqli_real_escape_string($this->db->link,$data['productAmount']);
			$productStatus= mysqli_real_escape_string($this->db->link,$data['productStatus']);

			//Kiem tra hình ảnh và lấy hình ảnh cho vào folder upload
			
			$permited  = array('jpg', 'jpeg', 'png', 'gif');
			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];

			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			$uploaded_image = "uploads/".$unique_image;



				if(empty($productName )  || empty($productDesc ) ||empty($productPrice ) ||empty($file_name)){
					$alert="Không được bỏ trống";
					return $alert;
				}else
				{
					move_uploaded_file($file_temp,$uploaded_image);
					$query="UPDATE tbl_product SET cateId='$cateId',productName='$productName',productDesc='$productDesc',productPrice='$productPrice',productAmount='$productAmount',productStatus='$productStatus',productImage='$unique_image' WHERE productId='$id'";
					$result=$this->db->update($query);}

				if($result){
					$alert="Sửa sản phẩm thành công";
					return $alert;
				}
				else{
					$alert="Sửa sản phẩm không thành công";
					return $alert;
			}
		}
		public function delete_product($id){
			$query="DELETE FROM tbl_product WHERE productId='$id'";
			$result=$this->db->delete($query);
			return $result;
			if($result){
					$alert="Xóa sản phẩm thành công";
					return $alert;
				}
		}
		// public function getXeMay(){
		// 	$query="SELECT A.* FROM tbl_product AS A,tbl_category AS B 
		// 	WHERE A.cateId=B.cateId 
		// 		AND B.cateName='Xe máy'
		// 		AND A.productStatus=1
				
		// 	LIMIT 12";
		// 	$result=$this->db->select($query);
		// 	return $result;
		// }
		public function active_product($id){
			$query="UPDATE tbl_product SET productStatus=1 WHERE productId='$id'";
			$result=$this->db->update($query);
		}
		public function unactive_product($id){
			$query="UPDATE tbl_product SET productStatus=0 WHERE productId='$id'";
			$result=$this->db->update($query);
		}
		public function getProductBanChay(){
			$today=date("Y-m-d");
			$query="SELECT A.*,SUM(B.amount) AS daban FROM tbl_product AS A,tbl_selled AS B WHERE A.productId=B.productId AND A.productStatus=1 GROUP BY (B.productId) DESC LIMIT 12";
			$result=$this->db->select($query);
			return $result;
		}
		public function getProductMoiVe(){
			$query="SELECT * FROM tbl_product WHERE productStatus=1 
					GROUP BY(productId) DESC LIMIT 9";
			$result=$this->db->select($query);
			return $result;
		}
		public function getSL($id){
			$query="SELECT SUM(amount)
			FROM tbl_selled
			WHERE productId='$id'";
			$result=$this->db->select($query);
			return $result;

		}
		public function getSPBanChay(){
			$query="SELECT A.*,SUM(B.amount) AS daban
			FROM tbl_product AS A,tbl_selled AS B
			WHERE 
			A.productId=B.productId
			GROUP BY (B.productId)
			ORDER BY(daban) DESC
			LIMIT 6";
			$result=$this->db->select($query);
			return $result;

		}
		public function getProductByCateId($id){
			$query="SELECT A.*,B.cateName FROM tbl_product AS A,tbl_category AS B
			WHERE A.cateId=$id
				AND B.cateId=$id
				AND A.productStatus=1
				
			LIMIT 9";
			$result=$this->db->select($query);
			return $result;
		}
		public function getCateName($id){
			$query="SELECT A.* 
			FROM tbl_category AS A
			WHERE A.cateId=$id";
			$result=$this->db->select($query);
			return $result;

		}
		
	
	}
?>