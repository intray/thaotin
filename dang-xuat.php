<?php 
	session_start();
	unset($_SESSION['idUser']);
	unset($_SESSION['Password']);
	unset($_SESSION['HoTen']);
	unset($_SESSION['idGroup']);
	unset($_SESSION['Email']);
	header('location:index.php');
 ?>