<?php
session_start();
require_once("../koneksi.php");
if(!isset($_POST['aksi'])){
	$id_kategori = urldecode($_GET['id']);
	$a = query("delete from kategori where id_kategori='$id_kategori'");
	if($a){
		setcookie("berhasil", "berhasil menghapus kategori", time()+2);
	}else{
		setcookie("gagal", "gagal menghapus kategori", time()+2);
	}
	header("location:index.php?h=kategori");
}else if($_POST['aksi']=='tambah'){
	$nama = escape($_POST['nama']);
	$a = query("insert into kategori(nama_kategori) values('$nama')");
	if($a){
		setcookie("berhasil", "berhasil menambah kategori", time()+2);
	}else{
		setcookie("gagal", "gagal menambah kategori, ".mysqli_error(), time()+2);
	}
	header("location:index.php?h=kategori");
}else if($_POST['aksi']=='edit'){
	$kode_lama = escape($_POST['kode_lama']);
	$nama = escape($_POST['nama']);
	$a = query("update kategori set nama_kategori='$nama' where id_kategori='$kode_lama'");
	if($a){
		setcookie("berhasil", "berhasil mengedit kategori", time()+2);
	}else{
		setcookie("gagal", "gagal mengedit kategori, ".mysqli_error(), time()+2);
	}
	header("location:index.php?h=kategori");
}
?>