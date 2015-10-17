<?php
	include "../../classes/Cliente.php";
	
	session_start();
	
	if (!isset($_SESSION['pessoa'])){
		
		$_SESSION['pessoa'] = new Cliente();
		
		if(
			!empty($_POST['nome']) && !empty($_POST['sobrenome']) && !empty($_POST['sexo']) &&
			!empty($_POST['dia']) && !empty($_POST['mes']) && !empty($_POST['ano']) &&
			!empty($_POST['cpf']) && !empty($_POST['rg']) && !empty($_POST['cep']) &&
			!empty($_POST['logradouro']) && !empty($_POST['numero']) && !empty($_POST['bairro']) &&
			!empty($_POST['cidade']) && !empty($_POST['uf'])
		){
			$datanasc = $_POST['ano']."-".$_POST['mes']."-".$_POST['dia'];
			$_SESSION['pessoa']->addinfopessoal($_POST['nome'], $_POST['sobrenome'], $_POST['sexo'], $datanasc, $_POST['cpf'], $_POST['rg']);
			if (empty($_POST['complemento'])){
				$_SESSION['pessoa']->addenderecopessoal($_POST['cep'], $_POST['logradouro'], $_POST['numero'], 0, $_POST['bairro'], $_POST['cidade'], $_POST['uf']);
			}
			else{
				$_SESSION['pessoa']->addenderecopessoal($_POST['cep'], $_POST['logradouro'], $_POST['numero'], $_POST['complemento'], $_POST['bairro'], $_POST['cidade'], $_POST['uf']);
			}
			$_SESSION['podelogin'] = 1;
			header("location:../../finalizacadastro.php");
		}
		else{
			session_destroy();
			$_SESSION['erro'] = "Ocorreu algum erro em seu cadastro. Por favor verifique!";
			header("location:../../fazerparte.php");
		}
	}
	else{
		if ($_SESSION['pessoa']->isnull_info() || $_SESSION['pessoa']->isnull_endereco()){
			unset($_SESSION['pessoa']);
			header("location:./realiza_cadastro.php");
		}
		else{
			if (!empty($_POST['email']) && !empty($_POST['senha']) && !empty($_POST['senhaconfirmar'])){
				if ($_POST['senha'] == $_POST['senhaconfirmar']){
					if($_SESSION['pessoa']->verificaemail($_POST['email'])){
						$_SESSION['erro'] = "Este endereço e-mail já está cadastrado em nosso sistema. Por favor tente outro!";
						header("location:../../finalizacadastro.php");
					}
					else{
						$_SESSION['pessoa']->addinfologin($_POST['email'], $_POST['senha']);
						
						$_SESSION['pessoa']->insertinfopessoal();
						$_SESSION['pessoa']->insertenderecopessoal();
						$_SESSION['pessoa']->insertinfologin();
						session_destroy();
						session_start();
						$_SESSION['erro'] = "Usuário cadastrado com Sucesso!";
						header("location:../../index.php");
					}
				}
				else{
					$_SESSION['erro'] = "As senhas não coincidem! Favor verificar.";
					header("location:../../finalizacadastro.php");
				}
			}
			else{
				header("location:../../finalizacadastro.php");
			}
		}
	}
?>