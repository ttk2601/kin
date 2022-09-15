<?php

	include '../lib/session.php';
	Session::checkLogin();
	include '../lib/database.php';
	include '../helpers/format.php';
?>

<?php


class adminlogin 
{
	private $db;
	private $fm;


	function __construct()
	{
		$this->db =new Database();
		$this->fm =new Format();
	}

		public function login_admin($adminUser,$adminPass){

			$adminUser= $this->fm->validation($adminUser);
			$adminPass= $this->fm->validation($adminPass);

			$adminUser= mysqli_real_escape_string($this->db->link,$adminUser);
			$adminPass= mysqli_real_escape_string($this->db->link,$adminPass);


				$query = "SELECT * FROM tbl_admin WHERE adminUser='$adminUser'  AND adminPass ='$adminPass' LIMIT 1";
				$result=$this->db->select($query);

				if(empty($adminUser || empty($adminPass))){
					$alert="Tài khoản mật khẩu không được bỏ trống";
					return $alert;
				}else
				{
					$query="SELECT * FROM tbl_admin WHERE adminUser='$adminUser' AND adminPass='$adminPass' LIMIT 1";
					$result=$this->db->select($query);

					if($result != false){
						$value =$result->fetch_assoc();
						
						Session::set('adminlogin',true);
						Session::set('adminId',$value['adminId']);
						Session::set('adminUser',$value['adminUser']);
						Session::set('adminName',$value['adminName']);
						header('Location:index.php');
					}
					else{
						$alert="Tài khoản mật khẩu không đúng";
					return $alert;
					}
				}
		}
		public function forgot_password($data){
			$adminUser= $data['adminUser'];
			$adminEmail= $data['adminEmail'];
		
			$adminPass= $data['adminPass'];
			$adminPass1= $data['adminPass1'];
				$query = "SELECT * FROM tbl_admin WHERE adminUser ='$adminUser'  AND adminEmail ='$adminEmail'";
				$result=$this->db->select($query);

				
				if($result){
					if($adminPass == $adminPass1){
						$pass=md5($adminPass);
						$query="UPDATE tbl_admin SET  adminPass='$pass' WHERE  adminUser ='$adminUser' ";
						$result=$this->db->update($query);

						 header("Location:login.php");
   					 $alert="Thay đổi mật khẩu thành công ...";
					return $alert;
					}
					else{
						$alert="Mật khẩu không khớp ...";
					return $alert;
					}
				}
				

				
				else{
						$alert="Tài khoản hoặc email không đúng ...";
					return $alert;
					}
				

			
			
		}

			
		
	}
?>