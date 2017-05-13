<?php
session_start();
require_once("../koneksi.php");
if(!isset($_POST['aksi'])){
	$kode_wilayah = urldecode($_GET['id']);
	$a = query("delete from wilayah where kode_wilayah='$kode_wilayah'");
	if($a){
		setcookie("berhasil", "berhasil menghapus wilayah", time()+2);
	}else{
		setcookie("gagal", "gagal menghapus wilayah", time()+2);
	}
	header("location:index.php?h=wilayah");
}else if($_POST['aksi']=='tambah'){
	$nama = escape($_POST['nama']);
	$a = query("insert into wilayah(nama_wilayah) values('$nama')");
	if($a){
		setcookie("berhasil", "berhasil menambah wilayah", time()+2);
	}else{
		setcookie("gagal", "gagal menambah wilayah, ".mysqli_error(), time()+2);
	}
	header("location:index.php?h=wilayah");
}else if($_POST['aksi']=='edit'){
	$kode_lama = escape($_POST['kode_lama']);
	$nama = escape($_POST['nama']);
	$a = query("update wilayah set nama_wilayah='$nama' where kode_wilayah='$kode_lama'");
	if($a){
		setcookie("berhasil", "berhasil mengedit wilayah", time()+2);
	}else{
		setcookie("gagal", "gagal mengedit wilayah, ".mysqli_error(), time()+2);
	}
	header("location:index.php?h=wilayah");
}
?>