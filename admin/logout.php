<?php
    session_start();
    if(isset($_SESSION['username'])&& isset($_SESSION['password'])&& isset($_SESSION['id'])&& isset($_SESSION['ten'])&& isset($_SESSION['ngaysinh'])
    && isset($_SESSION['email'])&& isset($_SESSION['mota'])){
        session_destroy();
    }
header('location: login.php');
?>