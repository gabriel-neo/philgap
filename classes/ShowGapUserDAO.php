<?php
	require_once ("ShowGapUserProd.php");
	require_once ("ShowGapUserServ.php");
	require_once ("ModeloDAO.php");
	
	class ShowGapUserDAO extends ModeloDAO{
		
		public static function getGapProdServ($id_user){
			// cria o sql
			$sql = "select id, uf, status, urgencia, produto as 'gap', especificacao as 'desc' from tb_gap_produto where id_user = ".$id_user." order by urgencia, status";
			// Executa o SQL na classe PAI (ModeloDAO)
			$rs = parent::query($sql);
			
			$gaps[0] = $rs;
			
			$sql2 = "select id, uf, status, urgencia, especialidade as 'gap', foco as 'desc' from tb_gap_servico where id_user = ".$id_user." order by urgencia, status";
			// Executa o SQL na classe PAI (ModeloDAO)
			$rs2 = parent::query($sql2);
			
			$gaps[1] = $rs2;
			
			return $gaps;
		}
	}
?>