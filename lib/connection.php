<?php 
	mysql_connect("localhost", "root") or die ("Kết nối tới database không thành công");
	mysql_select_db("thaotin.net");
	mysql_query("SET NAMES 'utf8'");
?>