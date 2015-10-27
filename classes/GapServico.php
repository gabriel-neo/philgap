<?php
	require_once "ConexaoBD.php";
	class GapServico extends ConexaoBD{
		
		//id do usuário
		private $id_user;
		
		//info serviço
		private $especialidade;
		private $foco;
		private $descricao;
		private $urgencia;
		
		//info endereço
		private $cep;
		private $logradouro;
		private $numero;
		private $complemento;
		private $bairro;
		private $cidade;
		private $uf;
		
		public function addiduser($id_user){
			$this->id_user = $id_user;
		}
		
		public function addinfoservico($especialidade, $foco, $descricao, $urgencia){
			$this->especialidade = $especialidade;
			$this->foco = $foco;
			$this->descricao = $descricao;
			$this->urgencia = $urgencia;
		}
		
		public function addenderecoservico($cep, $logradouro, $numero, $complemento, $bairro, $cidade, $uf){
			$this->cep = $cep;
			$this->logradouro = $logradouro;
			$this->numero = $numero;
			$this->complemento = $complemento;
			$this->bairro = $bairro;
			$this->cidade = $cidade;
			$this->uf = $uf;
		}
		
		public function verificainsert(){
			return $this->isnull_servico() || $this->isnull_endereco() || $this->isnull_iduser()?0:1;
		}
		
		public function isnull_iduser(){
			return $this->id_user == null?1:0;
		}
		
		public function isnull_servico(){
				return (($this->especialidade == null) && ($this->foco == null) &&
				($this->descricao == null) && ($this->urgencia == null))?1:0;
		}
		
		public function isnull_endereco(){
			return (($this->cep == null) && ($this->logradouro == null) && ($this->numero == null) &&
			($this->complemento == null) && ($this->bairro == null) && ($this->cidade == null)  &&
			($this->uf == null))?1:0;
		}
		
		public function insertgapservico(){
			if ($this->verificainsert()){
				$con = ConexaoBD::con();
				
				$sql = "insert into tb_gap_servico (id_user, status, urgencia, especialidade, foco, descricao, cep, logradouro, numero, complemento, bairro, cidade, uf) values ('".$this->id_user."', 0, '".$this->urgencia."', '".$this->especialidade."', '".$this->foco."', '".$this->descricao."', '".$this->cep."', '".$this->logradouro."', '".$this->numero."', '".$this->complemento."', '".$this->bairro."', '".$this->cidade."', '".$this->uf."')";
				
				$rs = mysqli_query($con, $sql);
			}
		}
	}
?>