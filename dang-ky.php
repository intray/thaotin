<?php require_once("lib/connection.php"); ?>
<?php 
  if (isset($_POST["btn-submit"])) { //kiem tra da an btn chua
    $hoten = $_POST["hoten"];
    $username = $_POST["username"];
    $pass = $_POST["pass"];
    $dienthoai = $_POST["dienthoai"];
    $diachi = $_POST["diachi"];
    $email = $_POST["email"];
    $gioitinh = $_POST["gioitinh"]; settype($gioitinh, "int");
    
    $sql = " INSERT INTO users (HoTen, Username, Password, DiaChi, Dienthoai, Email, GioiTinh) VALUES ('$hoten', '$username', '$pass', '$diachi', '$dienthoai', '$email', '$gioitinh') ";
    mysql_query($sql);
    header("location: index.php");
  }

 ?>
<html>
    <head>
        <title>Đăng kí</title>
        <link rel="stylesheet" href="css/css/css-dang-ky.css">
        <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
        <link href="//fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700,800&amp;subset=latin-ext" rel="stylesheet">
    </head>
    <body>
        <form method="POST">
            <div class="to">
                <div class="form">
                    <h2>Đăng ký</h2>
                        <i class="fab fa-app-store-ios"></i>
                        <label >Họ Tên</label>
                        <input type="text" class="form-control" name="hoten" id="link">
                        <label >Tên Đăng Nhập</label>
                        <input type="text" class="form-control" name="username" id="link">
                        <label >Mật Khẩu</label>
                        <input type="text" class="form-control" name="pass" id="link" >
                        <label >Điện Thoại</label>
                        <input type="text" class="form-control" name="dienthoai" id="link">
                        <label >Địa Chỉ</label>
                        <input type="text" class="form-control" name="diachi" id="link">
                        <label >Email</label>
                        <input type="text" class="form-control" name="email" id="link">
                        <label >Giới Tính</label>
                        <select class="form-control" id="gioitinh" name="gioitinh" aria-invalid="false">
                          <option value="1">Nam</option>
                          <option value="0">Nữ</option>
                        </select>
                        <input class="btn_dangky" id="submit" type="submit" name="btn-submit" value="Đăng ký">
                        <h6 class="quayve"><a href="index.php">Quay về</a></h6>
                </div>                
            </div>
        </form>
    </body>
</html>