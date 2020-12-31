<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Đăng nhập </title>
	<link rel="stylesheet" type="text/css" href="../css/login.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600&display=swap" rel="stylesheet">
	
</head>
<body>

	<?php
		require_once('../database/config.php');
		//kiem tra dang nhap
		if(isset($_POST['btndangnhap'])){
			// lấy thông tin người dùng
			$username = $_POST["username"];
			$password = $_POST["password"];
			//làm sạch thông tin, xóa bỏ các tag html, ký tự đặc biệt 
			//mà người dùng cố tình thêm vào để tấn công theo phương thức sql injection
			$username = strip_tags($username);
			$username = addslashes($username);
			$password = strip_tags($password);
			$password = addslashes($password);
			if ($username == "" || $password =="") {
				echo "username hoặc password bạn không được để trống!";
			}else{
				$sql = "select * from nguoidung where taikhoan = '$username' and matkhau = '$password' and vaitro = 'admin' ";
				$con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
				$query = mysqli_query($con,$sql);
				$row = mysqli_fetch_assoc($query);
				$idtk = $row['id'];
				$tentk = $row['ten'];
				$nstk = $row['ngaysinh'];
				$emailtk = $row['email'];
				$motatk = $row['mota'];
				$num_rows = mysqli_num_rows($query);
				if ($num_rows==0) {
					echo "Tên đăng nhập hoặc mật khẩu không đúng !";
				}else{
					//tiến hành lưu tên đăng nhập vào session để tiện xử lý sau này
					$_SESSION['username'] = $username;
					$_SESSION['password'] = $password;
					$_SESSION['id'] = $idtk;
					$_SESSION['ten'] = $tentk;
					$_SESSION['ngaysinh'] = $nstk;
					$_SESSION['email'] = $emailtk;
					$_SESSION['mota'] = $motatk;
					// Thực thi hành động sau khi lưu thông tin vào session
					// ở đây mình tiến hành chuyển hướng trang web tới một trang gọi là index.php
					header('Location:index.php');
				}
			}
		} 
	
	?>
	<dangnhap>
		<div class="container">
			<div class="dangnhap">
				<h2>Đăng nhập</h2>
				<form action="login.php" method="POST">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">
								<i class="fa fa-user-circle" aria-hidden="true"></i>
							</span>
						</div>
						<input type="text" class="form-control" placeholder="Tên đăng nhập" name="username">
					</div>
					<br><br>
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">
								<i class="fa fa-key" aria-hidden="true"></i>
							</span>
						</div>
						<input type="password" class="form-control" placeholder="Nhập mật khẩu" name="password">
					</div>
					<br><br>
					<input type="submit" name="btndangnhap" class="btn btn-danger" value="Đăng nhập">
				</form>

			</div>
		</div>
	</dangnhap>
</body>
</html>