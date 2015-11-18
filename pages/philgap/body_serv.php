<?php
	require_once ("./classes/OfferServicoController.php");
	$controller = new OfferServicoController();
?>
<section class="body">
	<section class="form">
		<div class="topnav">
			<nav id="index" class="left">
				<?php
					if(isset($_SESSION['busca'])){
						echo("<form action='./findgap.php' method='get'>
								<input type='hidden' id='categoria' name='categoria' value='".$_SESSION['busca']['categoria']."'/>
								<input type='hidden' id='uf' name='uf' value='".$_SESSION['busca']['uf']."'/>
								<input type='hidden' id='status' name='status' value='".$_SESSION['busca']['status']."'/>
								<input type='hidden' id='urgencia' name='urgencia' value='".$_SESSION['busca']['urgencia']."'/>
								<input type='hidden' id='filtro' name='filtro' value='".$_SESSION['busca']['filtro']."'/>
								<input type='submit' class='btn btn-large btn-danger' id='btnVoltar' name='btnVoltar' value='Voltar'/>
							</form>");
					}
					else{
						echo("<form action='./findgap.php' method='get'>
								<input type='hidden' id='categoria' name='categoria' value='0'/>
								<input type='hidden' id='uf' name='uf' value='all'/>
								<input type='hidden' id='status' name='status' value='all'/>
								<input type='hidden' id='urgencia' name='urgencia' value='all'/>
								<input type='hidden' id='filtro' name='filtro' value=''/>
								<input type='submit' class='btn btn-large btn-danger' id='btnVoltar' name='btnVoltar' value='Voltar'/>
							</form>");
					}
				?>
			</nav>
			<div id="index"><h1>Gap de Serviço</h1></div>
			<div id="index" class="right"><a href="#philgap"><button class='btn btn-large btn-success'>PhilGap</button></a></div>
		</div>
		<div id="background" class="text-left">
			<?php
				require_once "./classes/PhilGap.php";
				$gapserv = mysqli_fetch_assoc(PhilGap::gapservid($_GET['idgap']));
				$urgencia = array(0=>"Muito Urgente",1=>"Urgente",2=>"Pouco Urgente", 3=>"Não Urgente",9=>"Não Definido");
				$status = array(0=>"Aberto", 1=>"Em Andamento");
				$colorurgencia = array(0=>"F00000",1=>"FFFF66",2=>"FFFF66",3=>"6699FF",9=>"6699FF");
				
				echo  ("<div id='urgencia' class='fl' style='color:#".$colorurgencia[$gapserv['urgencia']].";'>".$urgencia[$gapserv['urgencia']]."</div>
						<div id='uf' class='fl'>".strtoupper($gapserv['uf'])."</div>
						<div id='cidade' class='fl'>".$gapserv['cidade']."</div>
						<div id='bairro' class='fl'>".$gapserv['bairro']."</div>
						<div id='status' class='sl'>".$status[$gapserv['status']]."</div>
						<div id='cep' class='sl'>".$gapserv['cep']."</div>
						<div id='rua' class='sl'>".$gapserv['logradouro']."</div>
						<div id='numero' class='sl'>".$gapserv['numero']."</div>
						<div id='comp' class='sl'>".$gapserv['complemento']."</div>
						<div></div>
						<div class='ll'>
							<div id='gef' class='dil'>
								<div id='gap'>".$gapserv['gap']."</div>
								<div id='foco'>".$gapserv['foco']."</div>
								<div id='nome'>".$gapserv['nome']."</div>
							</div>
							<div id='desc' class='dil'>
								<div>".$gapserv['descricao']."</div>
							</div>
						</div>");
			?>
		</div>
		</br>
		<hr/>
		</br>
		<h1>Preencha o formulário abaixo para submeter seu orçamento para este Gap!</h1>
		<div id="philgap" class="philgap">
			</br>
			</br>
			</br>
			<div class="text-left" style="width:600px; margin:0 auto;">
				<form action="#" method="post">
					<div style="display: inline-block;">
						<label for="oespecialidade"><strong>Especialidade</strong></label>
						<input type="text" style="width:270px;" id="oespecialidade" name="oespecialidade" size="30" maxlength="50" placeholder="Ex: Vendedor, Eletricista, Programador..." required/>
					</div>
					<div style="display: inline-block; float:right;">
						<label for="oespecializacao"><strong>Especializado em</strong></label>
						<input type="text" style="width:250px;" id="oespecializacao" name="oespecializacao" size="20" maxlength="50" placeholder="Portas, Paredes, Computadores..."/>
					</div>
					<div></div>
					<div style="display: inline-block; width:300px;">
						<label for="oprazoinicio"><strong>Prazo estimado para início do Serviço</strong></label>
						(Em dias)
						<br/>
						<input type="number" style="width:200px;" id="oprazoinicio" name="oprazoinicio" min="1" max="365" placeholder="Ex: 1, 5, 30..." required/>
					</div>
					<div style="display: inline-block;  float:right">
						<label for="oduracao"><strong>Duração do Serviço</strong></label>
						<input type="number" style="width:100px;" id="oduracao" name="oduracao" min="1" max="365" placeholder="Ex: 1, 5, 10..." required/>
						<select id="oduracao2" name="oduracao2" style="width:120px;" required>
							<option value="">Selecione</option>
							<option value="Minutos">Minuto(s)</option>
							<option value="Horas">Hora(s)</option>
							<option value="Dias">Dia(s)</option>
							<option value="Semanas">Semana(s)</option>
							<option value="Mêses">Mês(es)</option>
							<option value="Anos">Ano(s)</option>
						</select>
					</div>
					<div></div>
					<div style="display: inline-block;">
						<label for="odomicilio"><strong>Presta serviço à Domicílio?</strong></label>
						<select id="odomicilio" name="odomicilio" style="width:150px;" required>
							<option value="">Selecione</option>
							<option value="1">Sim</option>
							<option value="0">Não</option>
						</select>
					</div>
					<div style="display: inline-block; float:right;">
						<label for="oorcamentovalor"><strong>Valor do orçamento</strong></label>
						<input type="text" style="width:160px;" id="oorcamentovalor" name="oorcamentovalor" size="30" maxlength="9" placeholder="Ex: R$ 250,00" required/>
					</div>
					<div></div>
					<div>
						<?php
							echo ("<input type='hidden' id='idgap' name='idgap' value='".$_GET['idgap']."'>");
						?>
						</br>
						<center>
							<input type="reset" class="btn btn-large btn-info" id="btnClear" name="btnClear" value="Limpar Campos"/>
							<input type="submit" class="btn btn-large btn-success" id="btnPhilGap" name="acao" value="Ofertar"/>
						</center>
					</div>
				</form>
			</div>
		</div>
	</section>
</section>