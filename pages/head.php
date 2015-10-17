<header id="cabecalho" class="bgimg">	
	<nav id="menu_topo" class="menu_topo">
		<div id="minilogo" class="topmenu">
			<div id="imglogo" class="linkhome"><a href="./index.php"><img src="./img/layout/logo.png" width="60px"/></a></div>
			<div id="txtlogo" class="linkhome"><h1><a href="./index.php">PhilGap</a></h1></div>
		</div>
		<div id="sobre" class="topmenu"><strong><a href="./sobre.php">SOBRE</a></strong></div>
		<div id="cadastro" class="topmenu"><strong><a href="./cadastro.php">CADASTRO</a></strong></div>
		<?php
			//não há necessidade desse teste, pois a variável de sessão
			//sempre estará setada nesse ponto do código, mas "vai que" né?!
			if(isset($_SESSION['page'])){
				$page=$_SESSION['page'];
			}
			if(isset($_POST['email']) && isset($_POST['password'])){
				
				//conexão local (gb home)
				$con = mysqli_connect("localhost","root","","bd_philgap");
				
				//conexão bd hostinger
				//$con = mysqli_connect("mysql.hostinger.com.br","u438581021_cuser","bd@user1234","u438581021_bdpg");
				
				$sql = "select id_user from tb_acc_usuarios where email = '".$_POST['email']."' and senha = '".md5($_POST['password'])."'";
				
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