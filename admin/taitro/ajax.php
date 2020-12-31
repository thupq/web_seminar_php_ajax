<?php
    require_once('../../database/help.php');
    extract($_POST); //nhap cac bien vao mang nay

    // them
    if(isset($_POST['ten']) && isset($_POST['logo']) && isset($_POST['mota'])){
        
        $sql = "INSERT INTO `nhataitro`( `ten`, `logo`,`mota`)
        VALUES ('$ten','$logo','$mota')";
        execute($sql);
    }

    // xoa
    if(isset($_POST['xoaid'])){
        $id = $_POST['xoaid'];
        $sql = "delete from nhataitro where id = '$id'";
        execute($sql);
    }

    // lay user tu id
    if(isset($_POST['id'])&&isset($_POST['id'])!=''){
        $user_id = $_POST['id'];
        $sql      = "select * from nhataitro where id = '$user_id'";
        $nhataitro = executeSingleResult($sql);
        echo json_encode($nhataitro);
    }

    // sua
    if(isset($_POST['ids'])){
        $ids = $_POST['ids'];
        $tens = $_POST['tens'];
        $logos = $_POST['logos'];
        $motas = $_POST['motas'];
        $sql = " UPDATE `nhataitro` SET `ten`='$tens',`logo`='$logos',`mota`='$motas' WHERE `id`='$ids' ";
        execute($sql);
    }
?>