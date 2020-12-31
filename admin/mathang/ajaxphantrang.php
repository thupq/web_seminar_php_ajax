<?php

$conn = mysqli_connect('localhost','root','','hoithao');
    if($conn){
        mysqli_query($conn, "SET NAMES 'utf8");
    }else{
        die("Không thể kết nối với CSDL");
    }
    
    $page = $_POST['page'];
    $rowperpage = 4;//so row 1 trang
    $perrow= $page*$rowperpage - $rowperpage;//key cua phan tu dau tien
 
    $total_rows = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM mathang"));
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
    $sql = "SELECT * FROM mathang LIMIT $perrow, $rowperpage";
    $query = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($query)){
?>
<tr>
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

<?php } ?>