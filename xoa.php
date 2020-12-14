<?php

$tam= isset($_SESSION['cart'])?$_SESSION['cart']:[];
$action= isset($_GET['quanly'])?$_GET['quanly']:'';

if ($action=='xoa')
{
	
	$masp= isset($_GET['id'])?$_GET['id']:'';
	unset($tam[$masp]);


}

if ($action=='huy')
{
	$tam=[];
}
$_SESSION['cart']= $tam;
