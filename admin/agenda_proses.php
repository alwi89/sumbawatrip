<?php
session_start();
require_once("../koneksi.php");
if(!isset($_POST['aksi'])){
	$id_agenda = urldecode($_GET['id']);
	$a = mysql_query("delete from agenda where id_agenda='$id_agenda'");
	if($a){
		setcookie("berhasil", "berhasil menghapus agenda", time()+2);
	}else{
		setcookie("gagal", "gagal menghapus agenda", time()+2);
	}
	header("location:index.php?h=agenda");
}else if($_POST['aksi']=='tambah'){
	$lokasi = escape($_POST['lokasi']);
	$tgl_agendas = explode("/", escape($_POST['tgl_agenda']));
	$tgl_agenda = $tgl_agendas[2].'-'.$tgl_agendas[1].'-'.$tgl_agendas[0];
	$isi = escape($_POST['isi']);
	$a = mysql_query("insert into agenda(lokasi, tanggal, isi_kegiatan) values('$lokasi', '$tgl_agenda','$isi')");
	if($a){
		setcookie("berhasil", "berhasil menambah agenda", time()+2);
	}else{
		setcookie("gagal", "gagal menambah agenda, ".mysql_error(), time()+2);
	}
	header("location:index.php?h=agenda");
}else if($_POST['aksi']=='edit'){
	$kode_lama = escape($_POST['kode_lama']);
	$lokasi = escape($_POST['lokasi']);
	$tgl_agendas = explode("/", escape($_POST['tgl_agenda']));
	$tgl_agenda = $tgl_agendas[2].'-'.$tgl_agendas[1].'-'.$tgl_agendas[0];
	$isi = escape($_POST['isi']);
	$a = mysql_query("update agenda set lokasi='$lokasi', tanggal='$tgl_agenda', isi_kegiatan='$isi' where id_agenda='$kode_lama'");
	if($a){
		setcookie("berhasil", "berhasil mengedit agenda", time()+2);
	}else{
		setcookie("gagal", "gagal mengedit agenda, ".mysql_error(), time()+2);
	}
	header("location:index.php?h=agenda");
}
?>