﻿<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Philgap - Leve o mundo no bolso!</title>
		<link rel="shortcut icon" href="./img/layout/favicon.ico" type="image/x-icon"/>
		<meta charset="utf-8"/>
		<meta name="description" content="Philgap"/>
		<meta creation-date="10/10/2015"/>
		<meta name="author" content="Gabriel de Moura Braga"/>
		
		<!--  Styles & Scripts  -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Cadastro Css -->
		<link href="./css/fazerparte.css" rel="stylesheet" type="text/css"/>
		<!-- Bootstrap -->
		<link href="./css/bootstrap.css" rel="stylesheet" media="screen"/>
		<!-- Java Script & jQuery -->
		<script src="./js/jquery.min.js"></script>
		<script src="./js/login.js"></script>

	</head>
	<body>
		<?php
			include "./classes/Cliente.php";
			session_start();
			
			if (isset($_SESSION['pessoa'])){
				
				if(($_SESSION['pessoa']->isnull_info()) || ($_SESSION['pessoa']->isnull_endereco())){
					if (!empty($_SESSION['page'])){
						header("location:./".$_SESSION['page'].".php");
					}
					else{
						header("location:./index.php");
					}
				}
				else{
					$_SESSION['page'] = "finalizacadastro";
					include('./pages/head.php');
					include('./pages/cadastro/body_finalizacadastro.php');
					include('./pages/footer.php');
				}
			}
			else{
				if (!empty($_SESSION['page'])){
					header("location:./".$_SESSION['page'].".php");
				}
				else{
					header("location:./index.php");
				}
			}
		?>
	</body>
</html>
<?php
	// Verifica se existe mensagem de erro
	if(isset($_SESSION['erro'])){
		echo ("<SCRIPT LANGUAGE='JavaScript' TYPE='text/javascript'>
			alert ('". $_SESSION['erro']. "')</SCRIPT>");
		unset($_SESSION['erro']);
	}
?>