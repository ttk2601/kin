<?php
		
$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>

<?php


class selled 
{
	private $db;
	private $fm;


	function __construct()
	{
		$this->db =new Database();
		$this->fm =new Format();
	}


		public function getSumById($id){
			$query="SELECT SUM(amount)
			FROM tbl_selled
			WHERE productId='$id'";
			$result=$this->db->select($query);
			return $result;
		}
		public function getDoanhThu(){

			$query="SELECT A.productId,A.productName,A.productPrice*B.daban AS doanhthu 
					FROM tbl_product AS A, (SELECT tbl_product.productId,tbl_product.productName,SUM(tbl_selled.amount) AS daban
			 		FROM tbl_product,tbl_selled WHERE tbl_selled.productId=tbl_product.productId
			 		GROUP BY(tbl_selled.productId)) AS B 
					WHERE A.productId=B.productId";
					$result=$this->db->select($query);
					return $result;
		}
		public function getSoLuong(){

			$query="SELECT SUM(amount) AS SL FROM tbl_selled";
					$result=$this->db->select($query);
					return $result;
		}
		public function getSoLuongKho(){

			$query="SELECT SUM(productAmount) AS SL FROM tbl_product";
					$result=$this->db->select($query);
					return $result;
		}
		public function getDoanhThuTheoThang($thang){
			$query="SELECT SUM(D.dt) AS doanhthu FROM (SELECT C.productPrice*C.SL AS dt FROM (SELECT A.productId,A.productPrice,SUM(B.amount) AS SL,B.mounth FROM tbl_product AS A,tbl_selled AS B WHERE A.productId=B.productId AND B.mounth=$thang GROUP BY B.productId) AS C) AS D";
					$result=$this->db->select($query);
					return $result;
		}
		public function getDoanhThuTheoXM(){
			$query="SELECT C.productName,(C.productPrice*C.SL) AS doanhthu FROM (SELECT A.productId,A.productName,A.productPrice,SUM(B.amount) AS SL FROM tbl_product AS A,tbl_selled AS B WHERE A.productId=B.productId
                                            AND A.cateId=21                 
                                                             GROUP BY (B.productId)) AS C";
					$result=$this->db->select($query);
					return $result;
		}
		public function getDoanhThuTheoPK(){
			$query="SELECT C.productName,(C.productPrice*C.SL) AS doanhthu FROM (SELECT A.productId,A.productName,A.productPrice,SUM(B.amount) AS SL FROM tbl_product AS A,tbl_selled AS B WHERE A.productId=B.productId
                                            AND A.cateId=22                 
                                                             GROUP BY (B.productId)) AS C";
					$result=$this->db->select($query);
					return $result;
		}

	}
?>