<?php
    require_once('../../database/help.php');
    extract($_POST); //nhap cac bien vao mang nay

    // them
    if(isset($_POST['ten']) && isset($_POST['ngaysinh'])&& isset($_POST['gioitinh']) && isset($_POST['email']) 
        && isset($_POST['anh']) && isset($_POST['danhmuc'])&&isset($_POST['mota'])){
        
        $sql = "INSERT INTO `nguoidung`(`tenmuc`, `ten`, `ngaysinh`, `gioitinh`, `email`, `anh`, `vaitro`,`mota`)
        VALUES ('$danhmuc','$ten','$ngaysinh','$gioitinh', '$email','$anh','khachmoi','$mota')";
        execute($sql);
    }

    // xoa//bien id nhan gt dc gui len bang pt post voi key la'id'..
    if(isset($_POST['xoaid'])){
        $id = $_POST['xoaid'];
        $sql = "delete from nguoidung where id = '$id'";
        execute($sql);
    }

    // lay user tu id
    if(isset($_POST['id'])&&isset($_POST['id'])!=''){
        $user_id = $_POST['id'];
        $sql      = "select * from nguoidung where id = '$user_id'";
        $khachmoi = executeSingleResult($sql);
        echo json_encode($khachmoi);
    }

    // sua
    if(isset($_POST['ids'])){
        $ids = $_POST['ids'];
        $tens = $_POST['tens'];
        $ngaysinhs = $_POST['ngaysinhs'];
        $gioitinhs = $_POST['gioitinhs'];
        $emails = $_POST['emails'];
        $anhs = $_POST['anhs'];
        $danhmucs = $_POST['danhmucs'];
        $motas = $_POST['motas'];
        // $sql = "UPDATE `nguoidung` SET `tenmuc`=, `ten`=,`ngaysinh`=,`gioitinh`=,
        //         `email`=,`anh`=, `mota`= WHERE id =  ";
        $sql = " UPDATE `nguoidung` SET `tenmuc` = '$danhmucs', `ten`='$tens',`ngaysinh`='$ngaysinhs',`gioitinh`='$gioitinhs',
        `email`='$emails',`anh`='$anhs',`mota`='$motas' WHERE `id`='$ids' ";
        execute($sql);
    }
?>