<?php
	class GapProduto{
		
		//id do usuário
		private $id_user;
		
		//info produto
		private $produto;
		private $especificacao;
		private $marca;
		private $cor;
		private $precomedio;
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
		
		public function addinfoproduto($produto, $especificacao, $marca, $cor, $precomedio, $urgencia){
			$this->produto = $produto;
			$this->especificacao = $especificacao;
			$this->marca = $marca;
			$this->cor = $cor;
			$this->precomedio = $precomedio;
			$this->urgencia = $urgencia;
		}
		
		public function addenderecoentrega($cep, $logradouro, $numero, $complemento, $bairro, $cidade, $uf){
			$this->cep = $cep;
			$this->logradouro = $logradouro;
			$this->numero = $numero;
			$this->complemento = $complemento;
			$this->bairro = $bairro;
			$this->cidade = $cidade;
			$this->uf = $uf;
		}
		
		public function verificainsert(){
			return $this->isnull_produto() || $this->isnull_endereco() || $this->isnull_iduser()?0:1;
		}
		
		public function isnull_iduser(){
			return $this->id_user == null?1:0;
		}
		
		public function isnull_produto(){
			return (($this->produto == null) && ($this->especificacao == null) && ($this->marca == null) &&
				($this->cor == null) && ($this->precomedio == null) && ($this->urgencia == null))?1:0;
		}
		
		public function isnull_endereco(){
			return (($this->cep == null) && ($this->logradouro == null) && ($this->numero == null) &&
			($this->complemento == null) && ($this->bairro == null) && ($this->cidade == null)  &&
			($this->uf == null))?1:0;
		}
		
		public function insertgapproduto(){
			if ($this->verificainsert()){
				
				$sql = "insert into tb_gap_produto (id_user, status, urgencia, produto, especificacao, marca, cor, precomedio, cep, logradouro, numero, complemento, bairro, cidade, uf) values ('".$this->id_user."', 0, '".$this->urgencia."', '".$this->produto."', '".$this->especificacao."', '".$this->marca."', '".$this->cor."', '".$this->precomedio."', '".$this->cep."', '".$this->logradouro."', '".$this->numero."', '".$this->complemento."', '".$this->bairro."', '".$this->cidade."', '".$this->uf."')";
				//conexão local (gb home)
				$con = mysqli_connect("localhost","root","","bd_philgap");
				//conexão bd hostinger
				//private $con = mysqli_connect("mysql.hostinger.com.br","u438581021_cuser","bd@user1234","u438581021_bdpg");
				$rs = mysqli_query($con, $sql);
			}
		}
	}
?>