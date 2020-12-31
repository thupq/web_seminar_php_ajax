<?php
    require_once('../database/help.php');
    extract($_POST); //nhap cac bien vao mang nay

    // sua
    if(isset($_POST['ids'])){
        $ids = $_POST['ids'];
        $tens = $_POST['tens'];
        $ngaysinhs = $_POST['ngaysinhs'];
        $emails = $_POST['emails'];
        $taikhoans = $_POST['taikhoans'];
        $matkhaus = $_POST['matkhaus'];
        $motas = $_POST['motas'];
        $sql = " UPDATE `nguoidung` SET `ten`='$tens',`ngaysinh`='$ngaysinhs',
        `email`='$emails', `taikhoan`='$taikhoans',`matkhau`='$matkhaus',`mota`='$motas' WHERE `id`='$ids' ";
        execute($sql);
    }
?>