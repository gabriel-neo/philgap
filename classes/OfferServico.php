<?php
	class OfferServico{
		// Atributos
		private $id_gapserv = null;
		private $nome = null;
		private $especialidade = null;
		private $especializado = null;
		private $prazoinicio = null;
		private $duracao = null;
		private $domicilio = null;
		private $valor = null;
		
		// Construtores
		
		public function OfferServico($id_gapserv, $nome, $especialidade, $especializado, $prazoinicio, $duracao, $domicilio, $valor){
			$this->id_gapserv = $id_gapserv;
			$this->nome = $nome;
			$this->especialidade = $especialidade;
			$this->especializado = $especializado;
			$this->prazoinicio = $prazoinicio;
			$this->duracao = $duracao;
			$this->domicilio = $domicilio;
			$this->valor = $valor;
		}
		
		// Gets
		public function getId_gapserv(){
			return $this->id_gapserv;
		}
		public function getNome(){
			return $this->nome;
		}
		public function getEspecialidade(){
			return $this->especialidade;
		}
		public function getEspecializado(){
			return $this->especializado;
		}
		public function getPrazoinicio(){
			return $this->prazoinicio;
		}
		public function getDuracao(){
			return $this->duracao;
		}
		public function getDomicilio(){
			return $this->domicilio;
		}
		public function getValor(){
			return $this->valor;
		}
		
		// Sets
		public function setId_gapserv($id){
			$this->id_gapserv = $id;
		}
		public function setNome($nome){
			$this->nome = $nome;
		}
		public function setEspecialidade($especialidade){
			$this->especialidade = $especialidade;
		}
		public function setEspecializado($especializado){
			$this->especializado = $especializado;
		}
		public function setPrazoinicio($prazoinicio){
			$this->prazoinicio = $prazoinicio;
		}
		public function setDuracao($duracao){
			$this->duracao = $duracao;
		}
		public function setDomicilio($domicilio){
			$this->domicilio = $domicilio;
		}
		public function setValor($valor){
			$this->valor = $valor;
		}
	}
?>