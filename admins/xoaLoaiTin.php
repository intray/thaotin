<?php 
	session_start();
	ob_start();
	if (!isset($_SESSION["idUser"])) {
		header("location:../index.php");
	}if ( $_SESSION["idGroup"] != 1) {
		header("location:../index.php");
	}
 ?>
<?php require_once("../lib/connection.php"); ?>
<?php 
		$idLT = $_GET["idLT"];

		$sql = mysql_query("DELETE from loaitin where idLT = $idLT");
		$row = mysql_fetch_array($sql);
		header("location: loaitin.php");
 ?>