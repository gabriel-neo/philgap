<?php
	class OfferProduto{
		
		// Atributos
		private $id_gapprod;
		private $nome;
		private $produto;
		private $especificaca;
		private $marca;
		private $cor;
		private $valor;
		private $formaenvio;
		private $custoenvio;
		private $link;
		
		// Construtores
		public function OfferProduto($id_gapprod, $nome, $produto, $especificacao, $marca, $cor, $valor, $formaenvio, $custoenvio, $link){
			$this->id_gapprod = $id_gapprod;
			$this->nome = $nome;
			$this->produto = $produto;
			$this->especificacao = $especificacao;
			$this->marca = $marca;
			$this->cor = $cor;
			$this->valor = $valor;
			$this->formaenvio = $formaenvio;
			$this->custoenvio = $custoenvio;
			$this->link = $link;
		}
		
		// Gets
		public function getId_gapprod(){
			return $this->id_gapprod;
		}
		public function getNome(){
			return $this->nome;
		}
		public function getProduto(){
			return $this->produto;
		}
		public function getEspecificacao(){
			return $this->especificacao;
		}
		public function getMarca(){
			return $this->marca;
		}
		public function getCor(){
			return $this->cor;
		}
		public function getValor(){
			return $this->valor;
		}
		public function getFormaenvio(){
			return $this->formaenvio;
		}
		public function getCustoenvio(){
			return $this->custoenvio;
		}
		public function getLink(){
			return $this->link;
		}
		
		// Sets
		public function setId_gapprod($id){
			$this->id_gapprod = $id;
		}
		public function setNome($nome){
			$this->nome = $nome;
		}
		public function setProduto($produto){
			$this->produto = $produto;
		}
		public function setEspecificacao($especificacao){
			$this->especificacao = $especificacao;
		}
		public function setMarca($marca){
			$this->marca = $marca;
		}
		public function setCor($cor){
			$this->cor = $cor;
		}
		public function setValor($valor){
			$this->valor = $valor;
		}
		public function setFormaenvio($formaenvio){
			$this->formaenvio = $formaenvio;
		}
		public function setCustoenvio($custoenvio){
			$this->custoenvio = $custoenvio;
		}
		public function setLink($link){
			$this->link = $link;
		}
	}
?>