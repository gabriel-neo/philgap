<?php
	
	class GapServOffers{
		
		// Atributos
		private $id;
		private $id_gapserv;
		private $nome;
		private $especialidade;
		private $especializado;
		private $prazoinicio;
		private $duracao;
		private $domicilio;
		private $valor;
		
		// Gets
		
		public function getId(){
			return $this->id;
		}
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
		
		public function setId($id){
			$this->id = $id;
		}
		public function setId_gapserv($id_gapserv){
			$this->id_gapserv = $id_gapserv;
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

