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
    $idLT = $_GET["idLT"];

    $sql = mysql_query("SELECT * from loaitin where idLT = $idLT");
    $row = mysql_fetch_array($sql);
 ?>
<?php 
  if (isset($_POST["btn-update"])) { //kiem tra da an btn chua
    $TenLT = $_POST["tenlt"];
    $AnHien = $_POST["anhien"]; settype($AnHien, "int");
    $idTL = $_POST["theloai"]; settype($idTL, "int");
    
    $sql_update = mysql_query(" UPDATE loaitin SET Ten = '$TenLT', AnHien = '$AnHien', idTL = '$idTL' WHERE idLT = '$idLT' ");
    if ($sql_update) {
      header("location: loaitin.php");
    }
  }

 ?>
<!DOCTYPE html>
<html>
<?php include "menu.php" ?>
        <!--   Content  -->
          <h3 style="margin: 10px 20px; color:black;font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;text-align: center;"> Sửa loại tin </h3>  
    <form class="form-horizontal" method="POST">
      <div class="form-group">
        <div class="col-sm-6">
          <p> Tên loại tin</p>
          <input type="text" class="form-control" name="tenlt" id="tenlt" value="<?php echo $row['Ten']; ?>" placeholder="Tên loại tin">
        </div>
         <div class="col-md-2">
                        <select class="form-control" id="anhien" name="anhien" aria-invalid="false">
                          <option <?php if ($row['AnHien']=='1') echo 'selected="selected"'; else echo "";  ?> value="1">Hiện</option>
                          <option <?php if ($row['AnHien']=='0') echo 'selected="selected"'; else echo "";  ?> value="0">Ẩn</option>
                        </select>

                        <select class="form-control" id="theloai" name="theloai" aria-invalid="false">
                          <option <?php if ($row['idTL']=='1') echo 'selected="selected"'; else echo "";  ?> value="1">Xã Hội</option>
                          <option <?php if ($row['idTL']=='2') echo 'selected="selected"'; else echo "";  ?> value="2">Thế Giới</option>
                          <option <?php if ($row['idTL']=='3') echo 'selected="selected"'; else echo "";  ?> value="3">Kinh Doanh</option>
                          <option <?php if ($row['idTL']=='4') echo 'selected="selected"'; else echo "";  ?> value="4">Văn Hóa</option>
                          <option <?php if ($row['idTL']=='5') echo 'selected="selected"'; else echo "";  ?> value="5">Thể Thao</option>
                          <option <?php if ($row['idTL']=='6') echo 'selected="selected"'; else echo "";  ?> value="6">Pháp Luật</option>
                          <option <?php if ($row['idTL']=='7') echo 'selected="selected"'; else echo "";  ?> value="7">Đời Sống</option>
                          
                        </select>
                    </div> <!--Month-->
       

        <div class="col-md-6">
                  <button type="submit" class="btn btn-primary" style="width:190px;" id="btn-save" name="btn-update">Lưu</button>
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