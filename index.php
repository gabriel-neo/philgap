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
		<!-- Index Css -->
		<link href="./css/index.css" rel="stylesheet" type="text/css"/>
		<!-- Login Css -->
		<link href="./css/login.css" rel="stylesheet" type="text/css"/>
		<!-- Bootstrap -->
		<link href="./css/bootstrap.css" rel="stylesheet" media="screen"/>
		<!-- Rodapé -->
		<link href="./css/rodape.css" rel="stylesheet" media="screen"/>
		<!-- Java Script & jQuery -->
		<script src="./js/jquery.min.js"></script>
		<script src="./js/login.js"></script>
		
	</head>
	<body>
		<header id="cabecalho" class="bgimg">	
			<nav id="menu_topo" class="menu_topo">
				<div id="minilogo" class="topmenu">
					<div id="imglogo" class="linkhome"><a href="index.php"><img src="./img/layout/logo.png" width="60px"/></a></div>
					<div id="txtlogo" class="linkhome"><h1><a href="index.php">PhilGap</a></h1></div>
				</div>
				<div id="sobre" class="topmenu"><strong><a href="./sobre.php">SOBRE</a></strong></div>
				<div id="cadastro" class="topmenu"><strong><a href="./cadastro.php">CADASTRO</a></strong></div>
						<?php
							require_once "./classes/ConexaoBD.php";
							session_start();
							$_SESSION['page'] = "index";
							
							if(isset($_POST['email']) && isset($_POST['password'])){
								
								$con = ConexaoBD::con();
								
								$sql = "select tbacc.id_user, tbinfo.nome from tb_acc_usuarios tbacc inner join tb_info_usuarios tbinfo on tbacc.id_user = tbinfo.id where tbacc.email = '".$_POST['email']."' and senha = '".md5($_POST['password'])."'";
								
								$rs = mysqli_query($con, $sql);
								
								if(mysqli_num_rows($rs)){
									$usuario = mysqli_fetch_assoc($rs);
									$_SESSION['id'] = $usuario['id_user'];
									$_SESSION['nome'] = $usuario['nome'];
								}
								else{
									$_SESSION['erro'] = "Login e/ou senha inválidos!";
								}
							}
							if((isset($_SESSION['nome'])) && (isset($_SESSION['id']))){
								echo ("<div id='id_usuario' class='topmenu'><strong>
								<a href='./chooseoffer.php'>".strtoupper($_SESSION['nome'])."</a>
								</strong><br/><center><a href='./pages/logoff.php'>(sair)</a></center></div>");
							}
							else{
								echo ("<nav id='login2' class='topmenu'><div id='loginContainer'>
											<a href='#' id='loginButton'><span>LOGIN</span></a>
											<div style='clear:both'></div>
											<div id='loginBox'>                
												<form id='loginForm' action='index.php' method='post' >
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
													<span><a href='forgotpassword.php'>Esqueceu a senha?</a></span>
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
						<?php
							if (isset($_SESSION['id']) && isset($_SESSION['nome'])){
								echo ("<form action='./findgap.php' method='post' class='botoes' id='btnalign'>
										<input type='hidden' name='phil' id='phil' value='philgap'/>
										<input class='btn btn-large btn-info' type='submit' id='big_button' value='Atender Necessidade'/>
									   </form>");
								echo ("<form action='./addgap.php' method='post' class='botoes'>
										<input type='hidden' name='add' id='add' value='addgap'/>
										<input class='btn btn-large btn-success' type='submit' id='big_button' value='Cadastrar Necessidade'/>
									   </form>");
							}
							else{
								echo ("<form action='./pages/facalogin.php' method='post' class='botoes' id='btnalign'>
										<input type='hidden' name='dologin' id='dologin' value='philgap'/>
										<input class='btn btn-large btn-info' type='submit' id='big_button' value='Atender Necessidade'/>
									   </form>");
								echo ("<form action='./pages/facalogin.php' method='post' class='botoes'>
										<input type='hidden' name='dologin' id='dologin' value='addgap'/>
										<input class='btn btn-large btn-success' type='submit' id='big_button' value='Cadastrar Necessidade'/>
									   </form>");
							}
						?>
						<div id="fonte"><center><strong>Inicie sua experiência em nosso sistema, selecionando se deseja inserir ou atender a uma necessidade.</strong></center></div>
					</div>					
					<div id="index" class="appshow">
						<img id="logoonapp" src="./img/layout/logo.png"/>
						<h1 id="txtonapp">PhilGap</h1>
					</div>
				</section>
		</section>
		<footer id="rodape" class="rodape">
			<div class="bg1">
				<div class="linklogo">
					<div class="logo_footer"></div>
					<div id="links_rodape">
						<ul class="simple-nav">
							<li class="item">
								<a href="http://www.philgap.xyz/quem-somos" title="Quem somos">Quem Somos</a>
							</li>
							<li class="item">
								<a href="http://www.philgap.xyz/guia/" target="blank" title="Guia do PhilGap">Guia do PhilGap</a>
							</li>
							<li class="item">
								<a href="http://www.philgap.xyz/" target="blank" title="Ajuda">Ajuda</a>
							</li>
							<li class="item">
								<a href="http://www.philgap.xyz/termos-de-uso" title="Termos de uso">Termos de uso</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="bg2">
				<address>
					©2015, PhilGap Serviços de Internet
					Projeto desenvolvido para conclusão da 3ª etapa do curso de ADS - UNA Barro Preto <br />
					Rua dos Goitacazes, 1300 - Barro Preto / Belo Horizonte - MG
				</address>
			</div>
			<div class="bg3">
				<div id="conteiner_letras">
					<div id="letras_pequenas" class="align">
						PhilGap ® é uma marca registrada de PHILHAGAP COMÉRCIO ELETRÔNICO S/A | CNPJ: XX.XXX.XXX/XXXX-XX | Todos os direitos reservados. Os produtos anunciados no site não são de responsabilidade da empresa, ficando sob responsabilidade do utilizador, as negociações que pela plataforma for realizada. O PhilGap não é responsável por erros descritivos. As fotos contidas nas páginas são de autoria do fornecedor. Caso ocorra problema com o fornecimento de produtos/serviços contatar a nossa central de atendimento no 0800-12345.
					</div>
					<div id="img_footer" class="align">
						<img src="./img/layout/img_ft.jpg">
					</div>
				</div>
			</div>
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