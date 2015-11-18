<?php
	require_once ("PhilGapController.php");
	require_once ("GapUserDAO.php");
	
	class GapUserController extends PhilGapController{
		
		//captura os dados postados pelo fornecedor para tal gap e insere no banco de dados
		public function GetGap(){
			return $gaps = GapUserDAO::getGapProdServ($_SESSION['id']);
		}
	}
?>