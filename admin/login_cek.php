<?php
require_once("../koneksi.php");
$username = escape($_POST['username']);
$pwd = escape($_POST['password']);
$a = query("select * from admin where username='$username' and password='$pwd'");
$cek = mysqli_num_rows($a);
if($cek==0){
	setcookie("msg", "username atau password salah", time()+10);
	header("location:login.php");
}else{
	$b = mysqli_fetch_array($a);
	session_start();
	$_SESSION['adm'] = $b['id_admin'];
	$_SESSION['nm_adm'] = $b['username'];
	header("location:index.php");
}
?>