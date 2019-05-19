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
                    <td><a href="" class="white-text templatemo-sort-by">ID tin </a></td>
                    <td><a href="" class="white-text templatemo-sort-by">Nội dung </a></td>
                    <td><a href="themTin.php" class="templatemo-edit-btn text-them">Thêm</a></td>
                  </tr>
                </thead>
		  	<?php
          $idTin = $_GET["idTin"];
				  $sql = mysql_query("SELECT tin.idTin, tin.Content
					FROM tin 
					WHERE idTin = $idTin");
				  while ($row = mysql_fetch_array($sql)) {
					ob_start();
			   ?>
			<tr>
			    <td>{idTin}</td>
			    <td><a href="chitietTin.php?idTin={idTin}"><?php echo $row["Content"]; ?></td>
			    <td>
			    	<a href="suaTin.php?idTin={idTin}" class="templatemo-edit-btn">Sửa</a> 
			    	<a href="xoaTin.php?idTin={idTin}" class="templatemo-edit-btn">Xóa</a>
			    </td>
			</tr>
			<?php 
					$s = ob_get_clean();
					$s = str_replace("{idTin}", $row["idTin"], $s);
					// $s = str_replace("{Ten}", $row["Ten"], $s);
					// $s = str_replace("{AnHien}", $row["AnHien"], $s);
					// $s = str_replace("{idTL}", $row["idTL"], $s);
					echo $s;
				}
			?>
		</table>
<div class="pagination-wrap">
            <ul class="pagination">
              <!--  -->
              <li>
                <a href="#" aria-label="Next">
                  <span aria-hidden="true"><i class="fa fa-play"></i></span>
                </a>
              </li>
            </ul>
          </div> 
          <?php include "footer.php" ?>