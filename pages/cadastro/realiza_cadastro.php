<?php
	include "../../classes/Cliente.php";
	$pessoa = new Cliente();
	
	if(
		isset($_POST['nome']) && isset($_POST['sobrenome']) && isset($_POST['sexo']) &&
		isset($_POST['dia']) &&	isset($_POST['mes']) && isset($_POST['ano']) &&
		isset($_POST['cpf']) && isset($_POST['rg']) && isset($_POST['cep']) &&
		isset($_POST['logradouro']) && isset($_POST['numero']) && isset($_POST['bairro']) &&
		isset($_POST['cidade']) && isset($_POST['uf'])
	){
		
		$datanasc = $_POST['ano']."-".$_POST['mes']."-".$_POST['dia'];
		$pessoa->addinfopessoal($_POST['nome'], $_POST['sobrenome'], $_POST['sexo'], $datanasc, $_POST['cpf'], $_POST['rg']);
		if (isset($_POST['complemento'])){
			$pessoa->addenderecopessoal($_POST['cep'], $_POST['logradouro'], $_POST['numero'], $_POST['complemento'], $_POST['bairro'], $_POST['cidade'], $_POST['uf']);
		}
		else{
			$pessoa->addenderecopessoal($_POST['cep'], $_POST['logradouro'], $_POST['numero'], 0, $_POST['bairro'], $_POST['cidade'], $_POST['uf']);
		}
		
		//INSERTS NO BANCO DE DADOS
		//ainda não implementado
		//$pessoa->addinfologin($email, $senha);
		//$pessoa->insertinfopessoal();
		//$pessoa->insertenderecopessoal();
		
	}
	else{
		session_start();
		$_SESSION['erro'] = "Ocorreu algum erro em seu cadastro. Por favor verifique!";
		header("location:../../fazerparte.php");
	}
?>