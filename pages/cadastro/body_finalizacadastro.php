<section class="body">
	<section id="fonte" class="form">
		<div class="generaljoin">
			<h1>Cadastro de Usuários</h1>
			<center><h3>Finalizar Cadastro</h3></center>
			<div id="fixed">
				<br/>
				<form action="./pages/cadastro/realiza_cadastro.php" method="post" class="position">
					<!-- E-mail e Senha -->
					<div>
						<label for="email"><strong>E-mail</strong></label>
						<input type="email" id="email" name="email" style="width: 250px;" maxlength="30" autofocus required />
					</div>
					<div>
						<label for="senha"><strong>Senha</strong></label>
						<input type="password" id="senha" name="senha" style="width: 350px;" maxlength="50" required/>
					</div>
					<div>
						<label for="senhaconfirmar"><strong>Confirmar Senha</strong></label>
						<input type="password" id="senhaconfirmar" name="senhaconfirmar" style="width: 350px;" maxlength="50" required/>
					</div>
					<br/>
					<br/>
					<div>
						<center>
							<input type="reset" id="clear_cadastro" name="clear_cadastro" value="Limpar Dados" class="btn btn-large btn-info" />
							<input type="submit" id="submit_cadastro" name="submit_cadastro" value="Finalizar Cadastro" class="btn btn-large btn-success" />
						</center>
					</div>
				</form>
			</div>
		</div>
	</section>
</section>