<div class="box-cat">

	<div class="cat">
         <?php 
            $sql = mysql_query("select * from theloai");
            while ($row = mysql_fetch_array($sql)) {
                $idTL = $row['idTL'];
        ?>
        <div class="clear"></div>
    	<div class="main-cat">
        	<a href="index.php?p=tintrongloai&idLT=<?php echo $row['idTL'] ?>"><?php echo $row['TenTL']; ?></a>
        </div>
        <?php 
            $sql_LT = mysql_query("select * from loaitin where idTL = $idTL");
            while ($row_LT = mysql_fetch_array($sql_LT)) {
         ?>
        <div class="child-cat">
        	<a href="index.php?p=tintrongloai&idLT=<?php echo $row_LT['idLT']; ?>"><?php echo $row_LT['Ten']; ?></a>
        </div>
        <?php } ?>
        <div class="clear"></div>
        <?php 
            $sql_T = mysql_query("select * FROM tin WHERE idLT = $idTL ORDER BY idTin DESC LIMIT 0,1");
            while ($row_T = mysql_fetch_array($sql_T)) {
         ?>
        <div class="cat-content">
        	<div class="col1">
            	<div class="news">
                    <h3 class="title" ><a href="index.php?p=chitiettin&idTin=<?php echo $row_T['idTin']; ?>"><?php echo $row_T['TieuDe']; ?> </a></h3>
                    <img class="images_news" src="upload/tintuc/<?php echo $row_T['urlHinh']; ?>" align="left" />
                    <div class="des"><?php echo $row_T['TomTat']; ?> </div>
                    <div class="clear"></div>
                   
				</div>
            </div>
            <?php 
                $sql_T = mysql_query("select * FROM tin WHERE idLT = $idTL ORDER BY idTin DESC LIMIT 1,3");
                while ($row_T = mysql_fetch_array($sql_T)) {
            ?>
            <div id="top3-trangchu">
                <p><a href="index.php?p=chitiettin&idTin=<?php echo $row_T['idTin']; ?>"><?php echo $row_T['TieuDe']; ?></a></p>
             </div>
            <?php } ?> 
        </div>
    <?php } ?>
    <?php } ?>
    </div>
</div>

<div class="clear"></div>


<!-- box cat-->






