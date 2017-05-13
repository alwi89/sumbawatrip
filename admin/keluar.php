<?php
session_start();
unset($_SESSION['adm']);
unset($_SESSION['nm_adm']);
header("location:login.php");
?>