<?php
session_start();
require_once("../koneksi.php");
if(!isset($_POST['aksi'])){
	$nik = urldecode($_GET['id']);
	$a = mysql_query("delete from dosen where nik='$nik'");
	if($a){
		setcookie("berhasil", "berhasil menghapus dosen", time()+2);
	}else{
		setcookie("gagal", "gagal menghapus dosen", time()+2);
	}
	header("location:index.php?h=dosen");
}else if($_POST['aksi']=='tambah'){
	$nik = escape($_POST['nik']);
	$nama = escape($_POST['nama']);
	$jabatan = escape($_POST['jabatan']);
	$alamat = escape($_POST['alamat']);
	$no_hp = escape($_POST['no_hp']);
	$email = escape($_POST['email']);
	$username = escape($_POST['username']);
	$password = escape($_POST['password']);
	$kode_lama = escape($_POST['kode_lama']);
	$a = mysql_query("insert into dosen(nik, nama, jabatan, alamat, no_hp, email, username, password) values('$nik', '$nama', '$jabatan', '$alamat', '$no_hp', '$email', '$username', '$password')");
	if($a){
		setcookie("berhasil", "berhasil menambah dosen", time()+2);
	}else{
		setcookie("gagal", "gagal menambah dosen, ".mysql_error(), time()+2);
	}
	header("location:index.php?h=dosen");
}else if($_POST['aksi']=='edit'){
	$kode_lama = escape($_POST['kode_lama']);
	$nik = escape($_POST['nik']);
	$nama = escape($_POST['nama']);
	$jabatan = escape($_POST['jabatan']);
	$alamat = escape($_POST['alamat']);
	$no_hp = escape($_POST['no_hp']);
	$email = escape($_POST['email']);
	$username = escape($_POST['username']);
	$password = escape($_POST['password']);
	$kode_lama = escape($_POST['kode_lama']);
	$a = mysql_query("update dosen set nik='$nik', nama='$nama', jabatan='$jabatan', alamat='$alamat', no_hp='$no_hp', email='$email', username='$username', password='$password' where nik='$kode_lama'");
	if($a){
		setcookie("berhasil", "berhasil mengedit dosen", time()+2);
	}else{
		setcookie("gagal", "gagal mengedit dosen, ".mysql_error(), time()+2);
	}
	header("location:index.php?h=dosen");
}
?>