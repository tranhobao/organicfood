<?php  

	require_once 'database.php';

?>



<?php
	class user
	{
		private $db;

		public function __construct()
		{
			$this->db = new Database();
		}

		

		public function changeStatusUser($name)
		{

			$queryActive = "UPDATE user SET tinhtrang = 0 WHERE name = '$name' ";
			$queryInactive = "UPDATE user SET tinhtrang = 1 WHERE name = '$name' ";
			$querySelect = "SELECT * FROM user WHERE name = '$name' ";

			$resultSelect = $this->db->select($querySelect);
			$value = $resultSelect->fetch_assoc();
			// Nếu người dùng Active thì Update status inactive và ngược lại
			if ($value['tinhtrang'] == 0)
			{
				
				$resultUpdate = $this->db->update($queryInactive);

				if ($resultUpdate)
				{
					$alert = "<div class= 'alert alert-success'>Khóa người dùng thành công!</div>";
					return $alert;
				}
				else
				{
					$alert = "<div class= 'alert alert-danger'>Khóa người dùng không thành công!</div>";
					return $alert;
				}
			}
			else if ($value['tinhtrang'] == 1)
			{
				
				$resultUpdate = $this->db->update($queryActive);

				if ($resultUpdate)
				{
					$alert = "<div class= 'alert alert-success'>Mở khóa người dùng thành công!</div>";
					return $alert;
				}
				else
				{
					$alert = "<div class= 'alert alert-danger'>Mở khóa người dùng không thành công!</div>";
					return $alert;
				}
			}
		}

	}

?>