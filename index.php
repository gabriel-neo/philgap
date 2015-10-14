<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Philgap - Leve o mundo no bolso!</title>
		<link rel="shortcut icon" href="./img/layout/favicon.ico" type="image/x-icon"/>
		<meta charset="utf-8"/>
		<meta name="description" content="Philgap"/>
		<meta creation-date="10/10/2015"/>
		<meta name="author" content="Gabriel de Moura Braga"/>
		
		<!-- Index Css -->
		<link href="./css/index.css" rel="stylesheet" type="text/css"/>
		<!-- Bootstrap -->
		<link href="./css/bootstrap.css" rel="stylesheet" media="screen"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<!-- Java Script & jQuery -->
		<script src="./js/jquery.min.js"></script>
		<script src="./js/login.js"></script>
		
	</head>
	<body>
		<header id="cabecalho" class="bgimg">	
			<nav id="menu_topo" class="menu_topo">
				<div id="minilogo" class="topmenu">
					<div id="imglogo" class="linkhome"><a href="index"><img src="./img/layout/logo.png" width="60px"/></a></div>
					<div id="txtlogo" class="linkhome"><h1><a href="index">PhilGap</a></h1></div>
				</div>
				<div id="sobre" class="topmenu"><strong><a href="./sobre">SOBRE</a></strong></div>
				<div id="cadastro" class="topmenu"><strong><a href="./cadastro">CADASTRO</a></strong></div>
						<?php
							session_start();
							$_SESSION['page'] = "index";
							
							if(isset($_POST['email']) && isset($_POST['password'])){
								
								//conexão local (gb home)
								//$con = mysqli_connect("localhost","root","","bd_philgap");
								
								//conexão bd hostinger
								$con = mysqli_connect("mysql.hostinger.com.br","u438581021_cuser","bd@user1234","u438581021_bdpg");
								
								$sql = "select id_user from tb_acc_usuarios where login = '".$_POST['email']."' and senha = '".$_POST['password']."'";
								
								$rs = mysqli_query($con, $sql);
								
								if(mysqli_num_rows($rs)){
									$usuario = mysqli_fetch_assoc($rs);
									$_SESSION['id'] = $usuario['id_user'];
									$sql = "select nome from tb_info_usuarios where id = '".$_SESSION['id']."'";
									$rs = mysqli_query($con, $sql);
									$usuario = mysqli_fetch_assoc($rs);
									$_SESSION['nome'] = $usuario['nome'];
								}
								else{
									$_SESSION['erro'] = "Login e/ou senha inválidos!";
								}
							}
							if(isset($_SESSION['nome'])){
								echo ("<div id='id_usuario' class='topmenu'><strong>
								<a href='./pages/usuarios/".$_SESSION['id']."-".strtolower($_SESSION['nome'])."'>".strtoupper($_SESSION['nome'])."</a>
								</strong><br/><center><a href='./pages/logoff'>(sair)</a></center></div>");
							}
							else{
								echo ("<nav id='login2' class='topmenu'><div id='loginContainer'>
											<a href='#' id='loginButton'><span>LOGIN</span></a>
											<div style='clear:both'></div>
											<div id='loginBox'>                
												<form id='loginForm' action='index' method='post' >
													<fieldset id='body'>
														<fieldset>
															<label for='email'>Endereço E-mail</label>
															<input type='email' name='email' id='email' maxlength='49' placeholder='Informe seu e-mail...' autofocus required />
														</fieldset>
														<fieldset>
															<label for='password'>Senha</label>
															<input type='password' name='password' id='password' maxlength='49' placeholder='Insira sua senha...' required />
														</fieldset>
														<input type='submit' id='login' value='Entrar' />
														<label for='checkbox'><input type='checkbox' id='checkbox' />Lembrar-me</label>
													</fieldset>
													<span><a href='forgotpassword'>Esqueceu a senha?</a></span>
												</form>
											</div>
										</div>
									</nav>");
							}
						?>
			</nav>
		</header>
		<section id="body" class="body">
				<section id="index" class="index">
					<div id="index" class="slogan_redirect">
						<div id="italic"><center><h2>"Onde sonhar é mais barato"</h2></center></div>
						<div class="botoes" id="btnalign"><button class="btn btn-large big_button btn-info" type="button">Atender Necessidade</button></div>
						<div class="botoes"><button class="btn btn-large big_button btn-success" type="button">Cadastrar Necessidade</button></div>
						<div id="fonte"><center><strong>Inicie sua experiência em nosso sistema, selecionando se deseja inserir ou atender a uma necessidade.</strong></center></div>
					</div>					
					<div id="index" class="appshow">
						<img id="logoonapp" src="./img/layout/logo.png"/>
						<h1 id="txtonapp">PhilGap</h1>
					</div>
				</section>
				
		</section>
		<footer id="rodape" class="rodape">
		
		</footer>
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
