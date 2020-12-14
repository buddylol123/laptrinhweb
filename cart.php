<?php

$tam= isset($_SESSION['cart'])?$_SESSION['cart']:[];
$action= isset($_GET['quanly'])?$_GET['quanly']:'';
if ($action=='giohang')
{
	$masp= isset($_GET['id'])?$_GET['id']:'';
	$soluong = 1;
	if ($masp!='')
	{
		if (isset($tam[$masp]))
			$tam[$masp] += $soluong;
		else 
			$tam[$masp]= $soluong;
	}
}
$_SESSION['cart']=$tam;


