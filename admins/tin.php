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
			    <th>ID Tin</th>
			    <th>Tiêu đề</th> 
			    <th>Tiêu đề không dấu</th>
			    <th>Tóm tắt</th>
			    <th>Url Hình</th>
			    <th>Ngày tạo</th>
			    <th>ID người tạo</th>
			    <th class="col-md-4">Nội dung</th>
			    <th>ID loại tin</th>
			    <th>ID thể loại</th>
			    <th>Số lần xem</th>
			    <th>Tin nổi bật</th>
			    <th>Ẩn hiện</th>
				<td><a href="themTin.php">Thêm</a></td>
		  	</tr>
		  	<?php 
				$sql = mysql_query("select * from tin order by idTL DESC");
				while ($row = mysql_fetch_array($sql)) {
					ob_start();
			?>
			<tr>
			    <td>{idTin}</td>
			    <td>{TieuDe}</td>
			    <td>{TieuDe_KhongDau}</td>
			    <td>{TomTat}</td>
			    <td>{urlHinh}</td>
			    <td>{Ngay}</td>
			    <td>{idUser}</td>
			    <td><div>{Content}</div></td>
			    <td>{idLT}</td>
			    <td>{idTL}</td>
			    <td>{SoLanXem}</td>
			    <td>{TinNoiBat}</td>
			    <td>{AnHien}</td>
			    <td>
			    	<a href="suaTin.php?idTL={idTL}">Sửa |</a> 
			    	<a onclick="confirm('Bạn chắc chắn muốn xóa !!!');" href="xoaTin.php?idTL={idTL}">Xóa</a>
			    </td>
			</tr>
			<?php 
					$s = ob_get_clean();
					$s = str_replace("{idTin}", $row["idTin"], $s);
					$s = str_replace("{TieuDe}", $row["TieuDe"], $s);
					$s = str_replace("{TieuDe_KhongDau}", $row["TieuDe_KhongDau"], $s);
					$s = str_replace("{urlHinh}", $row["urlHinh"], $s);
					$s = str_replace("{TomTat}", $row["TomTat"], $s);
					$s = str_replace("{Ngay}", $row["Ngay"], $s);
					$s = str_replace("{idUser}", $row["idUser"], $s);
					$s = str_replace("{Content}", $row["Content"], $s);
					$s = str_replace("{idLT}", $row["idLT"], $s);
					$s = str_replace("{idTL}", $row["idTL"], $s);
					$s = str_replace("{SoLanXem}", $row["SoLanXem"], $s);
					$s = str_replace("{TinNoiBat}", $row["TinNoiBat"], $s);
					$s = str_replace("{AnHien}", $row["AnHien"], $s);
					echo $s;
				} 
			?>
		</table>
	</div>
	<div id="clear"></div>
	</body>
</html>