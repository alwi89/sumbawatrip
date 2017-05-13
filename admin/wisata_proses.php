<?php
session_start();
require_once("../koneksi.php");
if(!isset($_POST['aksi'])){
	$kode_wisata = urldecode($_GET['id']);
	$a = query("delete from wisata where kode_wisata='$kode_wisata'");
	if($a){
		setcookie("berhasil", "berhasil menghapus wisata", time()+2);
	}else{
		setcookie("gagal", "gagal menghapus wisata", time()+2);
	}
	header("location:index.php?h=wisata");
}else if($_POST['aksi']=='tambah'){
	$nama = escape($_POST['nama']);
	$deskripsi = $_POST['deskripsi'];
	$alamat = escape($_POST['alamat']);
	$latitude = escape($_POST['latitude']);
	$longitude = escape($_POST['longitude']);
	$kategori = escape($_POST['kategori']);
	$wilayah = escape($_POST['wilayah']);
	$gambar = str_replace(" ", "_", $_FILES['gambar']['name']);
	$source = $_FILES['gambar']['tmp_name'];
	$dest = "../wisata/$gambar";
	if(strlen($gambar)!=0){
		$a = query("insert into wisata(nama_wisata, deskripsi, alamat, latitude, longitude, id_kategori, kode_wilayah, gambar) values('$nama', '$deskripsi', '$alamat', '$latitude', '$longitude', '$kategori', '$wilayah', '$gambar')");
		if($a){
			@copy($source, $dest);
		}
	}else{
		$a = query("insert into wisata(nama_wisata, deskripsi, alamat, latitude, longitude, id_kategori, kode_wilayah) values('$nama', '$deskripsi', '$alamat', '$latitude', '$longitude', '$kategori', '$wilayah')");
	}
	if($a){
		setcookie("berhasil", "berhasil menambah wisata", time()+2);
	}else{
		setcookie("gagal", "gagal menambah wisata, ".mysqli_error(), time()+2);
	}
	header("location:index.php?h=wisata");
}else if($_POST['aksi']=='edit'){
	$kode_lama = escape($_POST['kode_lama']);
	$nama = escape($_POST['nama']);
	$deskripsi = $_POST['deskripsi'];
	$alamat = escape($_POST['alamat']);
	$latitude = escape($_POST['latitude']);
	$longitude = escape($_POST['longitude']);
	$kategori = escape($_POST['kategori']);
	$wilayah = escape($_POST['wilayah']);
	$gambar = str_replace(" ", "_", $_FILES['gambar']['name']);
	$source = $_FILES['gambar']['tmp_name'];
	$dest = "../wisata/$gambar";
	if(strlen($gambar)!=0){
		$a = query("update wisata set nama_wisata='$nama', deskripsi='$deskripsi', alamat='$alamat', latitude='$latitude', longitude='$longitude', id_kategori='$kategori', kode_wilayah='$wilayah', gambar='$gambar' where kode_wisata='$kode_lama'");
		if($a){
			@copy($source, $dest);
		}
	}else{
		$a = query("update wisata set nama_wisata='$nama', deskripsi='$deskripsi', alamat='$alamat', latitude='$latitude', longitude='$longitude', id_kategori='$kategori', kode_wilayah='$wilayah'  where kode_wisata='$kode_lama'");
	}
	if($a){
		setcookie("berhasil", "berhasil mengedit wisata", time()+2);
	}else{
		setcookie("gagal", "gagal mengedit wisata, ".mysqli_error(), time()+2);
	}
	header("location:index.php?h=wisata");
}
?>