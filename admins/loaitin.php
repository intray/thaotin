<?php require_once("../lib/connection.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin-thaotin</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../css/cssadmin.css">
</head>
<body>
	<div id="clear"></div>
	<div class="menu-admin">
		<?php include "menu.php"; ?>
		<button type="button" href="index.php" class="btn btn-default">Quay về</button>
	</div>

<div class="content-menu">
		<table class="table table-hover table-bordered">
	  		 <tr>
			    <th>ID Loại tin</th>
			    <th>Tên loại tin</th> 
			    <th>Tên không dấu</th>
			    <th>Thứ Tự</th>
			    <th>Ẩn hiện</th>
			    <th>ID Thể loại</th>
				<td><a href="themLoaiTin.php">Thêm</a></td>
		  	</tr>
		  	<?php
		  		$page = 1;
		  		$limit = 14;

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

				$sql = mysql_query("SELECT * FROM loaitin order by idLT DESC LIMIT $start,$limit");
				while ($row = mysql_fetch_array($sql)) {
					ob_start();
			?>
			<tr>
			    <td>{idLT}</td>
			    <td>{Ten}</td>
			    <td>{Ten_KhongDau}</td>
			    <td>{ThuTu}</td>
			    <td>{AnHien}</td>
			    <td>{idTL}</td>
			    <td>
			    	<a href="suaLoaiTin.php?idLT={idLT}">Sửa |</a> 
			    	<a onclick="confirm('Bạn chắc chắn muốn xóa !!!');" href="xoaLoaiTin.php?idLT={idLT}">Xóa</a>
			    </td>
			</tr>
			<?php 
					$s = ob_get_clean();
					$s = str_replace("{idLT}", $row["idLT"], $s);
					$s = str_replace("{Ten}", $row["Ten"], $s);
					$s = str_replace("{Ten_KhongDau}", $row["Ten_KhongDau"], $s);
					$s = str_replace("{ThuTu}", $row["ThuTu"], $s);
					$s = str_replace("{AnHien}", $row["AnHien"], $s);
					$s = str_replace("{idTL}", $row["idTL"], $s);
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
	</div>
	<div id="clear"></div>
	</body>
</html>