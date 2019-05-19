<?php require_once("lib/connection.php"); ?>


<!-- box cat -->
<div class="box-cat">
	<div class="cat">
        <?php $idLT = 1; ?>
        <?php 
            $sql = mysql_query("select Ten from loaitin where idLT = $idLT");
            while ($row = mysql_fetch_array($sql)) {
        ?>
    	<div class="main-cat">
        	<a href="index.php?p=tintrongloai&idLT=1"><?php echo $row['Ten']; ?></a>
        </div>
        <?php } ?>
        <div class="clear"></div>
        <div class="cat-content">
             <?php 
                $sql = mysql_query("select * from tin where idLT=$idLT order by SoLanXem DESC LIMIT 0,1");
                while ($row = mysql_fetch_array($sql))
                    {
             ?>
        	<div class="col1">
            	<div class="news">
                <h3 class="title" ><a href="index.php?p=chitiettin&idTin=<?php echo $row['idTin']; ?>"><?php echo $row['TieuDe']; ?></a></h3>
                  <img class="images_news" src="upload/tintuc/<?php echo $row['urlHinh']; ?>" align="left" />
                    <div class="des"><?php echo $row['TomTat']; ?></div>
    
                    <div class="clear"></div>
                   
				</div>
            </div>
            <?php } ?>

            <?php 
                $sql = mysql_query("select * from tin where idLT=$idLT order by SoLanXem DESC LIMIT 1,4");
                while ($row = mysql_fetch_array($sql))
                    {
             ?>
            <div class="col2">
                <h3 class="tlq"><a href="index.php?p=chitiettin&idTin=<?php echo $row['idTin']; ?>"><?php echo $row['TieuDe']; ?></a></h3>
            </div> 
            <?php } ?>
        </div>
    
    </div>

</div>
<div class="clear"></div>
<!-- //box cat -->

<!-- box cat -->
<div class="box-cat">
    <div class="cat">
        <?php $idLT = 2; ?>
        <?php 
            $sql = mysql_query("select Ten from loaitin where idLT = $idLT");
            while ($row = mysql_fetch_array($sql)) {
        ?>
        <div class="main-cat">
            <a href="index.php?p=tintrongloai&idLT=2"><?php echo $row['Ten']; ?></a>
        </div>
        <?php } ?>
        <div class="clear"></div>
        <div class="cat-content">
             <?php 
                $sql = mysql_query("select * from tin where idLT=$idLT order by SoLanXem DESC LIMIT 0,1");
                while ($row = mysql_fetch_array($sql))
                    {
             ?>
            <div class="col1">
                <div class="news">
                <h3 class="title" ><a href="index.php?p=chitiettin&idTin=<?php echo $row['idTin']; ?>"><?php echo $row['TieuDe']; ?></a></h3>
                  <img class="images_news" src="upload/tintuc/<?php echo $row['urlHinh']; ?>" align="left" />
                    <div class="des"><?php echo $row['TomTat']; ?></div>
    
                    <div class="clear"></div>
                   
                </div>
            </div>
            <?php } ?>

            <?php 
                $sql = mysql_query("select * from tin where idLT=$idLT order by SoLanXem DESC LIMIT 1,4");
                while ($row = mysql_fetch_array($sql))
                    {
             ?>
            <div class="col2">
                <h3 class="tlq"><a href="index.php?p=chitiettin&idTin=<?php echo $row['idTin']; ?>"><?php echo $row['TieuDe']; ?></a></h3>
            </div> 
            <?php } ?>
        </div>
    
    </div>

</div>
<div class="clear"></div>
<!-- //box cat -->

<!-- box cat -->
<div class="box-cat">
    <div class="cat">
        <?php $idLT = 3; ?>
        <?php 
            $sql = mysql_query("select Ten from loaitin where idLT = $idLT");
            while ($row = mysql_fetch_array($sql)) {
        ?>
        <div class="main-cat">
            <a href="index.php?p=tintrongloai&idLT=3"><?php echo $row['Ten']; ?></a>
        </div>
        <?php } ?>
        <div class="clear"></div>
        <div class="cat-content">
             <?php 
                $sql = mysql_query("select * from tin where idLT=$idLT order by SoLanXem DESC LIMIT 0,1");
                while ($row = mysql_fetch_array($sql))
                    {
             ?>
            <div class="col1">
                <div class="news">
                <h3 class="title" ><a href="index.php?p=chitiettin&idTin=<?php echo $row['idTin']; ?>"><?php echo $row['TieuDe']; ?></a></h3>
                  <img class="images_news" src="upload/tintuc/<?php echo $row['urlHinh']; ?>" align="left" />
                    <div class="des"><?php echo $row['TomTat']; ?></div>
    
                    <div class="clear"></div>
                   
                </div>
            </div>
            <?php } ?>

            <?php 
                $sql = mysql_query("select * from tin where idLT=$idLT order by SoLanXem DESC LIMIT 1,4");
                while ($row = mysql_fetch_array($sql))
                    {
             ?>
            <div class="col2">
                <h3 class="tlq"><a href="index.php?p=chitiettin&idTin=<?php echo $row['idTin']; ?>"><?php echo $row['TieuDe']; ?></a></h3>
            </div> 
            <?php } ?>
        </div>
    
    </div>

</div>
<div class="clear"></div>
<!-- //box cat -->