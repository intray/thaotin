<?php 
    session_start();
    require_once("lib/connection.php"); 
?>
<?php 
    if (isset($_GET["p"])) {
        $p = $_GET["p"];
    }else{
        $p = "";
    }
 ?>
 <?php 
    // Đăng nhập
    if (isset($_POST["btnLogin"])) {
        $username = $_POST["txtUs"];
        $pass = $_POST["txtPs"];
        // $pass = md5($pass);
        $sql = mysql_query("select * from users where Username = '$username' and Password = '$pass'");
        if (mysql_num_rows($sql) == 1) {
            $row = mysql_fetch_array($sql);
            $_SESSION["idUser"] = $row['idUser'];
            $_SESSION["Password"] = $row['Password'];
            $_SESSION["HoTen"] = $row['HoTen'];
            $_SESSION["idGroup"] = $row['idGroup'];
            $_SESSION["Email"] = $row['Email'];
        }
    }
  ?>
<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>thaotin.net</title>
<link rel="icon" href="images/logotitle.jpg">
<link rel="stylesheet" type="text/css" href="css/layout1.css" />
<link rel="stylesheet" type="text/css" href="css/cssthem.css" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>

<body>
<div id="wrap-vp">
	<div id="header-vp">
        <a href="index.php">
    	   <div id="logo"><img id="logothaotin" src="images/logothaotin.jpg" /></div>
        </a>
        <?php 
            if (!isset($_SESSION["idUser"])) {
                include "blocks/login.php";
            }if (isset($_SESSION["idUser"]) && $_SESSION["idGroup"] == 1) {
                echo "<p class='admin'>Admin</p>";
                echo "<button class='btn-ad' style = float:left;><a href='admin'>Quản lý</a></button>";
                echo "<button class='btn-ad' style = float:left;><a href='dang-xuat.php'>Logout</a></button>";
            }
            if (isset($_SESSION["idUser"]) && $_SESSION["idGroup"] == 0){
                echo "<p class='thanhvien'>Thành viên</p>";
                echo "<p class='dangxuat' style = float:left;><a href='dang-xuat.php'>Logout</a></p>";
            }
         ?>
        
    </div>

     <div id="thongtin">
        <!--blocks/slide.php-->
        <!-- <?phpinclude "blocks/slide.php";?> -->
    </div>
    <div id="menu-vp"><?php //include "blocks/menu.php"; ?></div>
    <div id="menu-vptop">
    	<!--block/menu.php-->
        <?php include "blocks/menutop.php"; ?>
    </div>
      <div id="midheader-vp">
    	<div id="left">
        	<ul class="list_arrow_breakumb">
           </ul>
        </div>
        <div id="right">
			<!--blocks/thongtinchung.php-->
            <?php include "blocks/thongtinchung.php"; ?>
        </div>
    </div>
    <div class="clear"></div>

    <div id="slide-vp">
    	<!--blocks/top_trang_chu.php-->
        <?php include "blocks/top_trang_chu.php"; ?>
        <div id="slide-right">
        <!--blocks/quangcao_top_phai.php-->
        <?php include "blocks/quangcao_top_phai.php"; ?>
        </div>
    </div>

  	<div id="content-vp">
    	<div id="content-left">
		<!--blocks/cot_trai.php-->
        <?php include "blocks/cot_trai.php"; ?>
        </div>
        <div id="content-main">
			<!--PAGES-->
            <!-- Hiện thị tin theo user click -->
            <?php 
                switch ($p) {
                    case 'tintrongloai':
                        require_once ("pages/tintrongloai.php");
                        break;
                    case 'chitiettin':
                        require_once ("pages/chitiettin.php");
                        break;
                    case 'timkiem':
                        require_once ("pages/search.php");
                        break;
                    default:
                        require_once ("pages/trangchu.php");
                        break;
                }
             ?>
        </div>
        <div id="content-right">
		<!--blocks/cot_phai.php-->
        <?php include "blocks/cot_phai.php"; ?>
        </div>

    <div class="clear"></div>
    	
    </div>
    
    
    <div class="clear"></div>
    <div id="footer">
    	<!--blocks/footer.php-->
        <?php include "blocks/footer.php"; ?>
        
        <div class="ft-bot">
            <div class="bot1"><img id="logothaotin" src="images/logothaotin.jpg" /></div>
            <div class="bot2">
                    <p> Sine 2019 - by Intray - HAUI</p>
                    <p> Mọi chi tiết xin liên hệ: 0333132089</p>
            </div>
            <div class="bot3">
                
                  
            </div>
        </div>
    </div>
    
    
    
    
</div>

</body>
</html>
