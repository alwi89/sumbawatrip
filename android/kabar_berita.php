<?php
require_once("../koneksi.php");
//$_POST['aksi'] = 'data';
if(isset($_POST['aksi'])){
	$aksi = escape($_POST['aksi']);
	if($aksi=='data'){
		$query = query("select * from kabar_wisata order by tanggal asc, jam asc");
		if(mysqli_num_rows($query)==0){
			$data[] = null;
		}else{
			while($result = mysqli_fetch_array($query)){
				$data[] = $result;
			}
		}
		echo json_encode($data);
	}else if($aksi=='detail'){
		$id = escape($_POST['id']);
		$query = query("select * from kabar_wisata where id_kabarwisata='$id'");
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