<?php
	session_start();
	require_once('../../database/help.php');
	if (!isset($_SESSION['username'])) {
		header('Location: ../login.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Người tham gia</title>
	<link rel="stylesheet" type="text/css" href="../../css/admin.css">
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
	<link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<header>
		<div class="container">
			<div class="d-flex">
				<p>Admin <strong style="color:red;"><?php echo $_SESSION['username'] ?></strong> đã đăng nhập thành công vào trang quản trị !</p>
				<div class="p-2 ml-auto">	
					<a href="../logout.php">
						<button type="button" class="btn btn-danger">Đăng xuất</button>
					</a>
				</div>
			</div>
		</div>
	</header>

	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
		<div class="container">
		  	<!-- Brand -->
		  	<a class="navbar-brand" href="../index.php"><img src="../../images/your-logo.png" alt="logo" style="max-width: 160px;"></a>
		  	<!-- Links -->
		  	<ul class="navbar-nav">
			    <li class="nav-item">
				<a href="../index.php"><button type="button" class="btn btn-danger"> Danh sách quản trị</button></a>
			    </li>
		 		<li class="nav-item">
				 	<a href="../khachmoi/"><button type="button" class="btn btn-danger" style="margin: 0 5px;">Khách mời</button></a>
		  		</li>
		  		<li class="nav-item">
				  	<a href="../nguoithamgia/"><button type="button" class="btn btn-danger"style="margin: 0 5px;">Người tham gia</button></a>
		  		</li>
		  		<li class="nav-item">
				  	<a href="../mathang/"><button type="button" class="btn btn-danger"style="margin: 0 5px;">Mặt hàng</button></a>
		  		</li>
		  		<li class="nav-item">
				  	<a href="../taitro/"><button type="button" class="btn btn-danger"style="margin: 0 5px;">Nhà tài trợ</button></a>
		  		</li>
		  		<li class="nav-item">
				  	<a href="../banner/"><button type="button" class="btn btn-danger">Banner</button></a>
		  		</li>
		  	</ul>
		</div>
	</nav>
	<div class="container">
        <div id="header">
            <h2 style="text-align: center;">Danh sách người đăng ký tham gia</h2>
        </div>
        <div>
			<a href="thamgia.php"><button type="button" class="btn btn-success" >Danh sách đã duyệt</button></a>
            <input type="text" class="timkiem form-control" name="" placeholder="Tìm kiếm theo tên" style="margin-bottom: 10px;width:40%;float:right;">
        </div>
        
        <div id="table-data">
        <table class="table table-hover">
			    <thead>
                    <tr>
			      		<th>id</th>
				        <th>Tên </th>
				        <th>Ngày sinh</th>
				        <th>Giới tính</th>
				        <th>Email</th>
						<th>Mô tả</th>
						<th>Tình trạng</th>
				        <th></th>
			      	</tr>
			    </thead>
			    <tbody class="danhsach">
                    <?php
                    $conn = mysqli_connect('localhost','root','','hoithao');
                    //khi bam vao dien gia thi ta o trang 1, sau khi chon chuyen trang khac thi xu ly o ajaxphantrang.php
                    $page = 1;
                    $rowperpage = 5;//so row 1 trang
                    $perrow= $page*$rowperpage - $rowperpage;//key cua phan tu dau tien
                    
                    $total_rows = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM `nguoidung` WHERE xuly ='no'"));
                    $total_page = ceil($total_rows/$rowperpage);
                    $list_pages= '';
                    for($i=1; $i<=$total_page; $i++){
                        $list_pages .= '<li class="page-item"><a class="page-link" href="#">'.$i.'</a></li>';
                    }
                    $sql = "SELECT * FROM `nguoidung` WHERE xuly ='no' LIMIT $perrow, $rowperpage";
                    $query = mysqli_query($conn,$sql);
                    while($row = mysqli_fetch_assoc($query)){
                    ?>
                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['ten'] ?></td>
                        <td><?php echo $row['ngaysinh'] ?></td>
                        <td><?php echo $row['gioitinh'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['mota'] ?></td>
                        <td>
							<button type="button" class="btn btn-success" onclick="getUser(<?php echo $row['id'] ?>)">Xử lý</button>
						</td>
                        <td>
                            <button type="button" class="btn btn-danger" onclick="deletekm(<?php echo $row['id'] ?>)">Xóa</button>
                        </td>
                    </tr>
                    <?php }?>
			    </tbody>
            </table>

            <div align='center'>
                <ul class="pagination phantrang">
                    <?php echo $list_pages;?>
                </ul>
            </div>
        </div>
    </div>
    <script src="../../js/jquery.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.timkiem').keyup(function(){
                var txt = $('.timkiem').val();
                $.post('ajaxtimkiem.php',{data: txt}, function(data){
                    $('.danhsach').html(data);
                })
            });
            $(".phantrang").on("click","li a", function(event){
                event.preventDefault();
                var page = $(this).text();
                $.post('ajaxphantrang.php',{page: page}, function(data){
                    $('.danhsach').html(data);
                })
            });
        })

        function getUser(id){
			$('#sid').val(id);
			console.log(id);
			$.post('ajax.php',{
				id: id,
			},function(data, status){
				location.reload();
				alert('Đã cập nhật');
				}
			);
		}
		//phuong thuc goi ham ajax de gui request(giong http)		

        function deletekm(xoaid){
			var option = confirm('Bạn có muốn xoá người này không?')
			if(option==true){
				$.ajax({
					url:'ajax.php',
					type: 'post',
					data:{xoaid: xoaid},
					success: function(data, status){
						location.reload();
					}
				});
			}	
		}
    </script>
</body>
</html>