<?php require_once("lib/connection.php"); ?>
<div class="box-cat">
	<div class="cat">
    	<div class="main-cat">
        	<a href="#">Tin xem nhiều</a>
        </div>
        <?php 
            $sql = mysql_query("select * from tin order by SoLanXem DESC LIMIT 0,5");
            while ($row = mysql_fetch_array($sql))
                {
         ?>
       
        <div class="clear"></div>
        <div class="cat-content">
        	
            <div class="col1">
            	<div class="news">
                  <img class="images_news" src="upload/tintuc/<?php echo $row['urlHinh']; ?>"  />
                    <h3 class="title" ><a href="index.php?p=chitiettin&idTin=<?php echo $row['idTin']; ?>"><?php echo $row['TieuDe']; ?></a>
                        <i class="fas fa-eye"><?php echo $row['SoLanXem']; ?></i>
                    </h3>
                    <div class="clear"></div>
				</div>
            </div>
            
        </div>
        <?php } ?>
    </div>
</div>
<div class="clear"></div>

