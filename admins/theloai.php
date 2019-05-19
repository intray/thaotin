<?php require_once("../lib/connection.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin-thaotin</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link rel="stylesheet" type="text/css" href="../css/cssadmin.css">
</head>
<body>
	<div id="clear"></div>
	<div class="menu-admin">
		<?php include "menu.php"; ?>
		<button type="button" href="index.php" class="btn btn-default">Quay về</button>
	</div>

<div class="content-menu">
		<table class="table table-hover table-bordered">
	  		 <tr>
			    <th>ID</th>
			    <th>Tên thể loại</th> 
			    <th>Tên không dấu</th>
			    <th>Thứ Tự</th>
			    <th>Ẩn hiện</th>
				<td><a href="themTheLoai.php">Thêm</a></td>
		  	</tr>
		  	<?php 
				$sql = mysql_query("select * from theloai order by idTL DESC");
				while ($row = mysql_fetch_array($sql)) {
					ob_start();
			?>
			<tr>
			    <td>{idTL}</td>
			    <td>{TenTL}</td>
			    <td>{TenTL_KhongDau}</td>
			    <td>{ThuTu}</td>
			    <td>{AnHien}</td>
			    <td>
			    	<a href="suaTheLoai.php?idTL={idTL}">Sửa |</a> 
			    	<a onclick="confirm('Bạn chắc chắn muốn xóa !!!');" href="xoaTheLoai.php?idTL={idTL}">Xóa</a>
			    </td>
			</tr>
			<?php 
					$s = ob_get_clean();
					$s = str_replace("{idTL}", $row["idTL"], $s);
					$s = str_replace("{TenTL}", $row["TenTL"], $s);
					$s = str_replace("{TenTL_KhongDau}", $row["TenTL_KhongDau"], $s);
					$s = str_replace("{ThuTu}", $row["ThuTu"], $s);
					$s = str_replace("{AnHien}", $row["AnHien"], $s);
					echo $s;
				} 
			?>
		</table>
	</div>
	<div id="clear"></div>
	</body>
</html>