<link rel="stylesheet" type="text/css" href="css/cssmenutop.css">
<?php require_once("lib/connection.php"); ?>
 <div>

	<ul id="nav">
		<li class="active"><a href="index.php"><i class="fas fa-home"></i></a></li>
		<?php 
			$sql = mysql_query("select * from theloai
				");
			while ( $row = mysql_fetch_array($sql) ) {
				$idTL = $row['idTL'];
		 ?>
		<li><a><?php echo $row['TenTL']; ?></a>
			<ul>
				<?php 
					$sql_LT = mysql_query("select * from loaitin where idTl = $idTL ");
					while ($row_LT = mysql_fetch_array($sql_LT)) {
				 ?>
					<li><a href="index.php?p=tintrongloai&idLT=<?php echo $row_LT['idLT']; ?>"><?php echo $row_LT['Ten']; ?></a></li>
				<?php } ?>
			</ul>
		</li>
	<?php } ?>
</div>