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
	if (isset($_POST["btn-save"])) { //kiem tra da an btn chua
		$TenTL = $_POST["tentl"];
		$ThuTu = $_POST["thutu"]; settype($ThuTu, "int");
		$AnHien = $_POST["anhien"]; settype($AnHien, "int");
		
		$sql = " INSERT INTO theloai (TenTL, ThuTu, AnHien) VALUES ('$TenTL', '$ThuTu', '$AnHien') ";
		mysql_query($sql);
		header("location: theloai.php");
	}

 ?>


<html>
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

	<div class="content-themUser">
		<p>Thông tin thể loại</p>
		<form class="form-horizontal" action="themTheLoai.php" method="POST">
		  <div class="form-group">
		    <label for="tentl" class="col-sm-2 control-label">Tên thể loại</label>
		    <div class="col-sm-6">
		      <input type="text" class="form-control" name="tentl" id="tentl" placeholder="Tên thể loại">
		    </div>

		    <label for="thutu" class="col-sm-2 control-label">Thứ tự</label>
		    <div class="col-sm-6">
		      <input type="text" class="form-control" name="thutu" id="thutu" placeholder="Thứ tự">
		    </div>

		    <label for="inlineRadio2" class="col-sm-2 control-label">Ẩn hiện</label>
		    <div class="col-sm-6">
		      <input type="radio" name="anhien" id="inlineRadio2" value="1"> Hiện
		      <input type="radio" name="anhien"  id="inlineRadio2" value="0"> Ẩn
		    </div>

		    <div class="col-md-6">
                  <button type="submit" class="btn btn-primary" style="width:190px;" id="btn-save" name="btn-save">Lưu</button>
                  <button type="reset" class="btn btn-default" style="width:190px;" id="btn-save" name="btn-delete">Xóa</button>
            </div>
		    
		  </div>
		</form>
	</div>	
</body>
</html>