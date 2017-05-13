<?php
require_once("../koneksi.php");
//$_POST['aksi'] = 'data';
if(isset($_POST['aksi'])){
	$aksi = escape($_POST['aksi']);
	if($aksi=='data'){
		$query = query("select * from spbu");
		if(mysqli_num_rows($query)==0){
			$data[] = null;
		}else{
			while($result = mysqli_fetch_array($query)){
				$data[] = $result;
			}
		}
		echo json_encode($data);
	}else if($aksi=='detail'){
		$id_spbu = escape($_POST['id']);
		$query = query("select * from spbu s join wilayah w on s.kode_wilayah=w.kode_wilayah where id_spbu='$id_spbu'");
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