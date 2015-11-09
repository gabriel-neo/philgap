<?php
	require_once "../../classes/GapProduto.php";
	
	session_start();
	
	if (
		isset($_POST['produto']) && isset($_POST['especificacao']) && isset($_POST['urgencia']) &&
		isset($_POST['cep']) && isset($_POST['logradouro']) && isset($_POST['numero']) && 
		isset($_POST['bairro']) && isset($_POST['cidade']) && isset($_POST['uf'])
	){
		
		$_SESSION['necessidade'] = new GapProduto();
		
		$_SESSION['necessidade']->addiduser($_SESSION['id']);
		
		$marca = isset($_POST['marca'])?$_POST['marca']:0;
		$cor = isset($_POST['cor'])?$_POST['cor']:0;
		$precomedio = isset($_POST['precomedio'])?$_POST['precomedio']:0;
		$_SESSION['necessidade']->addinfoproduto($_POST['produto'], $_POST['especificacao'], $marca, $cor, $precomedio, $_POST['urgencia']);
		
		$complemento = isset($_POST['complemento'])?$_POST['complemento']:0;
		$_SESSION['necessidade']->addenderecoentrega($_POST['cep'], $_POST['logradouro'], $_POST['numero'], $complemento, $_POST['bairro'], $_POST['cidade'], $_POST['uf']);
		
		if (!$_SESSION['necessidade']->isnull_produto() && !$_SESSION['necessidade']->isnull_endereco() && !$_SESSION['necessidade']->isnull_iduser()){
			$_SESSION['necessidade']->insertgapproduto();
			$_SESSION['erro'] = "Necessidade Cadastrada com Sucesso!";
			header("location:../../index.php");
		}
		else{
			$_SESSION['erro'] = "Ocorreu algum erro em seu cadastro de necessidade!";
			header("location:../../addgap.php");
		}
	}
	else{
		if (isset($_SESSION['page'])){
			header("location:../../".$_SESSION['page'].".php");
		}
		else{
			header("location:../../index.php");
		}
	}
?>