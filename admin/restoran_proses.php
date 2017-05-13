<?php
session_start();
require_once("../koneksi.php");
if(!isset($_POST['aksi'])){
	$id_restoran = urldecode($_GET['id']);
	$a = query("delete from restoran where id_restoran='$id_restoran'");
	if($a){
		setcookie("berhasil", "berhasil menghapus restoran", time()+2);
	}else{
		setcookie("gagal", "gagal menghapus restoran", time()+2);
	}
	header("location:index.php?h=restoran");
}else if($_POST['aksi']=='tambah'){
	$nama = escape($_POST['nama']);
	$alamat = escape($_POST['alamat']);
	$latitude = escape($_POST['latitude']);
	$longitude = escape($_POST['longitude']);
	$wilayah = escape($_POST['wilayah']);
	$gambar = str_replace(" ", "_", $_FILES['gambar']['name']);
	$source = $_FILES['gambar']['tmp_name'];
	$dest = "../resto/$gambar";
	if(strlen($gambar)!=0){
		$a = query("insert into restoran(nama_restoran, alamat, latitude, longitude, kode_wilayah, gambar) values('$nama', '$alamat', '$latitude', '$longitude', '$wilayah', '$gambar')");
		if($a){
			@copy($source, $dest);
		}
	}else{
		$a = query("insert into restoran(nama_restoran, alamat, latitude, longitude, kode_wilayah) values('$nama', '$alamat', '$latitude', '$longitude', '$wilayah')");
	}
	if($a){
		setcookie("berhasil", "berhasil menambah restoran", time()+2);
	}else{
		setcookie("gagal", "gagal menambah restoran, ".mysqli_error(), time()+2);
	}
	header("location:index.php?h=restoran");
}else if($_POST['aksi']=='edit'){
	$kode_lama = escape($_POST['kode_lama']);
	$nama = escape($_POST['nama']);
	$alamat = escape($_POST['alamat']);
	$latitude = escape($_POST['latitude']);
	$longitude = escape($_POST['longitude']);
	$wilayah = escape($_POST['wilayah']);
	$gambar = str_replace(" ", "_", $_FILES['gambar']['name']);
	$source = $_FILES['gambar']['tmp_name'];
	$dest = "../resto/$gambar";
	if(strlen($gambar)!=0){
		$a = query("update restoran set nama_restoran='$nama', alamat='$alamat', latitude='$latitude', longitude='$longitude', kode_wilayah='$wilayah', gambar='$gambar' where id_restoran='$kode_lama'");
		if($a){
			@copy($source, $dest);
		}
	}else{
		$a = query("update restoran set nama_restoran='$nama', alamat='$alamat', latitude='$latitude', longitude='$longitude', kode_wilayah='$wilayah' where id_restoran='$kode_lama'");
	}
	if($a){
		setcookie("berhasil", "berhasil mengedit restoran", time()+2);
	}else{
		setcookie("gagal", "gagal mengedit restoran, ".mysqli_error(), time()+2);
	}
	header("location:index.php?h=restoran");
}
?>