<?php 
    function loaitin($idLT){
        $sql = "select * from tin where idLT = $idLT limit 0,10";
        return mysql_query($sql);
    }
 ?>
 <?php 
    if (isset($_GET["idLT"])) {
        $idLT = $_GET["idLT"];
        settype($idLT, "int");
    }else{
        $idLT = 1;
    }
  ?>
<div class="box-cat">
	<div class="cat1">
    	<?php $data = loaitin($idLT);
            while ($row = mysql_fetch_array($data)) {
        ?>
        <div class="clear"></div>
        <div class="cat-content">
        	<div class="col0 col1">
            	<div class="news">
                    <h3 class="title" ><a href="index.php?p=chitiettin&idTin=<?php echo $row['idTin']; ?>"><?php echo $row['TieuDe']; ?> </a></h3>
                    <img class="images_news" src="upload/tintuc/<?php echo $row['urlHinh']; ?>" align="left" />
                    <div class="des"><?php echo $row['TomTat']; ?> </div>
                    <div class="clear"></div>
                   
				</div>
            </div>
            
        </div>
        <?php } ?>
    </div>
</div>

<!-- box cat-->