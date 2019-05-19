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
    $TenLT = $_POST["tenlt"];
    $AnHien = $_POST["anhien"]; settype($AnHien, "int");
    $idTL = $_POST["theloai"]; settype($idTL, "int");
    
    $sql = " INSERT INTO loaitin (Ten, AnHien, idTL) VALUES ('$TenLT', '$AnHien', '$idTL') ";
    mysql_query($sql);
    header("location: loaitin.php");
  }

 ?>
<!DOCTYPE html>
<html>
<?php include "menu.php" ?>

        <!--   Content  -->
          <h3 style="margin: 10px 20px; color:black;font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;text-align: center;"> Thêm loại tin </h3>  
    <form class="form-horizontal" method="POST">
      <div class="form-group">
        <div class="col-sm-6">
          <p> Tên loại tin</p>
          <input type="text" class="form-control" name="tenlt" id="tenlt" placeholder="Tên loại tin">
        </div>
         <div class="col-md-2">
                        <select class="form-control" id="anhien" name="anhien" aria-invalid="false">
                          <option value="1">Hiện</option>
                          <option value="0">Ẩn</option>
                        </select>

                        <select class="form-control" id="theloai" name="theloai" aria-invalid="false">
                          <?php 
                            $sqli = mysql_query("SELECT * FROM theloai");
                            while ($row = mysql_fetch_array($sqli)) {
                              ob_start();
                          ?>
                          <option value="<?php echo $row["idTL"]; ?>"><?php echo $row["TenTL"]; ?></option>
                          <?php } ?>
                        </select>
                    </div> <!--Month-->
       

        <div class="col-md-6">
                  <button type="submit" class="btn btn-primary" style="width:190px;" id="btn-save" name="btn-save">Lưu</button>
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