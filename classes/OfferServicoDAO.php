<?php
	require_once ("OfferServico.php");
	require_once ("ModeloDAO.php");
	
	class OfferServicoDAO extends ModeloDAO{
		
		public static function insertOfferServico($offerservico){
			// cria o sql
			$sql = "insert into tb_offer_servico (id_gapserv, nome, especialidade, especializado, prazoinicio, duracao, domicilio, valor) values ('".$offerservico->getId_gapserv()."', '".$offerservico->getNome()."','".$offerservico->getEspecialidade()."', '".$offerservico->getEspecializado()."', '".$offerservico->getPrazoinicio()."', '".$offerservico->getDuracao()."', '".$offerservico->getDomicilio()."', '".$offerservico->getValor()."')";
			// Executa o SQL na classe PAI (ModeloDAO)
			$rs = parent::query($sql);
		}
	}
?>