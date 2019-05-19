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
			    <th>Họ Tên</th> 
			    <th>User Name</th>
			    <th>Pass</th>
			    <th>Địa chỉ</th>
			    <th>Điện thoại</th>
			    <th>Email</th>
			    <th>Ngày đăng kí</th>
			    <th>Quyền</th>
			    <th>Ngày sinh</th>
			    <th>Giới tinh</th>
			    <th>Hoạt động</th>
			    <th>Key</th>
				<td><a href="themUser.php">Thêm</a></td>
		  	</tr>
		  	<?php 
				$sql = mysql_query("select * from users order by idUser DESC");
				while ($row = mysql_fetch_array($sql)) {
					ob_start();
			?>
			<tr>
			    <td>{idUser}</td>
			    <td>{HoTen}</td>
			    <td>{Username}</td>
			    <td>{Password}</td>
			    <td>{DiaChi}</td>
			    <td>{Dienthoai}</td>
			    <td>{Email}</td>
			    <td>{NgayDangKy}</td>
			    <td>{idGroup}</td>
			    <td>{NgaySinh}</td>
			    <td>{GioiTinh}</td>
			    <td>{Active}</td>
			    <td>{RandomKey}</td>
			    <td>
			    	<a href="suaUser.php?idUser={idUser}">Sửa |</a> 
			    	<a href="xoaUser.php?idUser={idUser}">Xóa</a>
			    </td>
			</tr>
			<?php 
					$s = ob_get_clean();
					$s = str_replace("{idUser}", $row["idUser"], $s);
					$s = str_replace("{HoTen}", $row["HoTen"], $s);
					$s = str_replace("{Username}", $row["Username"], $s);
					$s = str_replace("{Password}", $row["Password"], $s);
					$s = str_replace("{DiaChi}", $row["DiaChi"], $s);
					$s = str_replace("{Dienthoai}", $row["Dienthoai"], $s);
					$s = str_replace("{Email}", $row["Email"], $s);
					$s = str_replace("{NgayDangKy}", $row["NgayDangKy"], $s);
					$s = str_replace("{idGroup}", $row["idGroup"], $s);
					$s = str_replace("{NgaySinh}", $row["NgaySinh"], $s);
					$s = str_replace("{GioiTinh}", $row["GioiTinh"], $s);
					$s = str_replace("{Active}", $row["Active"], $s);
					$s = str_replace("{RandomKey}", $row["RandomKey"], $s);
					echo $s;
				} 
			?>
		</table>
	</div>
	<div id="clear"></div>
	</body>
</html>