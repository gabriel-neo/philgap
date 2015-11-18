<?php
	require_once ("PhilGapController.php");
	require_once ("OfferServicoDAO.php");
	
	class OfferServicoController extends PhilGapController{
		
		//captura os dados submetidos pelo usuário e valida as credenciais através do modelo
		public function Ofertar(){
			
			$id_gapserv = $_POST['idgap'];
			$nome = $_SESSION['nome'];
			$especialidade = $_POST['oespecialidade'];
			$especializado = $_POST['oespecializacao'];
			$prazoinicio = $_POST['oprazoinicio'];
			$duracao = $_POST['oduracao']." ".$_POST['oduracao2'];
			$domicilio = $_POST['odomicilio'];
			$valor = $_POST['oorcamentovalor'];
			
			$offerservico = new OfferServico($id_gapserv, $nome, $especialidade, $especializado, $prazoinicio, $duracao, $domicilio, $valor);
			OfferServicoDAO::insertOfferServico($offerservico);
			
			$_SESSION['erro2'] = "Oferta submetida com sucesso!";
			
			header("location:./findgap.php");
		}
		
	}
?>