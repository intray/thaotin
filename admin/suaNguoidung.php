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
    $idUser = $_GET["idUser"];

    $sql = mysql_query("SELECT * from users where idUser = $idUser");
    $row = mysql_fetch_array($sql);
 ?>
<?php 
  if (isset($_POST["btn-save"])) { //kiem tra da an btn chua
    $hoten = $_POST["hoten"];
    $username = $_POST["username"];
    $pass = $_POST["pass"];
    $diachi = $_POST["diachi"];
    $dienthoai = $_POST["dienthoai"];
    $email = $_POST["email"];
    $gioitinh = $_POST["gioitinh"]; settype($gioitinh, "int");
    $idGroup = $_POST["idGroup"]; settype($idGroup, "int");
    
    $sql_update = " UPDATE users SET HoTen = '$hoten', Username = '$username', Password = '$pass', DiaChi = '$diachi', Dienthoai = '$dienthoai', Email = '$email', idGroup = '$idGroup', GioiTinh = '$gioitinh'";
    mysql_query($sql_update);
    header("location: nguoidung.php");
  }

 ?>
<!DOCTYPE html>
<html>
<?php include "menu.php" ?>

        <!--   Content  -->
          <h3 style="margin: 10px 20px; color:black;font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;text-align: center;"> Sửa người dùng </h3>  
    <form class="form-horizontal" method="POST">
      <div class="form-group">
         <div class="form-group">
            <label class="label-user" for="username">Họ Tên</label>
            <input type="text" class="form-control input-user" name="hoten" id="username" value="<?php echo $row['HoTen'] ?>" placeholder="Họ tên">
         </div>
         <div class="form-group">
            <label class="label-user" for="username1">User name</label>
            <input type="text" class="form-control input-user" name="username" id="username1" value="<?php echo $row['Username'] ?>" placeholder="Tên đăng nhập">
         </div>
         <div class="form-group">
            <label class="label-user" for="pass">Mật khẩu</label>
            <input type="password" class="form-control input-user" name="pass" id="pass" value="<?php echo $row['Password'] ?>" placeholder="Mật khẩu">
         </div>
         <div class="form-group">
            <label class="label-user" for="diachi">Địa chỉ</label>
            <input type="text" class="form-control input-user" name="diachi" id="diachi" value="<?php echo $row['DiaChi'] ?>" placeholder="Địa chỉ">
         </div>
         <div class="form-group">
            <label class="label-user" for="dienthoai">Điện thoại</label>
            <input type="text" class="form-control input-user" name="dienthoai" id="dienthoai" value="<?php echo $row['Dienthoai'] ?>" placeholder="Điện thoại">
         </div>
         <div class="form-group">
            <label class="label-user" for="email">Email</label>
            <input type="email" class="form-control input-user" name="email" id="email" value="<?php echo $row['Email'] ?>" placeholder="Email">
         </div>
                    <div class="option-select">
                        <select class="form-control1 option-user" id="anhien" name="gioitinh" aria-invalid="false">
                          <option <?php if ($row['GioiTinh'] == 1) {
                            echo 'selected="selected"';
                          }else echo ""; ?> value="1">Nam</option>
                          <option <?php if ($row['GioiTinh'] == 0) {
                            echo 'selected="selected"';
                          }else echo ""; ?> value="0">Nữ</option>
                        </select>

                        <select class="form-control1 option-user" id="anhien" name="idGroup" aria-invalid="false">
                          <option <?php if ($row['idGroup'] == 0) {
                            echo 'selected="selected"';
                          }else echo ""; ?> value="0">Thành viên</option>
                          <option <?php if ($row['idGroup'] == 1) {
                            echo 'selected="selected"';
                          }else echo ""; ?> value="1">Admin</option>
                        </select>
                    </div>
        <div class="col-md-6">
                  <button type="submit" class="btn btn-primary btn-User" style="width:190px;" id="btn-save" name="btn-save">Lưu</button>
                  <button type="reset" class="btn btn-default btn-User" style="width:190px;" id="btn-save" name="btn-delete">Xóa</button>
            </div>
        
      </div>
    </form>
            </div>        <!--profile-content-->
            </div>      <!--templatemo-content-->
          </div>        <!--templatemo-flex-row-->
        </div>      <!--templatemo-content-->
      </div>        <!--templatemo-flex-row-->
     <!--Footer-->
     <?php include "footer.php" ?>