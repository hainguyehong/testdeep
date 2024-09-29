<?php
	include 'connectdb.php';
	session_start();
	// hàm kiểm tra đã đăng nhập chưa 
	function isLogin() {
		// trả về true nếu session tồn tại và khác rỗng 
		if (isset($_SESSION['name']) && !empty($_SESSION['name'])) {
			return true;
		}
		else {
			header("Location: login.php");
		}
	}
	function checkLogin($conn, $tk, $password) {
		$sql = "SELECT * FROM `user`";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result)) {
			$name = $row['ten_sv'];
			$role = $row['role'];
            // $msv = $row['msv'];			
            $mk = $row['mat_khau'];
			if ($tk == $name && $password == $mk) {
				$_SESSION['name'] = $name;
				$_SESSION['role'] = $role;
				$_SESSION['name'] = $name;				
				// $_SESSION['overlayOpen'] == false;
				return true;
			}
        }
		return false;
	}
?>
  