<?php
	require_once ("OfferProduto.php");
	require_once ("ModeloDAO.php");
	
	class OfferProdutoDAO extends ModeloDAO{
		
		public static function insertOfferProduto($offerproduto){
			// cria o sql
			$sql = "insert into tb_offer_produto (id_gapprod, nome, produto, especificacao, marca, cor, valor, formaenvio, custoenvio, link) values ('".$offerproduto->getId_gapprod()."', '".$offerproduto->getNome()."','".$offerproduto->getProduto()."', '".$offerproduto->getEspecificacao()."', '".$offerproduto->getMarca()."', '".$offerproduto->getCor()."', '".$offerproduto->getValor()."', '".$offerproduto->getFormaenvio()."', '".$offerproduto->getCustoenvio()."', '".$offerproduto->getLink()."')";
			// Executa o SQL na classe PAI (ModeloDAO)
			$rs = parent::query($sql);
		}
	}
?>