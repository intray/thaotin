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
		$idTL = $_GET["idTL"];

		$sql = mysql_query("SELECT * from theloai where idTL = $idTL");
		$row = mysql_fetch_array($sql);
 ?>
<?php 
	if (isset($_POST["btn-update"])) { //kiem tra da an btn chua
		$TenTL = $_POST["tentl"];
		$ThuTu = $_POST["thutu"]; settype($ThuTu, "int");
		$AnHien = $_POST["anhien"]; settype($AnHien, "int");
		$idTL = $_GET["idTL"];
		
		$sql_update = " UPDATE theloai SET TenTL = '$TenTL', ThuTu = '$ThuTu', AnHien = '$AnHien' WHERE idTL = '$idTL' ";
		echo mysql_query($sql_update);
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
		<p>Sửa thông tin thể loại</p>
		<form class="form-horizontal" action="suaTheLoai.php" method="POST">
		  <div class="form-group">
		    <label for="tentl" class="col-sm-2 control-label">Tên thể loại</label>
		    <div class="col-sm-6">
		      <input value="<?php echo $row['TenTL']; ?>" type="text" class="form-control" name="tentl" id="tentl" placeholder="Tên thể loại">
		    </div>

		    <label for="thutu" class="col-sm-2 control-label">Thứ tự</label>
		    <div class="col-sm-6">
		      <input value="<?php echo $row['ThuTu']; ?>" type="text" class="form-control" name="thutu" id="thutu" placeholder="Thứ tự">
		    </div>

		    <label for="inlineRadio2" class="col-sm-2 control-label">Ẩn hiện</label>
		    <div class="col-sm-6">
		      <input <?php if ($row['AnHien'] == 1 ) {echo "checked = 'check'";} ?> type="radio" name="anhien" id="inlineRadio2" value="1"> Hiện
		      <input <?php if ($row['AnHien'] == 0 ) {echo "checked = 'check'";} ?> type="radio" name="anhien"  id="inlineRadio2" value="0"> Ẩn
		    </div>

		    <div class="col-md-6">
                  <button type="submit" class="btn btn-primary" style="width:190px;" id="btn-update" name="btn-update">Sửa</button>
                  <button type="reset" class="btn btn-default" style="width:190px;" id="btn-save" name="btn-delete">Xóa</button>
            </div>
		    
		  </div>
		</form>
	</div>	

</body>
</html>