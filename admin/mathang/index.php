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
	<title>Sản phẩm giới thiệu</title>
	<link rel="stylesheet" type="text/css" href="../../css/admin.css">
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
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
            <h2 style="text-align: center;">Các mặt hàng giới thiệu</h2>
        </div>
        <div>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Thêm</button>
            <input type="text" class="timkiem form-control" name="" placeholder="Tìm kiếm theo tên" style="margin-bottom: 10px;width:40%;float:right;">
        </div>
        
        <div id="table-data">
        <table class="table table-hover">
			    <thead>
                    <tr>
			      		<th>id</th>
				        <th>Tên </th>
				        <th>Xuất xứ</th>
				        <th>Ảnh</th>
				        <th>Mô tả</th>
				        <th></th>
				        <th></th>
			      	</tr>
			    </thead>
			    <tbody class="danhsach">
                    <?php
                    $conn = mysqli_connect('localhost','root','','hoithao');
                    //khi bam vao dien gia thi ta o trang 1, sau khi chon chuyen trang khac thi xu ly o ajaxphantrang.php
                    $page = 1;
                    $rowperpage = 4;//so row 1 trang
                    $perrow= $page*$rowperpage - $rowperpage;//key cua phan tu dau tien
                    
                    $total_rows = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM `mathang` "));
                    $total_page = ceil($total_rows/$rowperpage);
                    $list_pages= '';
                    for($i=1; $i<=$total_page; $i++){
                        $list_pages .= '<li class="page-item"><a class="page-link" href="#">'.$i.'</a></li>';
                    }
                    $sql = "SELECT * FROM mathang LIMIT $perrow, $rowperpage";
                    $query = mysqli_query($conn,$sql);
                    while($row = mysqli_fetch_assoc($query)){
                    ?>
                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td style="width:15%;"><?php echo $row['ten'] ?></td>
						<td style="width:20%;"><?php echo $row['xuatxu'] ?></td>
                        <td style="width:30%;"><img src="../../images/mathang/<?php echo $row['anh'] ?>.jpg" style="width: 150px;height:150px;"></td>
                        <td style="width:30%;"><?php echo $row['mota'] ?></td>
                        <td>
							<button type="button" class="btn btn-success" onclick="getUser(<?php echo $row['id'] ?>)">Sửa</button>
						</td>
                        <td>
                            <button type="button" class="btn btn-danger" onclick="deleteSP(<?php echo $row['id'] ?>)">Xóa</button>
                        </td>
                    </tr>
                    <?php }?>
			    </tbody>
            </table>


            <!-- BS4 Modal them -->
                        
            <div class="modal" id="myModal">
				<div class="modal-dialog">
					<div class="modal-content">

						<!-- Modal Header -->
						<div class="modal-header">
							<h4 class="modal-title">Thêm sản phẩm</h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>

						<!-- Modal body -->
						<div class="modal-body">
							<div class="form-group">
								<label >Tên</label>
								<input type="text" class="form-control" id="ten" >
							</div>
							<div class="form-group">
								<label >Xuất xứ</label>
								<input type="text" class="form-control" id="xuatxu" >
							</div>
							<div class="form-group">
								<label >Ảnh</label>
								<input type="text" class="form-control" placeholder="chọn ảnh" id="anh" >
							</div>
							<div class="form-group">
								<label >Mô tả</label>
								<input type="text" class="form-control" placeholder="nhập mô tả" id="mota">
							</div>
						</div>

						<!-- Modal footer -->
						<div class="modal-footer">
							<button type="button" class="btn btn-success" data-dismiss="modal" onclick="themSP()">Thêm</button>
							<button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
						</div>

					</div>
				</div>
			</div>

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
								<label >Tên:</label>
								<input type="text" class="form-control" id="sten">
							</div>
							<div class="form-group">
								<label >Xuất xứ</label>
								<input type="text" class="form-control" id="sxuatxu" >
							</div>
							<div class="form-group">
								<label >Ảnh</label>
								<input type="text" class="form-control" id="sanh"  >
							</div>
							<div class="form-group">
								<label >Mô tả</label>
								<input type="text" class="form-control" id="smota"  >
							</div>
						</div>

						<!-- Modal footer -->
						<div class="modal-footer">
							<button type="button" class="btn btn-success" data-dismiss="modal" onclick="suaSP()">Lưu</button>
							<button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
							<input type="text" id="sid" style="display: none;">
						</div>

					</div>
				</div>
			</div>


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
					var user = JSON.parse(data);
					$('#sten').val(user.ten);
					$('#sxuatxu').val(user.xuatxu);
					$('#sanh').val(user.anh);
					$('#smota').val(user.mota);

				}
			);
			$('#smyModal').modal("show");
		}

		function suaSP(){
			var ids = $('#sid').val();
			var tens = $('#sten').val();
			var xuatxus = $('#sxuatxu').val();
			var anhs = $('#sanh').val();
			var motas = $('#smota').val();
			
			$.post('ajax.php',{
				ids: ids,
				tens:tens,
				xuatxus:xuatxus,
				anhs:anhs,
				motas:motas,
			},function(data, status){
				$('#smyModal').modal("hide");
				alert('Sửa thành công!');
				location.reload();
			});
		}

		function themSP(){
			var ten = $('#ten').val();
			var xuatxu = $('#xuatxu').val();
			var anh = $('#anh').val();
			var mota = $('#mota').val();
			$.ajax({
				url:'ajax.php',
				type: 'post',
				data:{
					ten: ten,
					xuatxu: xuatxu,
					anh: anh,
					mota: mota
				},
				success: function(data, status){
					alert ('Thêm thành công');
					location.reload();
				}
			});//phuong thuc goi ham ajax de gui request(giong http)
			
		}

        function deleteSP(xoaid){
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