<?php
    $conn = mysqli_connect('localhost','root','','hoithao');
    if($conn){
        mysqli_query($conn, "SET NAMES 'utf8");
    }else{
        die("Không thể kết nối với CSDL");
    }
    $a = $_POST['data'];

    $sql="SELECT * FROM nguoidung WHERE vaitro='khachmoi' and ten like '%$a%' ";
    $query = mysqli_query($conn, $sql);
    $total_rows = mysqli_num_rows($query);
    if($total_rows>0){
        while($row = mysqli_fetch_assoc($query)){ ?>
        <tr>
            <td><?php echo $row['id'] ?></td>
            <td><?php echo $row['ten'] ?></td>
            <td><?php echo $row['ngaysinh'] ?></td>
            <td><?php echo $row['gioitinh'] ?></td>
            <td><img src="../../images/khachmoi/<?php echo $row['anh'] ?>.jpg" style="width: 150px;height:150px;"></td>
            <td><?php echo $row['mota'] ?></td>
            <td>
                <button type="button" class="btn btn-success" onclick="getUser(<?php echo $row['id'] ?>)">Sửa</button>
            </td>
            <td>
                <button type="button" class="btn btn-danger" onclick="deletekm(<?php echo $row['id'] ?>)">Xóa</button>
            </td>
        </tr>
        <?php }
    } ?>