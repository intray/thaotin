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
		$idQC = $_GET["idQC"];

		$sql = mysql_query("DELETE from quangcao where idQC = $idQC");
		$row = mysql_fetch_array($sql);
		header("location: quangcao.php");
 ?>