<?php
	require_once ("GapUserProd.php");
	require_once ("GapUserServ.php");
	require_once ("ModeloDAO.php");
	
	class GapUserDAO extends ModeloDAO{
		
		public static function getGapProdServ($id_user){
			// cria o sql
			$sql = "select * from view_gapuserprod where id_user = ".$id_user." order by urgencia, status desc";
			// Executa o SQL na classe PAI (ModeloDAO)
			$rs = parent::query($sql);
			
			$gaps[0] = $rs;
			

			$sql2 = "select * from view_gapuserserv where id_user = ".$id_user." order by urgencia, status desc";
			// Executa o SQL na classe PAI (ModeloDAO)
			$rs2 = parent::query($sql2);
			
			$gaps[1] = $rs2;
			
			return $gaps;
		}
	}
?>