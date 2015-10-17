<?php
	// Abre a sessão do usuário
	session_start();
	
	//variavel para direcionar para a pagina correta de logoff
	$page="index";
	
	//verifica se o usuário estava em alguma página antes de chamar a logoff.
	if(isset($_SESSION['page'])){
		if ($_SESSION['page'] == "addgap" || $_SESSION['page'] == "philgap"){
			$page = "index";
		}
		else{
			$page = $_SESSION['page'];
		}
	}
	
	//testa se realmente o usuário está logado
	if(isset($_SESSION['nome'])){
	
		// Destroi a sessão
		session_destroy();
		
		//após a sessão encerrada é criado uma nova sessão para exibir uma mensagem na index.
		
		// Abre novamente a sessão do usuário
		session_start();
		
		//cria uma variavel de sessão e coloca a mensagem de logoff success
		$_SESSION['erro'] = "Logoff realizado com sucesso!";
		
		// Redireciona o usuário para a ultima pagina visitada
		header("location:../".$page.".php");
	}
	else{
		// Redireciona o usuário para a ultima pagina visitada
		header("location:../".$page.".php");	
	}
?>