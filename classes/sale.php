<?php
		
$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>

<?php


class sale 
{
	private $db;
	private $fm;


	function __construct()
	{
		$this->db =new Database();
		
	}
	public function add_sale($data){
		$saleName= mysqli_real_escape_string($this->db->link,$data['saleName']);
		$cateId= mysqli_real_escape_string($this->db->link,$data['cateId']);
		$sale= mysqli_real_escape_string($this->db->link,$data['sale']);
		$dateStart=$data['dateStart'];
		$dateEnd= $data['dateEnd'];


				if(empty($saleName )  || empty($cateId ) ||empty($sale ) ||empty($dateStart) ||empty($dateEnd) ){
					$alert="Không được bỏ trống";
					return $alert;
				}else
				{
					
					$query="INSERT INTO tbl_sale(saleName,cateId,sale,dateStart,dateEnd) VALUES('$saleName','$cateId','$sale','$dateStart','$dateEnd') ";
					$result=$this->db->insert($query);}

				if($result){
					$alert="Thêm  thành công";
					return $alert;
				}
				else{
					$alert="Thêm  không thành công";
					return $alert;
				}



	}
	public function show_sale(){
			$query="SELECT * FROM tbl_sale order by cateId desc";
			$result=$this->db->select($query);
			return $result;

		}
	public function getSaleById($id){
			$query="SELECT * FROM tbl_sale WHERE saleId='$id'";
			$result=$this->db->select($query);
			return $result;
		}
		public function update_sale($data,$id){
		$saleName= mysqli_real_escape_string($this->db->link,$data['saleName']);
		$cateId= mysqli_real_escape_string($this->db->link,$data['cateId']);
		$sale= mysqli_real_escape_string($this->db->link,$data['sale']);
		$dateStart=$data['dateStart'];
		$dateEnd= $data['dateEnd'];


				if(empty($saleName )  || empty($cateId ) ||empty($sale ) ||empty($dateStart) ||empty($dateEnd) ){
					$alert="Không được bỏ trống";
					return $alert;
				}else
				{
					$query="UPDATE tbl_sale SET saleName='$saleName', cateId='$cateId',sale='$sale',dateStart='$dateStart',dateEnd='$dateEnd' WHERE saleId='$id'";
					$result=$this->db->update($query);}

				if($result){
					$alert="Sửa thành công";
					return $alert;
				}
				else{
					$alert="Sửa  không thành công";
					return $alert;
			}
		}
		public function delete_sale($id){
			$query="DELETE FROM tbl_sale WHERE saleId='$id'";
			$result=$this->db->delete($query);
			return $result;
			if($result){
					$alert="Xóa thành công";
					return $alert;
				}
		}
		public function getSaleByDate($date){
			$query="SELECT MAX(sale) FROM tbl_sale WHERE 
				dateStart<$date
				AND dateEnd>$date

			";
			$result=$this->db->select($query);
			return $result;
		}
		


	}
?>