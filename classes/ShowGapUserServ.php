<?php
	class ShowGapUserServ{
		
		// Atributos
		private $id;
		private $id_user;
		private $status;
		private $urgencia;
		private $especialidade;
		private $foco;
		private $descricao;
		private $cep;
		private $logradouro;
		private $numero;
		private $complemento;
		private $bairro;
		private $cidade;
		private $uf;
		
		// Gets
		public function getId(){
			return $this->id;
		}
		public function getId_user(){
			return $this->id_user;
		}
		public function getStatus(){
			return $this->status;
		}
		public function getUrgencia(){
			return $this->urgencia;
		}
		public function getEspecialidade(){
			return $this->especialidade;
		}
		public function getFoco(){
			return $this->foco;
		}
		public function getDescricao(){
			return $this->descricao;
		}
		public function getCep(){
			return $this->cep;
		}
		public function getLogradouro(){
			return $this->logradouro;
		}
		public function getNumero(){
			return $this->numero;
		}
		public function getComplemento(){
			return $this->complemento;
		}
		public function getBairro(){
			return $this->bairro;
		}
		public function getCidade(){
			return $this->cidade;
		}
		public function getUf(){
			return $this->uf;
		}
		
		// Sets
		public function setId($id){
			$this->id = $id;
		}
		public function setId_user($id_user){
			$this->id_user = $id_user;
		}
		public function setStatus($status){
			$this->status = $status;
		}
		public function setUrgencia($urgencia){
			$this->urgencia = $urgencia;
		}
		public function setEspecialidade($especialidade){
			$this->especialidade = $especialidade;
		}
		public function setFoco($foco){
			$this->foco = $foco;
		}
		public function setDescricao($descricao){
			$this->descricao = $descricao;
		}
		public function setCep($cep){
			$this->cep = $cep;
		}
		public function setLogradouro($logradouro){
			$this->logradouro = $logradouro;
		}
		public function setNumero($numero){
			$this->numero = $numero;
		}
		public function setComplemento($complemento){
			$this->complemento = $complemento;
		}
		public function setBairro($bairro){
			$this->bairro = $bairro;
		}
		public function setCidade($cidade){
			$this->cidade = $cidade;
		}
		public function setUf($uf){
			$this->uf = $uf;
		}
	}
?>