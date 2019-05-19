<?php require_once("lib/connection.php"); ?>
<?php $vitri =1; ?>
<?php 
	$sql = mysql_query("select * FROM quangcao WHERE vitri = 1");
	while ($row = mysql_fetch_array($sql)) {
 ?>
 	<a href="<?php echo $row['Url']; ?>">
		<img width="280" src="upload/quangcao/<?php echo $row['urlHinh']; ?>" />
		<div style="height:10px"></div>
	</a>
<?php } ?>
