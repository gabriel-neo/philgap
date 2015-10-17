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
					<div id="fixed">
						<center><h3>Cadastro de Comprador</h3></center>
						<br/>
						<?php
							unset($_SESSION['pessoa']);
						?>
						<form action="./pages/cadastro/realiza_cadastro.php" method="post" class="form-horizontal">
							<!-- Nome e Sobrenome -->
							<div id="index">
								<label for="nome"><strong>Nome</strong></label>
								<input type="text" id="nome" name="nome" style="width: 250px;" maxlength="30" autofocus required />
							</div>
							<div id="index">
								<label for="sobrenome"><strong>Sobrenome</strong></label>
								<input type="text" id="sobrenome" name="sobrenome" style="width: 350px;" maxlength="50" required/>
							</div>
							<br/>
							<br/>
							<!-- Sexo e Data de Nascimento -->
							<div class="index2 sexo">
								<label for="sexo"><strong>Sexo</strong></label>
								<div id="index" class="radio">
									<label for="sexom"><input type="radio" name="sexo" id="sexom" value="m" required>Masculino</label>
								</div>
								 <div id="index" class="radio">
									<label for="sexof"><input type="radio" name="sexo" id="sexof" value="f">Feminino</label>
								</div>
							</div>
							<div class="index2">
								<label for="datanasc"><strong>Data de Nascimento</strong></label>
								<select style="width:60px;" class="index2" id="dia" name="dia" required>
									<?php
										echo ("<option value=''>Dia</option>");
										for($i=1;$i<=31;$i++){
											echo ("<option value='$i'>$i</option>");
										}
									?>
								</select>
								<select style="width:150px;" class="index2" id="mes" name="mes" required>
									<option value="">Mês</option>
									<option value="1">Janeiro</option><option value="2">Fevereiro</option>
									<option value="3">Março</option><option value="4">Abril</option>
									<option value="5">Maio</option><option value="6">Junho</option>
									<option value="7">Julho</option><option value="8">Agosto</option>
									<option value="9">Setembro</option><option value="10">Outubro</option>
									<option value="11">Novembro</option><option value="12">Dezembro</option>
								</select>
								<select style="width:90px;" class="index2" id="ano" name="ano" required>
									<?php
										echo ("<option value='' selected>Ano</option>");
										for($i=2015;$i>=1905;$i--){
											echo ("<option value='$i'>$i</option>");
										}
									?>
								</select>
							</div>
							<br/>
							<br/>
							<!-- CPF e RG -->
							<div id="index" style="width:265px;">
								<label for="cpf"><strong>CPF</strong></label>
								<input type="text" id="cpf" name="cpf" style="width: 200px;" maxlength="14" required />
							</div>
							<div id="index">
								<label for="rg"><strong>RG</strong></label>
								<input type="text" id="rg" name="rg" style="width: 200px;" maxlength="14" required />
							</div>
							<br/>
							<br/>
							<!-- Endereço -->
							<h4>Endereço</h4>
							<br/>
							<div style="width:265px;">
								<label for="cep"><strong>CEP</strong></label>
								<input type="text" id="cep" name="cep" style="width: 120px;" maxlength="9" required />
							</div>
							<br/>
							<div id="index" style="width:300px;">
								<label for="logradouro"><strong>Logradouro</strong></label>
								<input type="text" id="logradouro" name="logradouro" style="width: 260px;" maxlength="50" required />
							</div>
							<div id="index"style="width: 130px;">
								<label for="numero"><strong>Número</strong></label>
								<input type="text" id="numero" name="numero" style="width: 90px;" maxlength="6" required />
							</div>	
							<div id="index">
								<label for="complemento"><strong>Complemento</strong></label>
								<input type="text" id="complemento" name="complemento" style="width: 160px;" maxlength="30" />
							</div>	
							<br/>
							<br/>
							<div id="index" style="width:360px;">
								<label for="bairro"><strong>Bairro</strong></label>
								<input type="text" id="bairro" name="bairro" style="width: 160px;" maxlength="30" required />
							</div>
							<div id="index"style="width: 180px;">
								<label for="cidade"><strong>Cidade</strong></label>
								<input type="text" id="cidade" name="cidade" style="width: 160px;" maxlength="30" required />
							</div>	
							<div id="index">
								<label for="uf"><strong>Estado</strong></label>
								<select style="width:60px;" class="index2" id="uf" name="uf" required >
									<option value="">UF</option>
									<option value="ac">AC</option><option value="al">AL</option>
									<option value="ap">AP</option><option value="am">AM</option>
									<option value="ba">BA</option><option value="ce">CE</option>
									<option value="df">DF</option><option value="es">ES</option>
									<option value="go">GO</option><option value="ma">MA</option>
									<option value="mt">MT</option><option value="ms">MS</option>
									<option value="mg">MG</option><option value="pa">PA</option>
									<option value="pb">PB</option><option value="pr">PR</option>
									<option value="pe">PE</option><option value="pi">PI</option>
									<option value="rj">RJ</option><option value="rn">RN</option>
									<option value="rs">RS</option><option value="ro">RO</option>
									<option value="rr">RR</option><option value="sc">SC</option>
									<option value="sp">SP</option><option value="se">SE</option>
									<option value="to">TO</option>
								</select>
							</div>
							<br/>
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
					<div id="fixed">
						<center><h3>Cadastro de Vendedor de Produtos</h3></center>
						<form action="./pages/cadastro/realiza_cadastro.php" method="post" class="form-horizontal">
							<!-- Nome e Sobrenome -->
							<div id="index">
								<label for="nome"><strong>Nome</strong></label>
								<input type="text" id="nome" name="nome" style="width: 250px;" maxlength="30" autofocus required />
							</div>
							<div id="index">
								<label for="sobrenome"><strong>Sobrenome</strong></label>
								<input type="text" id="sobrenome" name="sobrenome" style="width: 350px;" maxlength="50" required/>
							</div>
							<br/>
							<br/>
							<!-- Sexo e Data de Nascimento -->
							<div class="index2 sexo">
								<label for="sexo"><strong>Sexo</strong></label>
								<div id="index" class="radio">
									<label for="sexom"><input type="radio" name="sexo" id="sexom" value="m" required>Masculino</label>
								</div>
								 <div id="index" class="radio">
									<label for="sexof"><input type="radio" name="sexo" id="sexof" value="f">Feminino</label>
								</div>
							</div>
							<div class="index2">
								<label for="datanasc"><strong>Data de Nascimento</strong></label>
								<select style="width:60px;" class="index2" id="dia" name="dia" required>
									<?php
										echo ("<option value=''>Dia</option>");
										for($i=1;$i<=31;$i++){
											echo ("<option value='$i'>$i</option>");
										}
									?>
								</select>
								<select style="width:150px;" class="index2" id="mes" name="mes" required>
									<option value="">Mês</option>
									<option value="1">Janeiro</option><option value="2">Fevereiro</option>
									<option value="3">Março</option><option value="4">Abril</option>
									<option value="5">Maio</option><option value="6">Junho</option>
									<option value="7">Julho</option><option value="8">Agosto</option>
									<option value="9">Setembro</option><option value="10">Outubro</option>
									<option value="11">Novembro</option><option value="12">Dezembro</option>
								</select>
								<select style="width:90px;" class="index2" id="ano" name="ano" required>
									<?php
										echo ("<option value='' selected>Ano</option>");
										for($i=2015;$i>=1905;$i--){
											echo ("<option value='$i'>$i</option>");
										}
									?>
								</select>
							</div>
							<br/>
							<br/>
							<!-- CPF e RG -->
							<div id="index" style="width:265px;">
								<label for="cpf"><strong>CPF</strong></label>
								<input type="text" id="cpf" name="cpf" style="width: 200px;" maxlength="14" required />
							</div>
							<div id="index">
								<label for="rg"><strong>RG</strong></label>
								<input type="text" id="rg" name="rg" style="width: 200px;" maxlength="14" required />
							</div>
							<br/>
							<br/>
							<!-- Endereço -->
							<h4>Endereço</h4>
							<br/>
							<div style="width:265px;">
								<label for="cep"><strong>CEP</strong></label>
								<input type="text" id="cep" name="cep" style="width: 120px;" maxlength="9" required />
							</div>
							<br/>
							<div id="index" style="width:300px;">
								<label for="logradouro"><strong>Logradouro</strong></label>
								<input type="text" id="logradouro" name="logradouro" style="width: 260px;" maxlength="50" required />
							</div>
							<div id="index"style="width: 130px;">
								<label for="numero"><strong>Número</strong></label>
								<input type="text" id="numero" name="numero" style="width: 90px;" maxlength="6" required />
							</div>	
							<div id="index">
								<label for="complemento"><strong>Complemento</strong></label>
								<input type="text" id="complemento" name="complemento" style="width: 160px;" maxlength="30" />
							</div>	
							<br/>
							<br/>
							<div id="index" style="width:360px;">
								<label for="bairro"><strong>Bairro</strong></label>
								<input type="text" id="bairro" name="bairro" style="width: 160px;" maxlength="30" required />
							</div>
							<div id="index"style="width: 180px;">
								<label for="cidade"><strong>Cidade</strong></label>
								<input type="text" id="cidade" name="cidade" style="width: 160px;" maxlength="30" required />
							</div>	
							<div id="index">
								<label for="uf"><strong>Estado</strong></label>
								<select style="width:60px;" class="index2" id="uf" name="uf" required >
									<option value="">UF</option>
									<option value="ac">AC</option><option value="al">AL</option>
									<option value="ap">AP</option><option value="am">AM</option>
									<option value="ba">BA</option><option value="ce">CE</option>
									<option value="df">DF</option><option value="es">ES</option>
									<option value="go">GO</option><option value="ma">MA</option>
									<option value="mt">MT</option><option value="ms">MS</option>
									<option value="mg">MG</option><option value="pa">PA</option>
									<option value="pb">PB</option><option value="pr">PR</option>
									<option value="pe">PE</option><option value="pi">PI</option>
									<option value="rj">RJ</option><option value="rn">RN</option>
									<option value="rs">RS</option><option value="ro">RO</option>
									<option value="rr">RR</option><option value="sc">SC</option>
									<option value="sp">SP</option><option value="se">SE</option>
									<option value="to">TO</option>
								</select>
							</div>
							<br/>
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
					<div id="fixed">
						<center><h3>Cadastro de Prestador de Serviços</h3></center>
						<form action="./pages/cadastro/realiza_cadastro.php" method="post" class="form-horizontal">
							<!-- Nome e Sobrenome -->
							<div id="index">
								<label for="nome"><strong>Nome</strong></label>
								<input type="text" id="nome" name="nome" style="width: 250px;" maxlength="30" autofocus required />
							</div>
							<div id="index">
								<label for="sobrenome"><strong>Sobrenome</strong></label>
								<input type="text" id="sobrenome" name="sobrenome" style="width: 350px;" maxlength="50" required/>
							</div>
							<br/>
							<br/>
							<!-- Sexo e Data de Nascimento -->
							<div class="index2 sexo">
								<label for="sexo"><strong>Sexo</strong></label>
								<div id="index" class="radio">
									<label for="sexom"><input type="radio" name="sexo" id="sexom" value="m" required>Masculino</label>
								</div>
								 <div id="index" class="radio">
									<label for="sexof"><input type="radio" name="sexo" id="sexof" value="f">Feminino</label>
								</div>
							</div>
							<div class="index2">
								<label for="datanasc"><strong>Data de Nascimento</strong></label>
								<select style="width:60px;" class="index2" id="dia" name="dia" required>
									<?php
										echo ("<option value=''>Dia</option>");
										for($i=1;$i<=31;$i++){
											echo ("<option value='$i'>$i</option>");
										}
									?>
								</select>
								<select style="width:150px;" class="index2" id="mes" name="mes" required>
									<option value="">Mês</option>
									<option value="1">Janeiro</option><option value="2">Fevereiro</option>
									<option value="3">Março</option><option value="4">Abril</option>
									<option value="5">Maio</option><option value="6">Junho</option>
									<option value="7">Julho</option><option value="8">Agosto</option>
									<option value="9">Setembro</option><option value="10">Outubro</option>
									<option value="11">Novembro</option><option value="12">Dezembro</option>
								</select>
								<select style="width:90px;" class="index2" id="ano" name="ano" required>
									<?php
										echo ("<option value='' selected>Ano</option>");
										for($i=2015;$i>=1905;$i--){
											echo ("<option value='$i'>$i</option>");
										}
									?>
								</select>
							</div>
							<br/>
							<br/>
							<!-- CPF e RG -->
							<div id="index" style="width:265px;">
								<label for="cpf"><strong>CPF</strong></label>
								<input type="text" id="cpf" name="cpf" style="width: 200px;" maxlength="14" required />
							</div>
							<div id="index">
								<label for="rg"><strong>RG</strong></label>
								<input type="text" id="rg" name="rg" style="width: 200px;" maxlength="14" required />
							</div>
							<br/>
							<br/>
							<!-- Endereço -->
							<h4>Endereço</h4>
							<br/>
							<div style="width:265px;">
								<label for="cep"><strong>CEP</strong></label>
								<input type="text" id="cep" name="cep" style="width: 120px;" maxlength="9" required />
							</div>
							<br/>
							<div id="index" style="width:300px;">
								<label for="logradouro"><strong>Logradouro</strong></label>
								<input type="text" id="logradouro" name="logradouro" style="width: 260px;" maxlength="50" required />
							</div>
							<div id="index"style="width: 130px;">
								<label for="numero"><strong>Número</strong></label>
								<input type="text" id="numero" name="numero" style="width: 90px;" maxlength="6" required />
							</div>	
							<div id="index">
								<label for="complemento"><strong>Complemento</strong></label>
								<input type="text" id="complemento" name="complemento" style="width: 160px;" maxlength="30" />
							</div>	
							<br/>
							<br/>
							<div id="index" style="width:360px;">
								<label for="bairro"><strong>Bairro</strong></label>
								<input type="text" id="bairro" name="bairro" style="width: 160px;" maxlength="30" required />
							</div>
							<div id="index"style="width: 180px;">
								<label for="cidade"><strong>Cidade</strong></label>
								<input type="text" id="cidade" name="cidade" style="width: 160px;" maxlength="30" required />
							</div>	
							<div id="index">
								<label for="uf"><strong>Estado</strong></label>
								<select style="width:60px;" class="index2" id="uf" name="uf" required >
									<option value="">UF</option>
									<option value="ac">AC</option><option value="al">AL</option>
									<option value="ap">AP</option><option value="am">AM</option>
									<option value="ba">BA</option><option value="ce">CE</option>
									<option value="df">DF</option><option value="es">ES</option>
									<option value="go">GO</option><option value="ma">MA</option>
									<option value="mt">MT</option><option value="ms">MS</option>
									<option value="mg">MG</option><option value="pa">PA</option>
									<option value="pb">PB</option><option value="pr">PR</option>
									<option value="pe">PE</option><option value="pi">PI</option>
									<option value="rj">RJ</option><option value="rn">RN</option>
									<option value="rs">RS</option><option value="ro">RO</option>
									<option value="rr">RR</option><option value="sc">SC</option>
									<option value="sp">SP</option><option value="se">SE</option>
									<option value="to">TO</option>
								</select>
							</div>
							<br/>
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
			</div>
		</div>
	</section>
</section>