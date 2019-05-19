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
		$hoten = $_POST['hoten'];
		$username = $_POST["username"];
		$pass = $_POST["pass"];
		$diachi = $_POST["diachi"];
		$dienthoai = $_POST["dienthoai"];
		$email = $_POST["email"];
		// $gioitinh = $_POST["gioitinh"];
		$quyen = $_POST["quyen"];
		$ngaysinh = $_POST["nam"]."-".$_POST["thang"]."-".$_POST["ngay"];
		$sql = mysql_query("INSERT INTO users (HoTen, Username, Password, DiaChi, Dienthoai, Email, NgayDangKy, idGroup, NgaySinh) VALUES ('$hoten', '$username', '$pass', '$diachi', $dienthoai, '$email', now(), '$quyen', $ngaysinh)");
	}
 ?>

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

	<div class="content-themUser">
		<p>Thông tin tài khoản</p>
		<form class="form-horizontal" action="themUser.php" method="POST">
		  <div class="form-group">
		    <label for="hoten" class="col-sm-2 control-label">Họ Tên</label>
		    <div class="col-sm-6">
		      <input type="text" class="form-control" name="hoten" id="hoten" placeholder="Họ Tên">
		    </div>

		    <label for="username" class="col-sm-2 control-label">User Name</label>
		    <div class="col-sm-6">
		      <input type="text" class="form-control" name="username" id="username" placeholder="Tên đăng nhập">
		    </div>

		    <label for="pass" class="col-sm-2 control-label">Mật khẩu</label>
		    <div class="col-sm-6">
		      <input type="Password" class="form-control" name="pass" id="pass" placeholder="Password">
		    </div>

		    <label for="diachi" class="col-sm-2 control-label">Địa chỉ</label>
		    <div class="col-sm-6">
		      <input type="text" class="form-control" name="diachi" id="diachi" placeholder="Địa chỉ">
		    </div>

		    <label for="dienthoai" class="col-sm-2 control-label">Điện thoại</label>
		    <div class="col-sm-6">
		      <input type="text" class="form-control" name="dienthoai" id="dienthoai" placeholder="Điện thoại">
		    </div>

		    <label for="email" class="col-sm-2 control-label">Email</label>
		    <div class="col-sm-6">
		      <input type="email" class="form-control" name="email" id="email" placeholder="Tên đăng nhập">
		    </div>

		    <label for="email" class="col-sm-2 control-label">Ngày sinh</label>
		    <div class="col-md-7">
                <div class="col-md-2">
                  <select class="form-control" id="DateOfBirthDay" name="ngay" aria-invalid="false">
                    <option value="0">Ngày</option>
                    <?php for ($i=1; $i <= 31 ; $i++) { ?>
                    <option value=”<?php echo $i;?>”><?php echo $i;?></option>
                    <?php }?>
                  </select>
                </div> <!--Date-->
                <div class="col-md-2">
                    <select class="form-control" id="DateOfBirthDay" name="thang" aria-invalid="false">
                      <option value="0">Tháng</option>
                      <?php for ($i=1; $i <= 12 ; $i++) { ?>
                      <option value=”<?php echo $i;?>”><?php echo $i;?></option>
                      <?php }?>
                    </select>
                </div> <!--Month-->
              <div class="col-md-2">
                  <select class="form-control" id="YearOfBirthDay" name="nam" aria-invalid="false">
                    <option value="0">Năm</option>
                    <?php for ($i=1940; $i <= 2000 ; $i++) { ?>
                    <option value=”<?php echo $i;?>”><?php echo $i;?></option>
                    <?php }?>
                  </select>
                </div> <!--Years-->
		    </div>

		    <label for="gioitinh" class="col-sm-2 control-label">Giới tính</label>
		    <div class="col-sm-2">
		     <select class="form-control" id="gioitinh" aria-invalid="false">
                    <option name="gioitinh" value="1">Nam</option>
                    <option name="gioitinh" value="0">Nữ</option>
		    </div>

		    <!-- <label for="inlineRadio2" class="col-sm-2 control-label">Quyền</label> -->
		    <div class="col-sm-6">
		      <input type="radio" name="quyen" id="inlineRadio2" value="1"> Admin
		      <input type="radio" name="quyen"  id="inlineRadio2" value="0"> Thành viên
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