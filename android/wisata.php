<?php
require_once("../koneksi.php");
//$_POST['aksi'] = 'by wilayah';
//$_POST['id'] = '1';
if(isset($_POST['aksi'])){
	$aksi = escape($_POST['aksi']);
	if($aksi=='data'){
		$query = query("select * from wisata");
		if(mysqli_num_rows($query)==0){
			$data[] = null;
		}else{
			while($result = mysqli_fetch_array($query)){
				$data[] = $result;
			}
		}
		echo json_encode($data);
	}else if($aksi=='detail'){
		$kode_wisata = escape($_POST['id']);
		$query = query("select * from wisata w join kategori k on w.id_kategori=k.id_kategori join wilayah a on w.kode_wilayah=a.kode_wilayah where kode_wisata='$kode_wisata'");
		if(mysqli_num_rows($query)==0){
			$data[] = null;
		}else{
			while($result = mysqli_fetch_array($query)){
				$data[] = $result;
			}
		}
		echo json_encode($data);
	}else if($aksi=='by kategori'){
		$id_kategori = escape($_POST['id']);
		$query = query("select * from wisata where id_kategori='$id_kategori'");
		if(mysqli_num_rows($query)==0){
			$data[] = null;
		}else{
			while($result = mysqli_fetch_array($query)){
				$data[] = $result;
			}
		}
		echo json_encode($data);
	}else if($aksi=='by wilayah'){
		$kode_wilayah = escape($_POST['id']);
		$query = query("select * from wisata where kode_wilayah='$kode_wilayah'");
		if(mysqli_num_rows($query)==0){
			$data[] = null;
		}else{
			while($result = mysqli_fetch_array($query)){
				$data[] = $result;
			}
		}
		echo json_encode($data);
	}
}
?>