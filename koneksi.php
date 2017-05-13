<?php
function connect_db(){
	$host = "localhost";
	$usr = "root";
	$pwd = "";
	$db = "sumbawa_besar";
	$con = mysqli_connect($host, $usr, $pwd, $db);
	if(!$con){
		$result = array(
						'status' => 'gagal koneksi database server',
						'error_no' => 'error baris: '.mysqli_connect_errno().PHP_EOL,
						'error_problem' => 'masalah error: '.mysqli_connect_error().PHP_EOL
					);
		echo json_encode($result);
	}
	return $con;
}
function escape($string){
	return mysqli_real_escape_string(connect_db(), $string);
}
function query($string_query){
	$result = mysqli_query(connect_db(), $string_query);
	return $result;
}
?>