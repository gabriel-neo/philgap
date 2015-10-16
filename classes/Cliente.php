<?php
	class Cliente {
		
		private $insert = 0;
		
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
			$sql = "select id from tb_info_usuarios where cpf = '".$this->cpf."'";
			//conexão local (gb home)
			$con = mysqli_connect("localhost","root","","bd_philgap");
			//conexão bd hostinger
			//private $con = mysqli_connect("mysql.hostinger.com.br","u438581021_cuser","bd@user1234","u438581021_bdpg");
			$rs = mysqli_query($con, $sql);
			$res = mysqli_fetch_assoc($rs);
			$this->id_user = $res['id'];
		}

		public function insertinfopessoal(){
			
			$sql = "insert into tb_info_usuarios (nome, sobrenome, sexo, datanasc, cpf, rg) values ('".$this->nome."', '".$this->sobrenome."', '".$this->sexo."', '".$this->datanasc."', '".$this->cpf."', '".$this->rg."')";
			//conexão local (gb home)
			$con = mysqli_connect("localhost","root","","bd_philgap");
			//conexão bd hostinger
			//private $con = mysqli_connect("mysql.hostinger.com.br","u438581021_cuser","bd@user1234","u438581021_bdpg");
			$rs = mysqli_query($con, $sql);
			$this->insert = 1;
		}
		
		public function insertenderecopessoal(){
			if ($this->insert){
				
				$this->verificaidcadastro();
			
				$sql = "insert into tb_enderecos_usuarios (id_user, cep, logradouro, numero, complemento, bairro, cidade, uf) values ('".$this->id_user."', '".$this->cep."', '".$this->logradouro."', '".$this->numero."', '".$this->complemento."', '".$this->bairro."', '".$this->cidade."', '".$this->uf."')";
				//conexão local (gb home)
				$con = mysqli_connect("localhost","root","","bd_philgap");
				//conexão bd hostinger
				//private $con = mysqli_connect("mysql.hostinger.com.br","u438581021_cuser","bd@user1234","u438581021_bdpg");
				$rs = mysqli_query($con, $sql);
			}
		}
		
		
	}
?>