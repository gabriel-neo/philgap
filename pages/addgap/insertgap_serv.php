<?php
	require_once "../../classes/GapServico.php";
	
	session_start();
	
	if (
		isset($_POST['especialidade']) && isset($_POST['foco']) && isset($_POST['descricao']) &&
		isset($_POST['urgencia']) && isset($_POST['cep']) && isset($_POST['logradouro']) &&
		isset($_POST['numero']) && 	isset($_POST['bairro']) && isset($_POST['cidade']) &&
		isset($_POST['uf'])
	){
		
		$_SESSION['necessidade'] = new GapServico();
		
		$_SESSION['necessidade']->addiduser($_SESSION['id']);
		
		$_SESSION['necessidade']->addinfoservico($_POST['especialidade'], $_POST['foco'], $_POST['descricao'], $_POST['urgencia']);
		
		$complemento = isset($_POST['complemento'])?$_POST['complemento']:0;
		$_SESSION['necessidade']->addenderecoservico($_POST['cep'], $_POST['logradouro'], $_POST['numero'], $complemento, $_POST['bairro'], $_POST['cidade'], $_POST['uf']);
		
		if (!$_SESSION['necessidade']->isnull_servico() && !$_SESSION['necessidade']->isnull_endereco() && !$_SESSION['necessidade']->isnull_iduser()){
			$_SESSION['necessidade']->insertgapservico();
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