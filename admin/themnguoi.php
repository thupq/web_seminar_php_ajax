<?php
    require_once('../database/help.php');
    $id = $ten = $ngaysinh = $gioitinh = $email = $anh = $mota ='';
    if(!empty($_POST)){
        if(isset($_POST['ten'])){
            $ten = $_POST['ten'];
        }
        if(isset($_POST['id'])){
            $id = $_POST['id'];
        }
        if(isset($_POST['ngaysinh'])){
            $ngaysinh = $_POST['ngaysinh'];
        }
        if(isset($_POST['gioitinh'])){
            $gioitinh = $_POST['gioitinh'];
        }
        if(isset($_POST['email'])){
            $email = $_POST['email'];
        }
        if(isset($_POST['anh'])){
            $anh = $_POST['anh'];
        }
        if(isset($_POST['mota'])){
            $mota = $_POST['mota'];
        }
        if(!empty($ten)){
            if($id==''){ //them 
                $sql = 'INSERT INTO `nguoidung`(`ten`, `ngaysinh`, `gioitinh`, `email`, `anh`, `vaitro`,`mota`)
                 VALUES ("'.$ten.'","'.$ngaysinh.'","'.$gioitinh.'", "'.$email.'","'.$anh.'","khachmoi","'.$mota.'")';
            }
            else{
                $sql = 'UPDATE `nguoidung` SET `ten`="'.$ten.'",`ngaysinh`="'.$ngaysinh.'",`gioitinh`="'.$gioitinh.'",
                `email`="'.$email.'",`anh`="'.$anh.'", `mota`="'.$mota.'" WHERE id = "'.$id.'"';
            }
            execute($sql);
            header('Location: khachmoi/index.php');
            die();
            // ../../images/nobita.jpg
        }
    }
    if (isset($_GET['id'])) {
        $id       = $_GET['id'];
        $sql      = 'select * from nguoidung where id = '.$id;
        $khachmoi = executeSingleResult($sql);
        if ($khachmoi != null) {
            $ten = $khachmoi['ten'];
            $ngaysinh = $khachmoi['ngaysinh'];
            $gioitinh = $khachmoi['gioitinh'];
            $email = $khachmoi['email'];
            $anh = $khachmoi['anh'];
            $mota = $khachmoi['mota'];
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Khách mời</title>
	<link rel="stylesheet" type="text/css" href="../css/admin.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<header>
		<div class="container">
			<div class="d-flex">
				<!-- <div class="p-2 "><h1 style="margin-bottom: 30px;">Trang quản lý hội thảo</h1></div> -->
				<div class="p-2 ml-auto"><button type="submit" class="btn btn-danger">Đăng xuất</button></div>
			</div>
		</div>
	</header>

	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
		<div class="container">
		  	<!-- Brand -->
		  	<a class="navbar-brand" href="index.php"><img src="../images/your-logo.png" alt="logo" style="max-width: 160px;"></a>
		  	<!-- Links -->
		  	<ul class="navbar-nav">
			    <li class="nav-item">
                    <a href="../index.php"><button type="button" class="btn btn-danger">Quản lý tài khoản</button></a>
			    </li>
		 		<li class="nav-item">
                    <a href="#">
                        <button type="button" class="btn btn-danger" style="margin: 0 5px;">Khách mời</button>
                    </a>
		  		</li>
		  		<li class="nav-item">
                    <a href="../nguoithamgia/thamgia.php">
                        <button type="button" class="btn btn-danger"style="margin: 0 5px;">Người tham gia</button>
                    </a>
		  		</li>
		  		<li class="nav-item">
                    <a href="../hang.php">
                        <button type="button" class="btn btn-danger"style="margin: 0 5px;">Mặt hàng</button>
                    </a>		  			
		  		</li>
		  		<li class="nav-item">
                    <a href="../nhataitro/index.php">
                        <button type="button" class="btn btn-danger"style="margin: 0 5px;">Nhà tài trợ</button>
                    </a>			
		  		</li>
		  		<li class="nav-item">
                    <a href="../banner/index.php">
                        <button type="button" class="btn btn-danger">Banner</button>
                    </a>
		  		</li>
		  	</ul>
		</div>
	</nav> 
	<about>
		<div class="container">
            <h2 style="text-align: center;">Thêm/ sửa người dùng</h2>
            <form method="POST" style="margin: auto; width: 80%;">
                <input type="text" name="id" value="<?=$id?>" hidden="true">
                <div class="form-group">
                    <label >Họ và tên:</label>
                    <input type="text" class="form-control" name="ten" value="<?=$ten?>">
                </div>
                <div class="form-group">
                    <label >Ngày sinh</label>
                    <input type="date" class="form-control" name="ngaysinh" value="<?=$ngaysinh?>">
                </div>
                <div class="form-group">
                    <label >Giới tính</label>
                    <input type="text" class="form-control" placeholder="VD: nam/nữ" name="gioitinh" value="<?=$gioitinh?>">
                </div>
                <div class="form-group">
                    <label >Email</label>
                    <input type="email" class="form-control" placeholder="VD: nam@gmail.com" name="email" value="<?=$email?>">
                </div>
                <div class="form-group">
                    <label >Ảnh</label>
                    <input type="text" class="form-control" placeholder="chọn ảnh" name="anh" value="<?=$anh?>">
                </div>
                <div class="form-group">
                    <label >Danh mục</label>
                    <select name="danhmuc" class="form-control">
                        <option value="volvo">Chọn danh mục</option>
                        <?php
                            $sql = 'select * from danhmuc';
                            $listdm = executeResult($sql);
                            foreach( $listdm as $item){
                                echo '<option selected value="'.$item['id'].'">'.$item['ten'].'</option>';
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label >Mô tả</label>
                    <input type="text" class="form-control" placeholder="nhập mô tả" name="mota" value="<?=$mota?>">
                </div>
                <button class="btn btn-success">Thêm</button>
            </form> 
		</div>
		
    </about>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>

