<?php
session_start();
require_once("../koneksi.php");
if(!isset($_POST['aksi'])){
	$id_hotel = urldecode($_GET['id']);
	$a = query("delete from hotel where id_hotel='$id_hotel'");
	if($a){
		setcookie("berhasil", "berhasil menghapus hotel", time()+2);
	}else{
		setcookie("gagal", "gagal menghapus hotel", time()+2);
	}
	header("location:index.php?h=hotel");
}else if($_POST['aksi']=='tambah'){
	$nama = escape($_POST['nama']);
	$no_telp = escape($_POST['no_telp']);
	$alamat = escape($_POST['alamat']);
	$latitude = escape($_POST['latitude']);
	$longitude = escape($_POST['longitude']);
	$wilayah = escape($_POST['wilayah']);
	$gambar = str_replace(" ", "_", $_FILES['gambar']['name']);
	$source = $_FILES['gambar']['tmp_name'];
	$dest = "../hotel/$gambar";
	if(strlen($gambar)!=0){
		$a = query("insert into hotel(nama_hotel, no_telepon, alamat, latitude, longitude, kode_wilayah, gambar) values('$nama', '$no_telp', '$alamat', '$latitude', '$longitude', '$wilayah', '$gambar')");
		if($a){
			@copy($source, $dest);
		}
	}else{
		$a = query("insert into hotel(nama_hotel, no_telepon, alamat, latitude, longitude, kode_wilayah) values('$nama', '$no_telp', '$alamat', '$latitude', '$longitude', '$wilayah')");
	}
	if($a){
		setcookie("berhasil", "berhasil menambah hotel", time()+2);
	}else{
		setcookie("gagal", "gagal menambah hotel, ".mysqli_error(), time()+2);
	}
	header("location:index.php?h=hotel");
}else if($_POST['aksi']=='edit'){
	$kode_lama = escape($_POST['kode_lama']);
	$nama = escape($_POST['nama']);
	$no_telp = escape($_POST['no_telp']);
	$alamat = escape($_POST['alamat']);
	$latitude = escape($_POST['latitude']);
	$longitude = escape($_POST['longitude']);
	$wilayah = escape($_POST['wilayah']);
	$gambar = str_replace(" ", "_", $_FILES['gambar']['name']);
	$source = $_FILES['gambar']['tmp_name'];
	$dest = "../hotel/$gambar";
	if(strlen($gambar)!=0){
		$a = query("update hotel set nama_hotel='$nama', no_telepon='$no_telp', alamat='$alamat', latitude='$latitude', longitude='$longitude', kode_wilayah='$wilayah', gambar='$gambar' where id_hotel='$kode_lama'");
		if($a){
			@copy($source, $dest);
		}
	}else{
		$a = query("update hotel set nama_hotel='$nama', no_telepon='$no_telp', alamat='$alamat', latitude='$latitude', longitude='$longitude', kode_wilayah='$wilayah' where id_hotel='$kode_lama'");
	}
	if($a){
		setcookie("berhasil", "berhasil mengedit hotel", time()+2);
	}else{
		setcookie("gagal", "gagal mengedit hotel, ".mysqli_error(), time()+2);
	}
	header("location:index.php?h=hotel");
}
?>