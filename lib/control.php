<?php 
	function TinMoi_Theo_LoaiTin($idLT){
		echo $sql = "select * from where idLT = $idLT tin order by SoLanXem DESC LIMIT 0,1 ";
		return mysql_query($sql);
	}
 ?>