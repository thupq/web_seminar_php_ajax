<?php
	session_start();
	require_once('../database/help.php');
	//tiến hành kiểm tra là người dùng đã đăng nhập hay chưa
	//nếu chưa, chuyển hướng người dùng ra lại trang đăng nhập
	if (!isset($_SESSION['username'])) {
		header('Location: login.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Trang quản trị viên</title>
	<link rel="stylesheet" type="text/css" href="../css/admin.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

	<header>
		<div class="container">
			<div class="d-flex">
				<p>Admin <strong style="color:red;"><?php echo $_SESSION['username'] ?></strong> đã đăng nhập thành công vào trang quản trị !</p>
				<div class="p-2 ml-auto">
					<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#smyModal">Tài khoản</button>
					<a href="logout.php"><button type="button" class="btn btn-danger">Đăng xuất</button></a>
				</div>
			</div>
		</div>
	</header>
	
	<!-- BS4 Modal sua -->
			
	<div class="modal" id="smyModal">
		<div class="modal-dialog">
		
			<div class="modal-content">

				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title">Sửa thông tin</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<!-- Modal body -->
				<div class="modal-body">
					
					<div class="form-group">
						<label >Họ và tên:</label>
						<input type="text" class="form-control" id="sten" value="<?php echo $_SESSION['ten'] ?>">
					</div>
					<div class="form-group">
						<label >Ngày sinh</label>
						<input type="date" class="form-control" id="sngaysinh" value="<?php echo $_SESSION['ngaysinh'] ?>">
					</div>
					<div class="form-group">
						<label >Email</label>
						<input type="email" class="form-control" id="semail" value="<?php echo $_SESSION['email'] ?>">
					</div>
					<div class="form-group">
						<label >Tên tài khoản</label>
						<input type="text" class="form-control" id="staikhoan" value="<?php echo $_SESSION['username'] ?>" >
					</div>
					<div class="form-group">
						<label >Mật khẩu</label>
						<input type="text" class="form-control" id="smatkhau" value="<?php echo $_SESSION['password'] ?>">
					</div>
					<div class="form-group">
						<label >Mô tả</label>
						<input type="text" class="form-control" id="smota" value="<?php echo $_SESSION['mota'] ?>">
					</div>
				</div>

				<!-- Modal footer -->
				<div class="modal-footer">
					<button type="button" class="btn btn-success" data-dismiss="modal" onclick="suaAd()">Lưu</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
					<input type="text" id="sid" value="<?php echo $_SESSION['id'] ?>" style="display: none;">
				</div>

			</div>
		</div>
	</div>

	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
		<div class="container">
		  	<!-- Brand -->
		  	<a class="navbar-brand" href="index.php"><img src="../images/your-logo.png" alt="logo" style="max-width: 160px;"></a>
		  	<!-- Links -->
		  	<ul class="navbar-nav">
			    <li class="nav-item">
				<a href="index.php"><button type="button" class="btn btn-danger"> Danh sách quản trị</button></a>
			    </li>
		 		<li class="nav-item">
				 	<a href="khachmoi/"><button type="button" class="btn btn-danger" style="margin: 0 5px;">Khách mời</button></a>
		  		</li>
		  		<li class="nav-item">
				  	<a href="nguoithamgia/"><button type="button" class="btn btn-danger"style="margin: 0 5px;">Người tham gia</button></a>
		  		</li>
		  		<li class="nav-item">
				  	<a href="mathang/"><button type="button" class="btn btn-danger"style="margin: 0 5px;">Mặt hàng</button></a>
		  		</li>
		  		<li class="nav-item">
				  	<a href="taitro/"><button type="button" class="btn btn-danger"style="margin: 0 5px;">Nhà tài trợ</button></a>
		  		</li>
		  		<li class="nav-item">
				  	<a href="banner/"><button type="button" class="btn btn-danger">Banner</button></a>
		  		</li>
		  	</ul>
		</div>
	</nav> 
	<div class="container">
		<h2 style="text-align: center; margin:10px;">Danh sách quản trị viên</h2>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>STT</th>
					<th>Tên </th>
					<th>Ngày sinh</th>
					<th>Email</th>
					<th>Tên tài khoản</th>
					<th>Mô tả</th>
				</tr>
			</thead>
			<tbody >
			<?php
				// lấy ds khach từ db
				$sql = 'SELECT  `ten`, `ngaysinh`, `email`, `taikhoan`,`mota` FROM `nguoidung` WHERE vaitro="admin"';
				$listad = executeResult($sql);
				$index = 1;
				foreach( $listad as $item){
				echo '<tr>
						<td>'.($index++).'</td>
						<td>'.$item['ten'].'</td>
						<td>'.$item['ngaysinh'].'</td>
						<td>'.$item['email'].'</td>
						<td>'.$item['taikhoan'].'</td>
						<td>'.$item['mota'].'</td>
					</tr>';
				}
			?>
			</tbody>
		</table>
	</div>
	

	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script>
		function suaAd(){
			var ids = $('#sid').val();
			var tens = $('#sten').val();
			var ngaysinhs = $('#sngaysinh').val();
			var emails = $('#semail').val();
			var taikhoans = $('#staikhoan').val();
			var matkhaus = $('#smatkhau').val();
			var motas = $('#smota').val();
			
			$.post('ajaxtaikhoan.php',{
				ids: ids,
				tens:tens,
				ngaysinhs:ngaysinhs,
				emails:emails,
				taikhoans:taikhoans,
				matkhaus:matkhaus,
				motas:motas,
			},function(data, status){
				$('#smyModal').modal("hide");
				alert('Sửa thành công!');
				location.reload();
			});
		}
	</script>
</body>
</html>