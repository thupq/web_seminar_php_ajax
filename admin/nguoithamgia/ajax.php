<?php
    require_once('../../database/help.php');
    extract($_POST); //nhap cac bien vao mang nay

    // xoa
    if(isset($_POST['xoaid'])){
        $id = $_POST['xoaid'];
        $sql = "delete from nguoidung where id = '$id'";
        execute($sql);
    }

    // lay user tu id
    if(isset($_POST['id'])){
        $user_id = $_POST['id'];
        $sql      = "UPDATE `nguoidung` SET `xuly`='yes' WHERE `id`='$user_id'";
        execute($sql);
    }

?>