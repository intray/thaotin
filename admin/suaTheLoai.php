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
    $AnHien = $_POST["anhien"]; settype($AnHien, "int");
    $idTL = $_GET["idTL"];
    
    $sql_update = mysql_query(" UPDATE theloai SET TenTL = '$TenTL', AnHien = '$AnHien' WHERE idTL = '$idTL' ");
    if ($sql_update) {
      header("location: index.php");
    }
  }

 ?>
<!DOCTYPE html>
<html>
<?php include "menu.php" ?>

        <!--   Content  -->
          <h3 style="margin: 10px 20px; color:black;font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;text-align: center;"> Sửa thể loại </h3>  
    <form class="form-horizontal" method="POST">
      <div class="form-group">
        <div class="col-sm-6">
          <p> Tên thể loại</p>
          <input type="text" class="form-control" name="tentl" id="tentl" placeholder="Tên thể loại" 
              value="<?php echo $row['TenTL']; ?>">
        </div>
         <div class="col-md-2">
                        <select class="form-control" id="anhien" name="anhien" aria-invalid="false">
                          <option <?php if ($row['AnHien']=='1') echo 'selected="selected"'; else echo "";  ?> value="1">Hiện</option>
                          <option <?php if ($row['AnHien']=='0') echo 'selected="selected"'; else echo "";  ?> value="0">Ẩn</option>
                        </select>
                    </div> <!--Month-->
       
        <div class="col-md-6">
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
