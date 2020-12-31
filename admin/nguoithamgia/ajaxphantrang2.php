<?php

    $conn = mysqli_connect('localhost','root','','hoithao');
    if($conn){
        mysqli_query($conn, "SET NAMES 'utf8");
    }else{
        die("Không thể kết nối với CSDL");
    }
    
    $page = $_POST['page'];
    $rowperpage = 5;//so row 1 trang
    $perrow= $page*$rowperpage - $rowperpage;//key cua phan tu dau tien
 
    $total_rows = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM `nguoidung` WHERE xuly ='yes'"));
    $total_page = ceil($total_rows/$rowperpage);
    $list_pages= '';
    for($i=1; $i<=$total_page; $i++){
     if($i==$page){
          $active = 'active';// bôi xanh nút trang
     }else{
         $active = '';
     }
    
     $list_pages .= '<li class="page-item '.$active.'"><a class="page-link" href="#">'.$i.'</a></li>';
    }
    $sql = "SELECT * FROM `nguoidung` WHERE xuly ='yes' LIMIT $perrow, $rowperpage";
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
        <button type="button" class="btn btn-danger" onclick="deletekm(<?php echo $row['id'] ?>)">Xóa</button>
    </td>
</tr>

<?php } ?>