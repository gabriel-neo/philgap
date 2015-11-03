<?php
	require_once ("./classes/OfferProdutoController.php");
	$controller = new OfferProdutoController();
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
			<div id="index"><h1>Gap de Produto</h1></div>
			<div id="index" class="right"><a href="#philgap"><button class='btn btn-large btn-success'>PhilGap</button></a></div>
		</div>	
		<div id="background" class="text-left">
			<?php
				require_once "./classes/PhilGap.php";
				$gapserv = mysqli_fetch_assoc(PhilGap::gapprodid($_GET['idgap']));
				$urgencia = array(0=>"Muito Urgente",1=>"Urgente",2=>"Pouco Urgente", 3=>"Não Urgente",9=>"Não Definido");
				$status = array(0=>"Aberto", 1=>"Em Andamento");
				$colorurgencia = array(0=>"F00000",1=>"FFFF66",2=>"FFFF66",3=>"6699FF",9=>"6699FF");
				
				if ($gapserv['precomedio']!='0.00'){
					$aux = $gapserv['precomedio'];
					$gapserv['precomedio'] = "R$ ".$aux;
				}
				else if ($gapserv['precomedio']=='0.00'){
					$gapserv['precomedio'] = "";
				}
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
						<div class='tl'>
							<div id='gap' >".$gapserv['gap']."</div>
							<div id='espec' >".$gapserv['espec']."</div>
						</div>	
						<div></div>
						<div class='ll'>
							<div id='marca'>".$gapserv['marca']."</div>
							<div id='cor'>".$gapserv['cor']."</div>
							<div id='precomedio'>".$gapserv['precomedio']."</div>
						<div></div>
						<div id='nome'>".$gapserv['nome']."</div>
						</div>
						");
			?>
		</div>
		</br>
		<hr/>
		</br>
		<h1>Preencha o formulário abaixo para submeter sua oferta para este Gap!</h1>
		<div id="philgap" class="philgap">
			</br>
			</br>
			</br>
			<div class="text-left" style="width:600px; margin:0 auto;">
				<form action="#" method="post">
					<div style="display: inline-block;">
						<label for="oproduto"><strong>Produto</strong></label>
						<input type="text" id="oproduto" name="oproduto" size="30" maxlength="50" placeholder="Descrição do produto" required/>
					</div>
					<div style="display: inline-block; float:right;">
						<label for="oespec"><strong>Especificação</strong></label>
						<input type="text" style="width:250px;" id="oespec" name="oespec" size="20" maxlength="50" placeholder="Especificação Técnica"/>
					</div>
					<div></div>
					<div style="display: inline-block; width:248px;">
						<label for="omarca"><strong>Marca</strong></label>
						<input type="text" id="omarca" name="omarca" size="30" maxlength="50" placeholder="Marca do produto"/>
					</div>
					<div style="display: inline-block;">
						<label for="ocor"><strong>Cor</strong></label>
						<input type="text" style="width:100px;" id="ocor" name="ocor" size="30" maxlength="50" placeholder="Cor..."/>
					</div>
					<div style="display: inline-block; float:right;">
						<label for="ovalor"><strong>Preço</strong></label>
						<input type="number" style="width:190px;" id="ovalor" name="ovalor" size="30" maxlength="50" placeholder="Valor de venda" required/>
					</div>
					<div></div>
					<div style="display: inline-block;">
						<label for="olink"><strong>Link do produto</strong></label>
						<input type="text" style="width:350px;" id="olink" name="olink" size="30" maxlength="50" placeholder="http://link.com.br/"/>
					</div>
					<div></div>
					<div style="display: inline-block;">
						<label for="oentrega"><strong>Forma de envio</strong></label>
						<input type="text" style="width:250px;" id="oentrega" name="oentrega" size="30" maxlength="50" placeholder="Retirada no local, PAC, Sedex" required/>
					</div>
					<div style="display: inline-block; float:right;">
						<label for="oentregavalor"><strong>Valor do envio</strong></label>
						<input type="number" style="width:160px;" id="oentregavalor" name="oentregavalor" size="9" maxlength="9" placeholder="Ex: R$ 24,90" required/>
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