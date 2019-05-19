<?php require_once("lib/connection.php"); ?>
<div id="slide-left">

          <?php 
            $sql= mysql_query("select * from tin order by idTin DESC LIMIT 0,1");
            while ($row = mysql_fetch_array($sql)) 
              {
           ?>
        	<div id="slideleft-main">
                <img src="upload/tintuc/<?php echo $row['urlHinh']; ?>"  /><br />
                <h2 class="title"><a href="index.php?p=chitiettin&idTin=<?php echo $row['idTin']; ?>"><?php echo $row["TieuDe"]; ?></a> </h2>
                <div class="des">
                   <?php echo $row["TomTat"]; ?>
                </div>
        	</div>
          <?php } ?>
            <div id="slideleft-scroll">
            
			<div id="gocnhin">
                <img alt="" src="images/luffy.png" width="100%"></a>
                <div class="title_news"></div>
            </div>
                
            </div>
          
</div>

