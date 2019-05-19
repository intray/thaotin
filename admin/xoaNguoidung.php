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
		$idUser = $_GET["idUser"];

		$sql = mysql_query("DELETE from users where idUser = $idUser");
		$row = mysql_fetch_array($sql);
		header("location: nguoidung.php");
 ?>