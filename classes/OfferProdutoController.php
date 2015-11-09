<?php
	require_once ("PhilGapController.php");
	require_once ("OfferProdutoDAO.php");
	
	class OfferProdutoController extends PhilGapController{
		
		//captura os dados postados pelo fornecedor para tal gap e insere no banco de dados
		public function Ofertar(){
			
			$offerproduto = new OfferProduto($_POST['idgap'], $_SESSION['nome'], $_POST['oproduto'], $_POST['oespec'], $_POST['omarca'], $_POST['ocor'], $_POST['ovalor'], $_POST['oentrega'], $_POST['oentregavalor'], $_POST['olink']);
			OfferProdutoDAO::insertOfferProduto($offerproduto);
			
			$_SESSION['erro2'] = "Oferta submetida com sucesso!";
			
			header("location:./findgap.php");
		}
	}
?>