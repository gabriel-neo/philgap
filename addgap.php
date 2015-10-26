<!DOCTYPE html>
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
		<!-- AddGap Css -->
		<link href="./css/addgap.css" rel="stylesheet" type="text/css"/>
		<!-- Login Css -->
		<link href="./css/login.css" rel="stylesheet" type="text/css"/>
		<!-- Bootstrap -->
		<link href="./css/bootstrap.css" rel="stylesheet" media="screen"/>
		<!-- Java Script & jQuery -->
		<script src="./js/jquery.min.js"></script>
		<script src="./js/login.js"></script>
		<script src="./js/bootstrap.js"></script>
		
	</head>
	<body>
		<?php
			session_start();
			
			if (!isset($_SESSION['id']) && !isset($_SESSION['nome'])){
				if (isset($_SESSION['page'])){
					header("location:".$_SESSION['page'].".php");
				}
				else{
					header("location:index.php");
				}
			}
			$_SESSION['page'] = "addgap";
			
			include('./pages/head.php');
			include('./pages/addgap/body.php');
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