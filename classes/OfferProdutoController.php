<?php
	require_once ("PhilGapController.php");
	require_once ("OfferProdutoDAO.php");
	
	class OfferProdutoController extends PhilGapController{
		
		//captura os dados submetidos pelo usuário e valida as credenciais através do modelo
		public function Ofertar(){
			
			$id_gapprod = $_POST['idgap'];
			$nome = $_SESSION['nome'];
			$produto = $_POST['oproduto'];
			$especificacao = $_POST['oespec'];
			$marca = $_POST['omarca'];
			$cor = $_POST['ocor'];
			$valor = $_POST['ovalor'];
			$formaenvio = $_POST['oentrega'];
			$custoenvio = $_POST['oentregavalor'];
			$link = $_POST['olink'];
			
			$offerproduto = new OfferProduto($id_gapprod, $nome, $produto, $especificacao, $marca, $cor, $valor, $formaenvio, $custoenvio, $link);
			OfferProdutoDAO::insertOfferProduto($offerproduto);
			
			$_SESSION['erro2'] = "Oferta submetida com sucesso!";
			
			header("location:./findgap.php");
		}
		
	}
?>