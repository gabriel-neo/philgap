<?php
	class Cliente {
		
		//conexão local (gb home)
		private $con = mysqli_connect("localhost","root","","bd_philgap");
		
		//conexão bd hostinger
		//private $con = mysqli_connect("mysql.hostinger.com.br","u438581021_cuser","bd@user1234","u438581021_bdpg");
		
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
		private $estado;

		//info login
		private $email;
		private $senha;
		
		public function addinfopessoal($nome, $sobrenome, $sexo, $datanasc, $cpf, $rg){
			$this->$nome = $nome;
			$this->$sobrenome = $sobrenome;
			$this->$sexo = $sexo;
			$this->$datanasc = $datanasc;
			$this->$cpf = $cpf;
			$this->$rg = $rg;
		}
		public function addenderecopessoal($cep, $logradouro, $numero, $complemento, $bairro, $cidade, $estado){
			$this->$cep = $cep
			$this->$logradouro = $logradouro;
			$this->$numero = $numero;
			$this->$complemento = $complemento;
			$this->$bairro = $bairro;
			$this->$cidade = $cidade;
			$this->$estado = $estado;
		}
		
		public function addinfologin($email, $senha){
			$this->$email = $email;
			$this->$senha = $senha;
		}

		public function insertinfopessoal(){
			$sql = "insert into tb_info_usuarios (nome, sobrenome, sexo, datanasc, cpf, rg) values ('$this->$nome', '$this->$sobrenome', '$this->$sexo', '$this->$datanasc', '$this->$cpf', '$this->$rg')";
			
			try {
				$rs = mysqli_query($this->$con, $sql);
				return 1;
			}
			catch (Exception $e) {
				return 0;
			}
		}
		
		
	}
?>