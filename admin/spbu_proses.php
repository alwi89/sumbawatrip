<?php
session_start();
require_once("../koneksi.php");
if(!isset($_POST['aksi'])){
	$id_spbu = urldecode($_GET['id']);
	$a = query("delete from spbu where id_spbu='$id_spbu'");
	if($a){
		setcookie("berhasil", "berhasil menghapus spbu", time()+2);
	}else{
		setcookie("gagal", "gagal menghapus spbu", time()+2);
	}
	header("location:index.php?h=spbu");
}else if($_POST['aksi']=='tambah'){
	$nama = escape($_POST['nama']);
	$alamat = escape($_POST['alamat']);
	$latitude = escape($_POST['latitude']);
	$longitude = escape($_POST['longitude']);
	$wilayah = escape($_POST['wilayah']);
	$gambar = str_replace(" ", "_", $_FILES['gambar']['name']);
	$source = $_FILES['gambar']['tmp_name'];
	$dest = "../spbu/$gambar";
	if(strlen($gambar)!=0){
		$a = query("insert into spbu(nama_spbu, alamat, latitude, longitude, kode_wilayah, gambar) values('$nama', '$alamat', '$latitude', '$longitude', '$wilayah', '$gambar')");
		if($a){
			@copy($source, $dest);
		}
	}else{
		$a = query("insert into spbu(nama_spbu, alamat, latitude, longitude, kode_wilayah) values('$nama', '$alamat', '$latitude', '$longitude', '$wilayah')");
	}
	if($a){
		setcookie("berhasil", "berhasil menambah spbu", time()+2);
	}else{
		setcookie("gagal", "gagal menambah spbu, ".mysqli_error(), time()+2);
	}
	header("location:index.php?h=spbu");
}else if($_POST['aksi']=='edit'){
	$kode_lama = escape($_POST['kode_lama']);
	$nama = escape($_POST['nama']);
	$alamat = escape($_POST['alamat']);
	$latitude = escape($_POST['latitude']);
	$longitude = escape($_POST['longitude']);
	$wilayah = escape($_POST['wilayah']);
	$gambar = str_replace(" ", "_", $_FILES['gambar']['name']);
	$source = $_FILES['gambar']['tmp_name'];
	$dest = "../spbu/$gambar";
	if(strlen($gambar)!=0){
		$a = query("update spbu set nama_spbu='$nama', alamat='$alamat', latitude='$latitude', longitude='$longitude', kode_wilayah='$wilayah', gambar='$gambar' where id_spbu='$kode_lama'");
		if($a){
			@copy($source, $dest);
		}
	}else{
		$a = query("update spbu set nama_spbu='$nama', alamat='$alamat', latitude='$latitude', longitude='$longitude', kode_wilayah='$wilayah' where id_spbu='$kode_lama'");
	}
	if($a){
		setcookie("berhasil", "berhasil mengedit spbu", time()+2);
	}else{
		setcookie("gagal", "gagal mengedit spbu, ".mysqli_error(), time()+2);
	}
	header("location:index.php?h=spbu");
}
?>