<?php
	require_once "ConexaoBD.php";
	class Cliente extends ConexaoBD{
		
		//variavel de controle de inserção
		private $insert = 0;
		
		//id do usuário
		private $id_user;
		
		//info pessoal
		private $nome;
		private $sobrenome;
		private $sexo;
		private $datanasc;
		private $cpf;
		private $rg;
		
		//info endereço
		private $cep;
		private $logradouro;
		private $numero;
		private $complemento;
		private $bairro;
		private $cidade;
		private $uf;

		//info login
		private $email;
		private $senha;
		
		public function addinfopessoal($nome, $sobrenome, $sexo, $datanasc, $cpf, $rg){
			
			$this->nome = $nome;
			$this->sobrenome = $sobrenome;
			$this->sexo = $sexo;
			$this->datanasc = $datanasc;
			$this->cpf = $cpf;
			$this->rg = $rg;
		}
		
		public function addenderecopessoal($cep, $logradouro, $numero, $complemento, $bairro, $cidade, $uf){
			$this->cep = $cep;
			$this->logradouro = $logradouro;
			$this->numero = $numero;
			$this->complemento = $complemento;
			$this->bairro = $bairro;
			$this->cidade = $cidade;
			$this->uf = $uf;
		}
		
		public function addinfologin($email, $senha){
			$this->email = $email;
			$this->senha = $senha;
		}
		
		public function verificaidcadastro(){
			$con = ConexaoBD::con();
			
			$sql = "select id from tb_info_usuarios where cpf = '".$this->cpf."'";
			$rs = mysqli_query($con, $sql);
			$res = mysqli_fetch_assoc($rs);
			
			$this->id_user = $res['id'];
		}
		
		public function verificaemail($email){
			$con = ConexaoBD::con();
			
			$sql = "select id from tb_acc_usuarios where email = '".$email."'";
			$rs = mysqli_query($con, $sql);
			
			return mysqli_num_rows($rs);
		}
		
		public function isnull_info(){
			if (($this->nome == null) && ($this->sobrenome == null) && ($this->sexo == null) &&
				($this->datanasc == null) && ($this->cpf == null) && ($this->rg == null)){
				return 1;
			}
			else{
				return 0;
			}
		}
		
		public function isnull_endereco(){
			if (($this->cep == null) && ($this->logradouro == null) && ($this->numero == null) &&
			($this->complemento == null) && ($this->bairro == null) && ($this->cidade == null)  &&
			($this->uf == null)){
				return 1;
			}
			else{
				return 0;
			}
		}
		
		public function isnull_login(){
			if (($this->email == null) && ($this->senha == null)){
				return 1;
			}
			else{
				return 0;
			}
		}

		public function insertinfopessoal(){
			$con = ConexaoBD::con();
			
			$sql = "insert into tb_info_usuarios (nome, sobrenome, sexo, datanasc, cpf, rg) values ('".$this->nome."', '".$this->sobrenome."', '".$this->sexo."', '".$this->datanasc."', '".$this->cpf."', '".$this->rg."')";
			$rs = mysqli_query($con, $sql);
			
			$this->insert = 1;
		}
		
		public function insertenderecopessoal(){
			if ($this->insert){
				$this->verificaidcadastro();
				
				$con = ConexaoBD::con();
				
				$sql = "insert into tb_enderecos_usuarios (id_user, cep, logradouro, numero, complemento, bairro, cidade, uf) values ('".$this->id_user."', '".$this->cep."', '".$this->logradouro."', '".$this->numero."', '".$this->complemento."', '".$this->bairro."', '".$this->cidade."', '".$this->uf."')";
				
				$rs = mysqli_query($con, $sql);
			}
		}
		
		public function insertinfologin(){
			if ($this->insert){
				$this->verificaidcadastro();
				
				$con = ConexaoBD::con();
				
				$sql = "insert into tb_acc_usuarios (id_user, email, senha) values ('".$this->id_user."', '".$this->email."', '".md5($this->senha)."')";
				
				$rs = mysqli_query($con, $sql);
			}
		}
	}
?>