<section class="body">
	<section id="fonte" class="form">
		<?php
			unset($_SESSION['necessidade']);
		?>
		<div class="generaljoin">
			<h1>Cadastro de Necessidade</h1>
			<h3>Procuro por :</h3>
			<div id="opcao" class="nav-tabs">
				<button class="btn btn-large"><a class="corfonte" data-toggle="tab" href="#produto"><strong>Produto</strong></a></button>
				<button class="btn btn-large"><a class="corfonte" data-toggle="tab" href="#servico"><strong>Serviço</strong></a></button>
			</div>
			<div id="background" class="tab-content">
				<div id="produto" class="tab-pane fade in active position">
					<div id="fixed">
						<center><h3>Busco pelo Produto</h3></center>
						<br/>
						<form action="./pages/addgap/insertgap_prod.php" method="post" class="form-horizontal">
							<!-- Nome, Especificação, Marca e Cor -->
							<div id="index">
								<label for="produto"><strong>Produto</strong></label>
								<input type="text" id="produto" name="produto" style="width: 250px;" maxlength="30" placeholder="Ex : Celular, Blusa, Panela..." autofocus required />
							</div>
							<div id="index">
								<label for="especificacao"><strong>Especificação</strong></label>
								<input type="text" id="especificacao" name="especificacao" style="width: 350px;" maxlength="50" placeholder="Ex : 6S 64GB Desbloqueado..." required />
							</div>
							<br/>
							<br/>
							<div id="index">
								<label for="marca"><strong>Marca</strong></label>
								<input type="text" id="marca" name="marca" style="width: 200px;" maxlength="20" placeholder="Ex : Apple" />
							</div>
							<div id="index">
								<label for="cor"><strong>Cor</strong></label>
								<input type="text" id="cor" name="cor" style="width: 200px;" maxlength="20" placeholder="Ex : Branca"/>
							</div>
							<br/>
							<br/>
							<div>
								<label for="precomedio"><strong>Preço Médio</strong></label>
								<input type="text" id="precomedio" name="precomedio" style="width: 200px;" maxlength="13" placeholder="Ex : 3500,00"/>
							</div>
							<br/>
							<!-- Prazo & Urgencia -->
							<div>
								<label for="urgencia"><strong>Para quando você precisa deste Produto?</strong></label>
								<select style="width:200px;" id="urgencia" name="urgencia" required >
									<option value="">Urgência</option>
									<option value="0">Mais rápido possível</option>
									<option value="1">Próximos dias</option>
									<option value="2">Próximos meses</option>
									<option value="3">Este ano</option>
									<option value="9">Não tenho previsão</option>
								</select>
							</div>
							<br/>
							<!-- Endereço -->
							<h4>Endereço de entrega do Produto</h4>
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
									<input type="reset" id="cleargap" name="cleargap" value="Limpar Dados" class="btn btn-large btn-info" />
									<input type="submit" id="addgap" name="addgap" value="Adicionar Necessidade" class="btn btn-large btn-success" />
								</center>
							</div>
						</form>
					</div>
				</div>
				<div id="servico" class="tab-pane fade position">
					<div id="fixed">
						<center><h3>Busco pelo Serviço</h3></center>
						<br/>
						<form action="./pages/addgap/insertgap_serv.php" method="post" class="form-horizontal">
							<!-- Especialidade e Objeto Principal -->
							<div>
								<label for="especialidade"><strong>Serviço de qual Especialidade?</strong></label>
								<input type="text" id="especialidade" name="especialidade" style="width: 250px;" maxlength="20" placeholder="Ex : Pedreiro, Eletricista, Pintor..." autofocus required />
							</div>
							<br/>
							<br/>
							<!-- Foco Principal -->
							<div>
								<label for="foco"><strong>Onde será aplicado o Serviço?</strong></label>
								<input type="text" id="foco" name="foco" style="width: 290px;" maxlength="20" placeholder="Ex : Parede, Porta, Computador, Carro..." required />
							</div>
							<br/>
							<br/>
							<!-- Descrição -->
							<div>
								<label for="descricao"><strong>Descrição Detalhada</strong></label>
								<textarea class="form-field form-area-field input-xlarge" style="width:400px;" maxlength="400" rows="5" cols="20" id="descricao" name="descricao" placeholder="Ex : Preciso de pintar uma parede de 3 x 7 metros..." required></textarea>
							</div>
							<br/>
							<br/>
							<!-- Prazo & Urgencia -->
							<div>
								<label for="urgencia"><strong>Para quando você precisa deste Serviço?</strong></label>
								<select style="width:200px;" id="urgencia" name="urgencia" required >
									<option value="">Urgência</option>
									<option value="0">Mais rápido possível</option>
									<option value="1">Próximos dias</option>
									<option value="2">Próximos meses</option>
									<option value="3">Este ano</option>
									<option value="9">Não tenho previsão</option>
								</select>
							</div>
							<br/>
							<br/>
							<!-- Endereço -->
							<h4>Endereço do local do Serviço</h4>
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
									<input type="reset" id="cleargap" name="cleargap" value="Limpar Dados" class="btn btn-large btn-info" />
									<input type="submit" id="addgap" name="addgap" value="Adicionar Necessidade" class="btn btn-large btn-success" />
								</center>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</section>