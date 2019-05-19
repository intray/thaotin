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
 <?php include "menu.php" ?>
        <div class="templatemo-content-container">
          <div class="templatemo-content-widget no-padding">
            <div class="panel panel-default table-responsive">
              <table class="table table-striped table-bordered templatemo-user-table">
                <thead>
                  <tr>
                    <td><a href="" class="white-text templatemo-sort-by"># </a></td>
                    <td><a href="" class="white-text templatemo-sort-by">Tên thể loại </a></td>
                    <td><a href="" class="white-text templatemo-sort-by">Ẩn hiện </a></td>
                    <td><a href="themTheloai.php" class="templatemo-edit-btn text-them">Thêm</a></td>
                  </tr>
                </thead>
                <?php 
                  $sql = mysql_query("select * from theloai order by idTL DESC");
                  while ($row = mysql_fetch_array($sql)) {
                    ob_start();
                ?>
                <tbody>
                  <tr>
                    <td>{idTL}</td>
                  <td>{TenTL}</td>
                  <td>
                    <?php if ($row['AnHien']=='1') echo 'Hiện'; else echo "";  ?>
                    <?php if ($row['AnHien']=='0') echo 'Ẩn'; else echo "";  ?>
                  </td>
                    <td>
                      <a href="suaTheLoai.php?idTL={idTL}" class="templatemo-edit-btn">Sửa</a>
                      <a  href="xoaTheLoai.php?idTL={idTL}" class="templatemo-edit-btn">Xóa</a>
                    </td>
                  </tr>                
                </tbody>
                <?php 
                  $s = ob_get_clean();
                  $s = str_replace("{idTL}", $row["idTL"], $s);
                  $s = str_replace("{TenTL}", $row["TenTL"], $s);
                  // $s = str_replace("{AnHien}", $row["AnHien"], $s);
                  echo $s;
                } 
              ?>
              </table>
            </div>                          
          </div>
          <!-- href="xoaTheLoai.php?idTL={idTL}"   -->        
          <!-- <script>
            function myFunction() {
              var
              var r = confirm("Bạn có chắc chắn muốn xóa!!!");
              if (r == true) {
                txt = "You pressed OK!";
              } else {
                txt = "You pressed Cancel!";
              }
            }
          </script> -->
             
          <div class="pagination-wrap">
            <ul class="pagination">
              <li><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li class="active"><a href="#">3 <span class="sr-only">(current)</span></a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">5</a></li>
              <li>
                <a href="#" aria-label="Next">
                  <span aria-hidden="true"><i class="fa fa-play"></i></span>
                </a>
              </li>
            </ul>
          </div> 
         <?php include "footer.php" ?>