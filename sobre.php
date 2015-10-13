<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Philgap - Leve o mundo no bolso!</title>
		<link rel="shortcut icon" href="./img/layout/favicon.ico" type="image/x-icon"/>
		<meta charset="utf-8"/>
		<meta name="description" content="Philgap"/>
		<meta creation-date="10/10/2015"/>
		<meta name="author" content="Gabriel de Moura Braga"/>
		
		<!-- Sobre Css -->
		<link href="./css/sobre.css" rel="stylesheet" type="text/css"/>
		<!-- Bootstrap -->
		<link href="./css/bootstrap.css" rel="stylesheet" media="screen"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		
		<script src="./js/jquery.min.js"></script>
		<script src="./js/login.js"></script>
		
	</head>
	<body>
		<?php
			session_start();
			$_SESSION['page'] = "sobre";
			
			include('./pages/head.php');
			include('./pages/sobre/body.php');
			include('./pages/footer.php');
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