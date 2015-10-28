<header id="cabecalho" class="bgimg">	
	<nav id="menu_topo" class="menu_topo">
		<div id="minilogo" class="topmenu">
			<div id="imglogo" class="linkhome"><a href="./index.php"><img src="./img/layout/logo.png" width="60px"/></a></div>
			<div id="txtlogo" class="linkhome"><h1><a href="./index.php">PhilGap</a></h1></div>
		</div>
		<div id="sobre" class="topmenu"><strong><a href="./sobre.php">SOBRE</a></strong></div>
		<div id="cadastro" class="topmenu"><strong><a href="./cadastro.php">CADASTRO</a></strong></div>
		<?php
			include "./classes/ConexaoBD.php";
			
			if (isset($_SESSION['page'])){
				$page = $_SESSION['page'];
			}
			else{
				$page = "index";
			}
			
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
				<a href='./pages/usuarios/".$_SESSION['id']."-".strtolower($_SESSION['nome']).".php'>".strtoupper($_SESSION['nome'])."</a>
				</strong><br/><center><a href='./pages/logoff.php'>(sair)</a></center></div>");
			}
			else{
				echo ("<nav id='login2' class='topmenu'><div id='loginContainer'>
							<a href='#' id='loginButton'><span>LOGIN</span></a>
							<div style='clear:both'></div>
							<div id='loginBox'>                
								<form id='loginForm' action='./".$page.".php' method='post' >
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