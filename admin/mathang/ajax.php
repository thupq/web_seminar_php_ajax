<?php
    require_once('../../database/help.php');
    extract($_POST); //nhap cac bien vao mang nay

    // them
    if(isset($_POST['ten']) && isset($_POST['xuatxu']) && isset($_POST['anh']) && isset($_POST['mota'])){
        
        $sql = "INSERT INTO `mathang`(`ten`, `xuatxu`, `anh`,`mota`)
        VALUES ('$ten','$xuatxu','$anh','$mota')";
        execute($sql);
    }

    // xoa
    if(isset($_POST['xoaid'])){
        $id = $_POST['xoaid'];
        $sql = "delete from mathang where id = '$id'";
        execute($sql);
    }

    // lay user tu id
    if(isset($_POST['id'])&&isset($_POST['id'])!=''){
        $mh_id = $_POST['id'];
        $sql      = "select * from mathang where id = '$mh_id'";
        $hang = executeSingleResult($sql);
        echo json_encode($hang);
    }

    // sua
    if(isset($_POST['ids'])){
        $ids = $_POST['ids'];
        $tens = $_POST['tens'];
        $xuatxus = $_POST['xuatxus'];
        $anhs = $_POST['anhs'];
        $motas = $_POST['motas'];
        $sql = " UPDATE `mathang` SET `ten`='$tens',`xuatxu`='$xuatxus',`anh`='$anhs',`mota`='$motas' WHERE `id`='$ids' ";
        execute($sql);
    }
?>