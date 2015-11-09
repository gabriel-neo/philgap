<?php
	require_once ("PhilGapController.php");
	require_once ("ShowGapUserDAO.php");
	
	class ShowGapUserController extends PhilGapController{
		
		//captura os dados postados pelo fornecedor para tal gap e insere no banco de dados
		public function GetGap(){
			$gaps = ShowGapUserDAO::getGapProdServ($_SESSION['id']);
			$_SESSION['gaps'] = $gaps;
		}
	}
?>