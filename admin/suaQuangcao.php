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
    $idQC = $_GET["idQC"];

    $sql = mysql_query("SELECT * from quangcao where idQC = $idQC");
    $row = mysql_fetch_array($sql);
 ?>
<?php 
  if (isset($_POST["btn-update"])) { //kiem tra da an btn chua
    $mota = $_POST["mota"];
    $link = $_POST["link"];
    
    $sql_update = mysql_query(" UPDATE quangcao SET Mota = '$mota', Url = '$link' WHERE idQC = '$idQC' ");
    if ($sql_update) {
      header("location: quangcao.php");
    }
  }

 ?>
<!DOCTYPE html>
<html>
<?php include "menu.php" ?>

        <!--   Content  -->
          <h3 style="margin: 10px 20px; color:black;font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;text-align: center;"> Sửa quảng cáo </h3>  
    <form class="form-horizontal" method="POST">
      <div class="form-group">
        <div class="col-sm-6">
          <p> Mô tả</p>
          <input type="text" class="form-control" name="mota" id="mota" placeholder="Mô tả quảng cáo" value="<?php echo $row['MoTa']; ?>">
        </div>
        <div class="col-sm-6 input-link">
          <p> Link liên kết</p>
          <input type="text" class="form-control" name="link" id="link" placeholder="Link liên kết" value="<?php echo $row['Url']; ?>">
        </div>
        
        <div class="col-md-6 " >
                  <button type="submit" class="btn btn-primary" style="width:190px;" id="btn-update" name="btn-update">Lưu</button>
                  <button type="reset" class="btn btn-default" style="width:190px;" id="btn-save" name="btn-delete">Xóa</button>
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