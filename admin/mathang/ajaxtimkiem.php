<?php
    $conn = mysqli_connect('localhost','root','','hoithao');
    if($conn){
        mysqli_query($conn, "SET NAMES 'utf8");
    }else{
        die("Không thể kết nối với CSDL");
    }
    $a = $_POST['data'];

    $sql="SELECT * FROM mathang WHERE ten like '%$a%' ";
    $query = mysqli_query($conn, $sql);
    $total_rows = mysqli_num_rows($query);
    if($total_rows>0){
        while($row = mysqli_fetch_assoc($query)){ ?>
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
        <?php }
    } ?>