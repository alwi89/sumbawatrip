<?php
session_start();
require_once("../koneksi.php");
if(!isset($_POST['aksi'])){
	$id_kabarwisata = urldecode($_GET['id']);
	$a = query("delete from kabar_wisata where id_kabarwisata='$id_kabarwisata'");
	if($a){
		setcookie("berhasil", "berhasil menghapus kabar wisata", time()+2);
	}else{
		setcookie("gagal", "gagal menghapus kabar wisata", time()+2);
	}
	header("location:index.php?h=berita");
}else if($_POST['aksi']=='tambah'){
	$judul = escape($_POST['judul']);
	$hari = escape($_POST['hari']);
	$jam = escape($_POST['jam']);
	$tanggals = explode("/", escape($_POST['tanggal']));
	$tanggal = $tanggals[2].'-'.$tanggals[1].'-'.$tanggals[0];
	$deskripsi = $_POST['deskripsi'];
	$alamat = escape($_POST['alamat']);
	$latitude = escape($_POST['latitude']);
	$longitude = escape($_POST['longitude']);
	$gambar = str_replace(" ", "_", $_FILES['gambar']['name']);
	$source = $_FILES['gambar']['tmp_name'];
	$dest = "../berita/$gambar";
	if(strlen($gambar)!=0){
		$a = query("insert into kabar_wisata(judul, isi_kabarwisata, alamat, latitude, longitude, hari, tanggal, jam, gambar) values('$judul', '$deskripsi', '$alamat', '$latitude', '$longitude', '$hari', '$tanggal', '$jam', '$gambar')");
		if($a){
			@copy($source, $dest);
		}
	}else{
		$a = query("insert into kabar_wisata(judul, isi_kabarwisata, alamat, latitude, longitude, hari, tanggal, jam) values('$judul', '$deskripsi', '$alamat', '$latitude', '$longitude', '$hari', '$tanggal', '$jam')");
	}
	if($a){
		setcookie("berhasil", "berhasil menambah berita", time()+2);
	}else{
		setcookie("gagal", "gagal menambah berita, ".mysqli_error(), time()+2);
	}
	header("location:index.php?h=berita");
}else if($_POST['aksi']=='edit'){
	$kode_lama = escape($_POST['kode_lama']);
	$judul = escape($_POST['judul']);
	$hari = escape($_POST['hari']);
	$jam = escape($_POST['jam']);
	$tanggals = explode("/", escape($_POST['tanggal']));
	$tanggal = $tanggals[2].'-'.$tanggals[1].'-'.$tanggals[0];
	$deskripsi = $_POST['deskripsi'];
	$alamat = escape($_POST['alamat']);
	$latitude = escape($_POST['latitude']);
	$longitude = escape($_POST['longitude']);
	$gambar = str_replace(" ", "_", $_FILES['gambar']['name']);
	$source = $_FILES['gambar']['tmp_name'];
	$dest = "../berita/$gambar";
	if(strlen($gambar)!=0){
		$a = query("update kabar_wisata set judul='$judul', isi_kabarwisata='$deskripsi', alamat='$alamat', latitude='$latitude', longitude='$longitude', hari='$hari', tanggal='$tanggal', jam='$jam', gambar='$gambar' where id_kabarwisata='$kode_lama'");
		if($a){
			@copy($source, $dest);
		}
	}else{
		$a = query("update kabar_wisata set judul='$judul', isi_kabarwisata='$deskripsi', alamat='$alamat', latitude='$latitude', longitude='$longitude', hari='$hari', tanggal='$tanggal', jam='$jam' where id_kabarwisata='$kode_lama'");
	}
	if($a){
		setcookie("berhasil", "berhasil mengedit berita", time()+2);
	}else{
		setcookie("gagal", "gagal mengedit berita, ".mysqli_error(), time()+2);
	}
	header("location:index.php?h=berita");
}
?>