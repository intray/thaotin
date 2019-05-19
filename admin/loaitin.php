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
                    <td><a href="" class="white-text templatemo-sort-by">ID loại tin </a></td>
                    <td><a href="" class="white-text templatemo-sort-by">Tên loại tin </a></td>
                    <td><a href="" class="white-text templatemo-sort-by">Ẩn hiện </a></td>
                    <td><a href="" class="white-text templatemo-sort-by">Tên thể loại </a></td>
                    <td><a href="themLoaitin.php" class="templatemo-edit-btn text-them">Thêm</a></td>
                  </tr>
                </thead>
		  	<?php
		  		$page = 1;
		  		$limit = 10;

		  		$arrs_list = mysql_query("select idLT from loaitin");
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

				$sql = mysql_query("SELECT idLT, Ten, loaitin.AnHien, TenTL FROM loaitin inner join theloai on loaitin.idTL = theloai.idTL order by loaitin.idTL DESC LIMIT $start,$limit");
				while ($row = mysql_fetch_array($sql)) {
					ob_start();
			?>
			<tr>
			    <td>{idLT}</td>
			    <td>{Ten}</td>
			    <td>
			    	<?php if ($row['AnHien']=='1') echo 'Hiện'; else echo "";  ?>
                    <?php if ($row['AnHien']=='0') echo 'Ẩn'; else echo "";  ?>
			    </td>
			    <td><?php echo $row["TenTL"]; ?></td>
			    <td>
			    	<a href="suaLoaiTin.php?idLT={idLT}" class="templatemo-edit-btn">Sửa</a> 
			    	<a href="xoaLoaiTin.php?idLT={idLT}" class="templatemo-edit-btn">Xóa</a>
			    </td>
			</tr>
			<?php 
					$s = ob_get_clean();
					$s = str_replace("{idLT}", $row["idLT"], $s);
					$s = str_replace("{Ten}", $row["Ten"], $s);
					// $s = str_replace("{AnHien}", $row["AnHien"], $s);
					// $s = str_replace("{idTL}", $row["idTL"], $s);
					echo $s;
				}
			?>
		</table>
<div class="pagination-wrap">
            <ul class="pagination">
              <?php for ($i=1; $i <= $total_page ; $i++) {  ?>
				    <li <?php if($page == $i) echo "class='active'"; ?> ><a href="loaitin.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
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