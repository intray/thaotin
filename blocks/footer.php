<div class="thongtin-title">
	<div class="right">
          <!-- <a href="#"><span class="SetHomePage ico_respone_01">&nbsp;</span>Đặt VnExpress làm trang chủ</a> -->
          
          <a href="#"><span class="top">&nbsp;</span>Về đầu trang</a>
    </div>
</div>
<div class="thongtin-content">
 <?php 
                $sql = mysql_query("select * from theloai");
                while ($row = mysql_fetch_array($sql)) {
                  $idTL = $row['idTL']; 
               ?>
	           <ul class="ulBlockMenu">
                <li class="liFirst">
                   <h3>
                      <a style="color: #b7bad0;" class="mnu_giaoduc" href=""><?php echo $row['TenTL']; ?></a>
                   </h3>
                </li>
                <?php 
                  $sql_LT = mysql_query("select * from loaitin where idTL = $idTL");
                  while ($row_TL = mysql_fetch_array($sql_LT)) {
                 ?>
                <li class="liFollow">
                   <h2>
                      <a href="index.php?p=tintrongloai&idLT=<?php echo $row_TL['idLT']; ?>"><?php echo $row_TL['Ten']; ?></a>
                   </h2>
                </li> 
                <?php } ?>     
             </ul> 
<?php } ?>
</div>




