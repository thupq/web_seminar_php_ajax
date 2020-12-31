<?php
    $conn = mysqli_connect('localhost','root','','hoithao');
    if($conn){
        mysqli_query($conn, "SET NAMES 'utf8");
    }else{
        die("Không thể kết nối với CSDL");
    }
    $a = $_POST['data'];

    $sql="SELECT * FROM banner WHERE ten like '%$a%' ";
    $query = mysqli_query($conn, $sql);
    $total_rows = mysqli_num_rows($query);
    if($total_rows>0){
        while($row = mysqli_fetch_assoc($query)){ ?>
        <tr>
            <td><?php echo $row['id'] ?></td>
            <td><?php echo $row['ten'] ?></td>
            <td><?php echo $row['thoigian'] ?></td>
            <td><img src="../../images/banner/<?php echo $row['anh'] ?>.jpg" style="width: 250px;"></td>
            <td><?php echo $row['mota'] ?></td>
            <td>
                <button type="button" class="btn btn-success" onclick="getUser(<?php echo $row['id'] ?>)">Sửa</button>
            </td>
            <td>
                <button type="button" class="btn btn-danger" onclick="deleteBn(<?php echo $row['id'] ?>)">Xóa</button>
            </td>
        </tr>
        <?php }
    } ?>