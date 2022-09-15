<?php
		
$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>

<?php


class category 
{
	private $db;
	private $fm;


	function __construct()
	{
		$this->db =new Database();
		$this->fm =new Format();
	}

		public function add_category($cateName,$cateDesc,$cateSeo){

			$cateName= $this->fm->validation($cateName);
			$cateDesc= $this->fm->validation($cateDesc);
			$cateSeo= $this->fm->validation($cateSeo);

			$cateName= mysqli_real_escape_string($this->db->link,$cateName);
			$cateDesc= mysqli_real_escape_string($this->db->link,$cateDesc);
			$cateSeo= mysqli_real_escape_string($this->db->link,$cateSeo);

				if(empty($cateName )){
					$alert="Tên danh mục không được bỏ trống";
					return $alert;
				}else
				{
					$query="INSERT INTO tbl_category(cateName,cateDesc,cateSeo) VALUES('$cateName','$cateDesc','$cateSeo') ";
					$result=$this->db->insert($query);}

				if($result){
					$alert="Thêm danh mục thành công";
					return $alert;
				}
				else{
					$alert="Thêm danh mục không thành công";
					return $alert;
				}
			
		}
		public function show_category(){
			$query="SELECT * FROM tbl_category order by cateId desc";
			$result=$this->db->select($query);
			return $result;

		}
		public function getcateById($id){
			$query="SELECT * FROM tbl_category WHERE cateId='$id'";
			$result=$this->db->select($query);
			return $result;
		}
		public function update_category($id,$cateName,$cateDesc,$cateSeo){
			$cateName= $this->fm->validation($cateName);
			$cateDesc= $this->fm->validation($cateDesc);
			$cateSeo= $this->fm->validation($cateSeo);

			$cateName= mysqli_real_escape_string($this->db->link,$cateName);
			$cateDesc= mysqli_real_escape_string($this->db->link,$cateDesc);
			$cateSeo= mysqli_real_escape_string($this->db->link,$cateSeo);

				if(empty($cateName )){
					$alert="Tên danh mục không được bỏ trống";
					return $alert;
				}else
				{
					$query="UPDATE tbl_category SET cateName='$cateName', cateDesc='$cateDesc',cateSeo='$cateSeo' WHERE cateId='$id'";
					$result=$this->db->update($query);}

				if($result){
					$alert="Sửa danh mục thành công";
					return $alert;
				}
				else{
					$alert="Sửa danh mục không thành công";
					return $alert;
			}
		}
		public function delete_category($id){
			$query="DELETE FROM tbl_category WHERE cateId='$id'";
			$result=$this->db->delete($query);
			return $result;
			if($result){
					$alert="Xóa danh mục thành công";
					return $alert;
				}
		}

		


	}
?>