<?php
    require_once('../../database/help.php');
    extract($_POST); //nhap cac bien vao mang nay

    // them
    if(isset($_POST['ten']) && isset($_POST['thoigian']) && isset($_POST['anh']) &&isset($_POST['mota'])){
        
        $sql = "INSERT INTO `banner`(`ten`, `thoigian`, `anh`,`mota`)
        VALUES ('$ten','$thoigian','$anh','$mota')";
        execute($sql);
    }

    // xoa
    if(isset($_POST['xoaid'])){
        $id = $_POST['xoaid'];
        $sql = "delete from banner where id = '$id'";
        execute($sql);
    }

    // lay user tu id
    if(isset($_POST['id'])&&isset($_POST['id'])!=''){
        $user_id = $_POST['id'];
        $sql      = "select * from banner where id = '$user_id'";
        $banner = executeSingleResult($sql);
        echo json_encode($banner);
    }

    // sua
    if(isset($_POST['ids'])){
        $ids = $_POST['ids'];
        $tens = $_POST['tens'];
        $thoigians = $_POST['thoigians'];
        $anhs = $_POST['anhs'];
        $motas = $_POST['motas'];
        $sql = " UPDATE banner SET `ten`='$tens',`thoigian`='$thoigians',`anh`='$anhs',`mota`='$motas' WHERE `id`='$ids' ";
        execute($sql);
    }
?>