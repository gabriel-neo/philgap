<?php
	session_start();
	if (isset($_POST['dologin'])){
		if ($_POST['dologin'] == "philgap"){
			$_SESSION['erro'] = "Por favor faça o login para poder atender uma necessidade!";
			header("location:../index.php");
		}
		else{
			$_SESSION['erro'] = "Por favor faça o login para poder cadastrar sua necessidade!";
			header("location:../index.php");
		}
	}
	else{
		if (isset($_SESSION['page'])){
			// Redireciona o usuário para a ultima pagina visitada
			header("location:../".$_SESSION['page'].".php");
		}
		else{
			// Redireciona o usuário para a index
			header("location:../index.php");
		}
	}
?>