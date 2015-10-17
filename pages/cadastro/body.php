<section class="body">
		<section id="fonte" class="form">
			<div>
				<h1>Cadastro de Usuários PhilGap</h1>
			</div>
			<fieldset id="text" class="alert alert-error">
				<p>Primeiramente, antes de iniciar seu cadastro, precisamos saber para qual finalidade você deseja usar nosso sistema:</p>
			</fieldset>	
			<div id="index" class="left">
				<h2>Cadastrar Necessidade</h2>
				<p>Vou utilizar o sistema para adquirir um produto ou obter um serviço</p>
				<br/>
				<div class="botoes">
					<form action="./fazerparte.php" method="post">
						<input type="hidden" name="cadastro" id="cadastro" value="comprar"/>
						<input class="btn btn-large btn-success" type="submit" value="Realizar Cadastro"/>
					</form>
				</div>
			</div>
			<div id="index" class="center">
				<h2>Atender Necessidade de Produtos</h2>
				<p>Vou utilizar o sistema para ofertar produtos</p>
				<br/>
				<br/>
				<div class="botoes">
					<form action="./fazerparte.php" method="post">
						<input type="hidden" name="cadastro" id="cadastro" value="venderprodutos"/>
						<input class="btn btn-large btn-info" type="submit" value="Realizar Cadastro"/>
					</form>
				</div>
			</div>
			<div id="index" class="right">
				<h2>Atender Necessidade de Serviços</h2>
				<p>Vou utilizar o sistema para oferecer meus serviços</p>
				<br/>
				<div class="botoes">
					<form action="./fazerparte.php" method="post">
						<input type="hidden" name="cadastro" id="cadastro" value="prestarservicos"/>
						<input class="btn btn-large btn-info" type="submit" value="Realizar Cadastro"/>
					</form>
				</div>
			</div>
		</section>
</section>