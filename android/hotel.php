<?php
require_once("../koneksi.php");
//$_POST['aksi'] = 'data';
if(isset($_POST['aksi'])){
	$aksi = escape($_POST['aksi']);
	if($aksi=='data'){
		$query = query("select * from hotel");
		if(mysqli_num_rows($query)==0){
			$data[] = null;
		}else{
			while($result = mysqli_fetch_array($query)){
				$data[] = $result;
			}
		}
		echo json_encode($data);
	}else if($aksi=='detail'){
		$id_hotel = escape($_POST['id']);
		$query = query("select * from hotel h join wilayah w on h.kode_wilayah=w.kode_wilayah where id_hotel='$id_hotel'");
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