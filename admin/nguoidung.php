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
                    <td><a href="" class="white-text templatemo-sort-by">ID người dùng </a></td>
                    <td><a href="" class="white-text templatemo-sort-by">Họ tên người dùng </a></td>
                    <td><a href="" class="white-text templatemo-sort-by">Tên đăng nhập </a></td>
                    <td><a href="" class="white-text templatemo-sort-by">Mật khẩu </a></td>
                    <td><a href="" class="white-text templatemo-sort-by">Địa chỉ </a></td>
                    <td><a href="" class="white-text templatemo-sort-by">Điện thoại </a></td>
                    <td><a href="" class="white-text templatemo-sort-by">Email </a></td>
                    <td><a href="" class="white-text templatemo-sort-by">Ngày đăng ký </a></td>
                    <td><a href="" class="white-text templatemo-sort-by">Quyền </a></td>
                    <!-- <td><a href="" class="white-text templatemo-sort-by">Ngày sinh </a></td> -->
                    <td><a href="" class="white-text templatemo-sort-by">Giới tính </a></td>
                    <td><a href="themNguoidung.php" class="templatemo-edit-btn text-them">Thêm</a></td>
                  </tr>
                </thead>
		  	<?php
		  		$page = 1;
		  		$limit = 4;

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

				$sql = mysql_query("SELECT * FROM users ORDER BY idUser DESC LIMIT $start,$limit");
				while ($row = mysql_fetch_array($sql)) {
					ob_start();
			?>
			<tr>
			    <td>{idUser}</td>
			    <td><?php echo $row["HoTen"] ?></td>
			    <td><?php echo $row["Username"] ?></td>
			    <td><?php echo $row["Password"] ?></td>
			    <td><?php echo $row["DiaChi"] ?></td>
			    <td><?php echo $row["Dienthoai"]; ?></td>
			    <td><?php echo $row["Email"]; ?></td>
			    <td><?php echo $row["NgayDangKy"]; ?></td>
			    <td>
			    	<?php if ($row['idGroup']=='1') echo 'Quản trị'; else echo "";  ?>
                    <?php if ($row['idGroup']=='0') echo 'Thành viên'; else echo "";  ?>
			    </td>
			    <td>
			    	<?php if ($row['GioiTinh']=='1') echo 'Nam'; else echo "";  ?>
                    <?php if ($row['GioiTinh']=='0') echo 'Nữ'; else echo "";  ?>
			    </td>
			    <td>
			    	<a href="suaNguoidung.php?idUser={idUser}" class="templatemo-edit-btn">Sửa</a> 
			    	<a href="xoaNguoidung.php?idUser={idUser}" class="templatemo-edit-btn">Xóa</a>
			    </td>
			</tr>
			<?php 
					$s = ob_get_clean();
					$s = str_replace("{idUser}", $row["idUser"], $s);
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
				    <li <?php if($page == $i) echo "class='active'"; ?> ><a href="nguoidung.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
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