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
                    <td><a href="" class="white-text templatemo-sort-by">Tiêu đề </a></td>
                    <td><a href="" class="white-text templatemo-sort-by">Hình </a></td>
                    <td><a href="" class="white-text templatemo-sort-by">ID Admin tạo</a></td>
                    <td><a href="" class="white-text templatemo-sort-by">Loại tin </a></td>
                    <td><a href="" class="white-text templatemo-sort-by">Thể loại </a></td>
                    <td><a href="" class="white-text templatemo-sort-by">Số lần xem </a></td>
                    <td><a href="" class="white-text templatemo-sort-by">Ẩn hiện </a></td>
                    <td><a href="themTin.php" class="templatemo-edit-btn text-them">Thêm</a></td>
                  </tr>
                </thead>
		  	<?php
		  		$page = 1;
		  		$limit = 4;

		  		$arrs_list = mysql_query("select idTin from tin");
				$total_record = mysql_num_rows($arrs_list);//tính tổng số bản ghi có trong bảng loaitin
				
				$total_page=ceil($total_record/$limit);//tính tổng số trang sẽ chia
		 
				//xem trang có vượt giới hạn không:
				if(isset($_GET["page"]))
					$page=$_GET["page"];//nếu biến $_GET["page"] tồn tại thì trang hiện tại là trang $_GET["page"]
				if($page<1) $page=1; //nếu trang hiện tại nhỏ hơn 1 thì gán bằng 1
				if($page>$total_page) $page=$total_page;//nếu trang hiện tại vượt quá số trang được chia thì sẽ bằng trang cuối cùng
		 
				//tính start (vị trí bản ghi sẽ bắt đầu lấy):
				$start=($page-1)*$limit;
				
				//lấy ra danh sách và gán vào biến $arrs:

				$sql = mysql_query("SELECT tin.idTin, tin.TieuDe, tin.urlHinh, tin.idUser, theloai.TenTL, loaitin.Ten, tin.SoLanXem, tin.AnHien, users.HoTen
					FROM tin 
					INNER JOIN loaitin ON tin.idLT = loaitin.idLT
					INNER JOIN theloai ON tin.idTL = theloai.idTL
					INNER JOIN users ON tin.idUser = users.idUser ORDER BY idTin DESC LIMIT $start,$limit");
				while ($row = mysql_fetch_array($sql)) {
					ob_start();
			?>
			<tr>
			    <td>{idTin}</td>
			    <td><a href="chitietTin.php?idTin={idTin}"><?php echo $row["TieuDe"] ?></a></td>
			    <td><a href="chitietTin.php?idTin={idTin}"><img src="../upload/tintuc/<?php echo $row["urlHinh"]?>"></td>
			    <td><a href="chitietTin.php?idTin={idTin}"><?php echo $row["HoTen"] ?></td>
			    <td><a href="chitietTin.php?idTin={idTin}"><?php echo $row["Ten"]; ?></td>
			    <td><a href="chitietTin.php?idTin={idTin}"><?php echo $row["TenTL"]; ?></td>
			    <td><a href="chitietTin.php?idTin={idTin}"><?php echo $row["SoLanXem"]; ?></td>
			    <td>
			    	<?php if ($row['AnHien']=='1') echo 'Hiện'; else echo "";  ?>
                    <?php if ($row['AnHien']=='0') echo 'Ẩn'; else echo "";  ?>
			    </td>
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
              <?php for ($i=1; $i <= $total_page ; $i++) {  ?>
				    <li <?php if($page == $i) echo "class='active'"; ?> ><a href="tin.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
              <!-- <li><a href="#">1</a></li> -->
          	  <?php } ?>
              <li>
                <a href="#" aria-label="Next">
                  <span aria-hidden="true"><i class="fa fa-play"></i></span>
                </a>
              </li>
            </ul>
          </div> 
          <?php include "footer.php" ?>