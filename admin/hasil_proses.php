<?php
require_once("../koneksi.php");
$id_hasil = urldecode($_GET['id']);
$a = mysql_query("delete from hasil_penelitian where id_hasil_penelitian='$id_hasil'");
if($a){
	setcookie("berhasil", "berhasil menghapus hasil penelitian", time()+2);
}else{
	setcookie("gagal", "gagal menghapus hasil penelitian", time()+2);
}
header("location:index.php?h=hasil");
?>