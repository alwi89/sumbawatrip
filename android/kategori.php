<?php
require_once("../koneksi.php");
//$_POST['aksi'] = 'data';
if(isset($_POST['aksi'])){
	$aksi = escape($_POST['aksi']);
	if($aksi=='data'){
		$query = query("select * from kategori");
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