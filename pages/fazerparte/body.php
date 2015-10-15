<section class="body">
		<section id="fonte" class="form">
			<div class="generaljoin">
				<h1>Cadastro de Usuários</h1>
				<h3>Quero me cadastrar para:</h3>
				<div id="opcao" class="nav-tabs">
					<button class="btn btn-large"><a class="corfonte" data-toggle="tab" href="#comprar"><strong>Comprar</strong></a></button>
					<button class="btn btn-large"><a class="corfonte" data-toggle="tab" href="#venderprodutos"><strong>Vender Produtos</strong></a></button>
					<button class="btn btn-large"><a class="corfonte" data-toggle="tab" href="#prestarservicos"><strong>Prestar Serviços</strong></a></button>
				</div>
				<div id="background" class="tab-content">
					<?php
						if(isset($_POST['cadastro'])){
							if($_POST['cadastro']=="comprar"){
								echo("<div id='comprar' class='tab-pane fade in active position'>");
								unset($_POST['cadastro']);
							}
							else{
								echo("<div id='comprar' class='tab-pane fade position'>");
							}
						}
						else{
							echo("<div id='comprar' class='tab-pane fade in active position'>");
						}
					?>
						<h3>Cadastro de Comprador</h3>
						<form action="./pages/cadastro/realiza_cadastro.php" method="post" class="form-horizontal">
								<!-- Text input-->
								<div class="form-group">
								  <label class="col-md-4 control-label" for="nome">Nome</label>  
								  <div class="col-md-4">
								  <input id="nome" name="nome" type="text" placeholder="" class="form-control input-md" required="">
								  <span class="help-block">Primeiro nome</span>  
								  </div>
								</div>

								<!-- Text input-->
								<div class="form-group">
								  <label class="col-md-4 control-label" for="sobrenome">Sobrenome</label>  
								  <div class="col-md-5">
								  <input id="sobrenome" name="sobrenome" type="text" placeholder="" class="form-control input-md" required="">
								  <span class="help-block">Sobrenome</span>  
								  </div>
								</div>

								<!-- Multiple Radios -->
								<div class="form-group">
								  <label class="col-md-4 control-label" for="sexo">Sexo</label>
								  <div class="col-md-4">
								  <div class="radio">
									<label for="sexo-0">
									  <input type="radio" name="sexo" id="sexo-0" value="m" checked="checked">
									  Masculino
									</label>
									</div>
								  <div class="radio">
									<label for="sexo-1">
									  <input type="radio" name="sexo" id="sexo-1" value="f">
									  Feminino
									</label>
									</div>
								  </div>
								</div>

								<!-- Text input-->
								<div class="form-group">
								  <label class="col-md-4 control-label" for="cpf">CPF</label>  
								  <div class="col-md-5">
								  <input id="cpf" name="cpf" type="text" placeholder="" class="form-control input-md" required="">
								  <span class="help-block">Ex :168.658.874-24</span>  
								  </div>
								</div>

								<!-- Text input-->
								<div class="form-group">
								  <label class="col-md-4 control-label" for="cep">CEP</label>  
								  <div class="col-md-4">
								  <input id="cep" name="cep" type="text" placeholder="" class="form-control input-md" required="">
								  <span class="help-block">Ex : 31220-010</span>  
								  </div>
								</div>

								<!-- Text input-->
								<div class="form-group">
								  <label class="col-md-4 control-label" for="email">E-mail</label>  
								  <div class="col-md-5">
								  <input id="email" name="email" type="text" placeholder="email@dominio.com" class="form-control input-md" required="">
								  <span class="help-block">Endereço e-mail</span>  
								  </div>
								</div>

								<!-- Password input-->
								<div class="form-group">
								  <label class="col-md-4 control-label" for="senha">Senha</label>
								  <div class="col-md-4">
									<input id="senha" name="senha" type="password" placeholder="" class="form-control input-md" required="">
									
								  </div>
								</div>

								<!-- Password input-->
								<div class="form-group">
								  <label class="col-md-4 control-label" for="senha2">Confirmar Senha</label>
								  <div class="col-md-4">
									<input id="senha2" name="senha2" type="password" placeholder="" class="form-control input-md" required="">
									
								  </div>
								</div>

								<!-- Button (Double) -->
								<div class="form-group">
								  <label class="col-md-4 control-label" for="submit"></label>
								  <div class="col-md-8">
									<button id="submit" name="submit" class="btn btn-danger">Limpar Campos</button>
									<button id="reset" name="reset" class="btn btn-primary">Finalizar Cadastro</button>
								  </div>
								</div>

						<!--
							<div id="index">
								<label for="nome"><strong>Nome</strong></label>
								<input type="text" id="nome" name="nome" style="width: 80px;" maxlength="30" placeholder="Ex : Gustavo" autofocus required />
							</div>
							<div id="index">
								<label for="sobrenome"><strong>Sobrenome</strong></label>
								<input type="text" id="sobrenome" name="sobrenome" style="width: 140px;" maxlength="50" placeholder="Ex : da Silva" required/>
							</div>
						
							<div>
								<input type="reset" id="clear_cadastro" name="clear_cadastro" value="Limpar Dados" class="btn btn-large btn-info" />
								<input type="submit" id="submit_cadastro" name="submit_cadastro" value="Finalizar Cadastro" class="btn btn-large btn-success" />
							</div>
						-->
						</form>
					</div>
					<?php
						if(isset($_POST['cadastro'])){
							if($_POST['cadastro']=="venderprodutos"){
								echo("<div id='venderprodutos' class='tab-pane fade in active position'>");
								unset($_POST['cadastro']);
							}
							else{
								echo("<div id='venderprodutos' class='tab-pane fade position'>");
							}
						}
						else{
							echo("<div id='venderprodutos' class='tab-pane fade position'>");
						}
					?>
						<h3>Cadastro de Vendedor de Produtos</h3>
						<form action="./pages/cadastro/realiza_cadastro.php" method="post">
							<div id="index">
								<label for="nome"><strong>Nome</strong></label>
								<input type="text" id="nome" name="nome" style="width: 80px;" maxlength="30" placeholder="Ex : Gustavo" autofocus required />
							</div>
							<div id="index">
								<label for="sobrenome"><strong>Sobrenome</strong></label>
								<input type="text" id="sobrenome" name="sobrenome" style="width: 140px;" maxlength="50" placeholder="Ex : da Silva" required/>
							</div>
							<div>
								<input type="reset" id="clear_cadastro" name="clear_cadastro" value="Limpar Dados" class="btn btn-large btn-info" />
								<input type="submit" id="submit_cadastro" name="submit_cadastro" value="Finalizar Cadastro" class="btn btn-large btn-success" />
							</div>
						</form>
					</div>
					<?php
						if(isset($_POST['cadastro'])){
							if($_POST['cadastro']=="prestarservicos"){
								echo("<div id='prestarservicos' class='tab-pane fade in active position'>");
								unset($_POST['cadastro']);
							}
							else{
								echo("<div id='prestarservicos' class='tab-pane fade position'>");
							}
						}
						else{
							echo("<div id='prestarservicos' class='tab-pane fade position'>");
						}
					?>
						<h3>Cadastro de Prestador de Serviços</h3>
						<form action="./pages/cadastro/realiza_cadastro.php" method="post">
							<div id="index">
								<label for="nome"><strong>Nome</strong></label>
								<input type="text" id="nome" name="nome" style="width: 80px;" maxlength="30" placeholder="Ex : Gustavo" autofocus required />
							</div>
							<div id="index">
								<label for="sobrenome"><strong>Sobrenome</strong></label>
								<input type="text" id="sobrenome" name="sobrenome" style="width: 140px;" maxlength="50" placeholder="Ex : da Silva" required/>
							</div>
							<div>
								<input type="reset" id="clear_cadastro" name="clear_cadastro" value="Limpar Dados" class="btn btn-large btn-info" />
								<input type="submit" id="submit_cadastro" name="submit_cadastro" value="Finalizar Cadastro" class="btn btn-large btn-success" />
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
</section>