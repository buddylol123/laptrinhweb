<?php
	include('connect.php');
    if(isset($_SESSION['user'])){
        unset($_SESSION['user']);
    }
    header('location:login');
    exit;
?>