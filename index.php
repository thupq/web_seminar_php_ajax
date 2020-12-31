<?php
	require_once('database/help.php');

	if(isset($_POST['submit'])){
        $ten = $_POST['ten'];
        $gioitinh = $_POST['gioitinh'];
        $email = $_POST['email'];
		$ngaysinh = $_POST['ngaysinh'];
		$mota = $_POST['mota'];
        $sql1 = "INSERT INTO nguoidung (ten, gioitinh, email, ngaysinh, mota, xuly) 
        VALUE (' $ten', '$gioitinh','$email','$ngaysinh','$mota','no')";
        $query1 = execute($sql1);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Hội thảo xúc tiến thương mại </title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
</head>
<body>
<div style="position: relative;">
	<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
	<menu>
		<!-- <div class="container-fluid"> -->
			<nav class="navbar navbar-expand-md navbar-dark ">
				<a class="navbar-brand" href="index.php"><img src="images/your-logo.png" alt="logo"></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="collapsibleNavbar">
					<ul class="navbar-nav">
				  		<li class="nav-item">
				    		<a class="nav-link active" href="#trangchu">Trang chủ</a>
				  		</li>
				  		<li class="nav-item">
				    		<a class="nav-link" href="#about">Về hội thảo</a>
				  		</li>
				  		<li class="nav-item">
				    		<a class="nav-link" href="#lichtrinh">Lịch trình sự kiện</a>
				    	</li>
				    	<li class="nav-item">
				    		<a class="nav-link" href="#sanpham">Sản phẩm giới thiệu</a>
				    	</li>
				    	<li class="nav-item">
				    		<a class="nav-link" href="#khach">Khách mời - Nhà đầu tư</a>
				  		</li>
				  		<li class="nav-item">
				    		<a class="nav-link" href="#taitro">Đơn vị tài trợ</a>
				  		</li>
				  		<li class="nav-item">
				    		<a class="nav-link" href="#lienhe">Liên hệ - Địa điểm</a>
				  		</li>
				  		<li class="nav-item">
				    		<a class="nav-link" href="#dangky">Đăng ký</a>
				  		</li>    
					</ul>
				</div>  
			</nav>
		<!-- </div> -->
	</menu>
	<banner id="trangchu">
		<div class="den"></div>
		<div id="demo" class="carousel slide" data-ride="carousel">
			<ul class="carousel-indicators">
				<li data-target="#demo" data-slide-to="0" class="active"></li>
				<li data-target="#demo" data-slide-to="1"></li>
				<li data-target="#demo" data-slide-to="2"></li>
			</ul>
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img src="images/banner/banner2.jpg" >
					<div class="c-caption">
						<h1>Hội thảo xúc tiến tiêu thụ nông sản Tây Bắc</h1>
						<p>Ngày 21 tháng 11 năm 2020, tại BigC Thăng Long</p>
						<a href="#dangky"><button type="button" class="btn btn-outline-warning">Đăng ký tham gia</button></a>
					</div>   
				</div>
				<div class="carousel-item">
					<img src="images/banner/banner1.jpg" >
					<div class="c-caption">
						<h1>Tham quan, trải nghiệm sản phẩm</h1>
						<p>Ngày 21 tháng 11 năm 2020, tại BigC Thăng Long</p>
						<a href="#dangky"><button type="button" class="btn btn-outline-warning">Đăng ký tham gia</button></a>
					</div>  
				</div>
				<div class="carousel-item">
					<img src="images/banner/banner3.jpg">
					<div class="c-caption">
						<h1>Cơ hội đầu tư nông sản</h1>
						<p>Ngày 22 tháng 11 năm 2020, tại BigC Thăng Long</p>
						<a href="#dangky"><button type="button" class="btn btn-outline-warning">Đăng ký tham gia</button></a>
					</div>  
				</div>
			</div>
			<a class="carousel-control-prev" href="#demo" data-slide="prev">
				<span class="carousel-control-prev-icon"></span>
			</a>
			<a class="carousel-control-next" href="#demo" data-slide="next">
				<span class="carousel-control-next-icon"></span>
			</a>

		</div>
	</banner>
	<about id="about">
		<div class="container">
			<h1>Thế mạnh nông sản tây bắc</h1>
			<div class="row">
				<div class="col-sm-5">
					<img src="images/bando.png" alt="ban-do-tay-bac">
				</div>
				<div class="col-sm-7">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt quisquam reprehenderit 
						sed consectetur beatae animi. Amet, laboriosam voluptas ipsum vitae excepturi nesciunt velit 
						eaque maiores repellendus enim cupiditate nihil numquam?
					</p>
					<br>
					<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ex, obcaecati qui tempora
						 molestiae provident itaque repellendus aliquid, cumque quis officiis iure consectetur 
						 quidem facilis expedita perferendis. Aliquam laudantium quia pariatur?</p>
				</div>
			</div>
		</div>
	</about>
	<lich id="lichtrinh">
		<div class="container">
			<h1>Lịch trình hội thảo</h1>
			<!-- Nav pills -->
			<ul class="nav nav-pills" style="justify-content: center;" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" data-toggle="pill" href="#day1">Ngày 1</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="pill" href="#day2">Ngày 2</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="pill" href="#day3">Ngày 3</a>
				</li>
			</ul>

			<!-- Tab panes -->
			<div class="tab-content">
				<div id="day1" class="container tab-pane active"><br>
					<h3>Ngày 1: 20 tháng 11 năm 2020</h3>
					<p>Giới thiệu hội thảo, gặp mặt khách mời</p>
				</div>
				<div id="day2" class="container tab-pane fade"><br>
					<h3>Ngày 2: 21 tháng 11 năm 2020</h3>
					<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
				</div>
				<div id="day3" class="container tab-pane fade"><br>
					<h3>Ngày 3: 22 tháng 11 năm 2020</h3>
					<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
				</div>
			</div>
		</div>
	</lich>

	<sanpham id="sanpham">
		<div class="container">
			<h1>Sản phẩm được giới thiệu</h1>
			<div class="items">
				<div class="row">
				<?php
					// lấy ds khach từ db
					$sql = 'SELECT * FROM `mathang`';
					$listmh = executeResult($sql);
					foreach( $listmh as $itemmh){
						echo '
						<div class="col-6 col-sm-4">
							<a href="#" class="detail-room">
								<div class="room">
									<div class="image-room">
										<div class="image"><img src="images/mathang/'.$itemmh['anh'].'.jpg" alt="qua-1" style="height: 260px;"></div>
										<div class="title-1">
											<br>
										<h4>'.$itemmh['ten'].'</h4> 
										<p>Xuất xứ: '.$itemmh['xuatxu'].'</p>
										</div>
										<div class="follow">Xem chi tiết</div>
									</div>
								</div>
							</a>
						</div>
						';
					}?>
				</div>
			</div>
		</div>
	</sanpham>

	<sanpham id="khach">
		<div class="container">
			<h1>Khách mời - Nhà đầu tư</h1>
			<div class="items">
				<div class="row">
				<?php
					// lấy ds khach từ db
					$sql = 'SELECT `id`, `ten`, `ngaysinh`, `gioitinh`, `anh`,`mota` FROM `nguoidung` WHERE vaitro="khachmoi"';
					$listkhach = executeResult($sql);
					foreach( $listkhach as $item){
						echo '
							<div class="col-6 col-sm-4">
								<div class="room">
									<div class="image-room">
										<div class="image"><img src="images/khachmoi/'.$item['anh'].'.jpg" style="height: 260px;"></div>
										<div class="title-1">
											<br>
											<h4>'.$item['ten'].'</h4> 
											<p>'.$item['ngaysinh'].'</p>
											<p>'.$item['mota'].'</p>
										</div>
									</div>
								</div>
							</div>
						';
					}?>
				</div>	
			</div>
		</div>
	</sanpham>

	<sanpham id="taitro">
		<div class="container">
			<h1>Đơn vị đồng hành cùng hội thảo</h1>
			<div class="items">
				<div class="row">
				<?php
					$sql = 'SELECT `id`, `ten`, `logo`,`mota` FROM nhataitro';
					$listtaitro = executeResult($sql);
					foreach( $listtaitro as $item3){
						echo '
						<div class="col-6 col-sm-4">
							<div class="nhataitro">
								<div class="image-room">
									<div class="image"><img src="images/taitro/'.$item3['logo'].'.png" alt="can-ho"  style="height: 260px;"></div>
								</div>
							</div>
						</div>
						';
					}?>
					<!-- <div class="col-6 col-sm-4">
					    <div class="nhataitro">
						    <div class="image-room">
							    <div class="image"><img src="images/cam.jpg" alt="can-ho"></div>
						    </div>
						</div>
					</div>
					<div class="col-6 col-sm-4">
					    <div class="nhataitro">
						    <div class="image-room">
							    <div class="image"><img src="images/cam.jpg" alt="can-ho"></div>
						    </div>
						</div>
					</div>
					<div class="col-6 col-sm-4">
					    <div class="nhataitro">
						    <div class="image-room">
							    <div class="image"><img src="images/cam.jpg" alt="can-ho"></div>
						    </div>
						</div>
					</div>
					<div class="col-6 col-sm-4">
					    <div class="nhataitro">
						    <div class="image-room">
							    <div class="image"><img src="images/cam.jpg" alt="can-ho"></div>
						    </div>
						</div>
					</div>
					<div class="col-6 col-sm-4">
					    <div class="nhataitro">
						    <div class="image-room">
							    <div class="image"><img src="images/cam.jpg" alt="can-ho"></div>
						    </div>
						</div>
					</div> -->
				</div>
			</div>
		</div>
	</sanpham>
	<local id="lienhe">
		<div class="container">
			<h1>Địa điểm tổ chức và thông tin liên hệ</h1>
			<div class="row">
				<div class="col-sm-5">
					<ul class="list">
						<li><i class="fa fa-map-marker" aria-hidden="true"></i>số 222,Trần Duy Hưng,Hà Nội</li>
						<li><i class="fa fa-envelope" aria-hidden="true"></i>phamquangthu2@gmail.com</li>
						<li><i class="fa fa-phone" aria-hidden="true"></i>0982222222</li>
						<li><i class="fa fa-clock-o" aria-hidden="true"></i>3 ngày từ 20 đến 22-12-2020</li>
					</ul>
					<img src="images/bigc.jpg" alt="bigc-supermarket">
				</div>
				<div class="col-sm-7">
					<!-- <img src="images/bigc.jpg" alt="bigc-supermarket"> -->
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1585.8815860567393!2d105.79283100050066!3d21.00709029876346!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135abc8534aa827%3A0xf081f17479465d22!2zU2nDqnUgVGjhu4sgQmlnIEMgVGjEg25nIExvbmc!5e1!3m2!1svi!2s!4v1602694432676!5m2!1svi!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>	
				</div>
			</div>
			
		</div>
	</local>
	<dangki id="dangky">
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<div class="r-form">
						<h3>đăng kí tham dự</h3>
						<form role="form" method="post">
							<div class="form-group">
								<label for="name">Họ và tên:</label>
								<input type="text" class="form-control" name="ten">
							</div>
							<div class="form-group">
								<label for="phone">Giới tính</label>
								<input type="text" class="form-control" placeholder="VD:nam/nữ" name="gioitinh">
							</div>
							<div class="form-group">
								<label for="email">Email:</label>
								<input type="email" class="form-control" placeholder="Enter email" name="email">
							</div>
							<div class="form-group">
								<label for="phone">Ngày sinh</label>
								<input type="date" class="form-control" name="ngaysinh">
							</div>
							<div class="form-group">
								<label for="compa">Ghi chú</label>
								<input type="text" class="form-control" placeholder="Nhập ghi chú" name="mota">
							</div>
							<button name="submit" type="submit" class="btn btn-success" >Gửi</button>
							<button name="reset" type="reset" class="btn btn-danger" style="float: right;">Reset</button>
						</form> 
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form2">
						<p><i class="fa fa-check" aria-hidden="true"></i>Tham gia miễn phí</p>
						<p><i class="fa fa-check" aria-hidden="true"></i>Cơ hội trải nghiệm nông sản sạch</p>
						<p><i class="fa fa-check" aria-hidden="true"></i>Các phần quà từ BigCi</p>
						<p><i class="fa fa-check" aria-hidden="true"></i>17:00 - 21:00 ngày 20-11-2020</p>
					</div>
					
				</div>
			</div>
		</div>	
	</dangki>
	<footer>
		<h4>Design by PhamQuangThu_B17DCCN590</h4>
	</footer>
</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type='text/javascript'>
		var mybutton = document.getElementById("myBtn");
		// When the user scrolls down 20px from the top of the document, show the button
		window.onscroll = function() {scrollFunction()};
		function scrollFunction() {
			if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
				mybutton.style.display = "block";
			} else {
				mybutton.style.display = "none";
			}
		}

		// When the user clicks on the button, scroll to the top of the document
		function topFunction() {
			document.body.scrollTop = 0;
			document.documentElement.scrollTop = 0;
		}
	</script>
</body>
</html>