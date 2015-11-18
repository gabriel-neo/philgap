<?php
	require_once ("./classes/GapOffersController.php");
	$controller = new GapOffersController();
	$offers = null;
	if (isset($_GET['idgap']) && isset($_GET['gap'])){
		if($_GET['gap']== 1){
			$offers = $controller->GetProdOffers($_GET['idgap']);
		}
		else if($_GET['gap']== 2){
			$offers = $controller->GetServOffers($_GET['idgap']);
		}
	}
?>
<section class="body">
	<section id="text" class="form">
		<div>
			<h1>Visualizar Ofertas</h1>
		</div>
		<div class="txtalignleft">
			<br/>
			<br/>
			<br/>
			<?php
				if(!is_null($offers)){
					$colorcolumns = array(0=>"error",1=>"warning",2=>"info");
					if ($_GET['gap'] == 1){
						?>
							<table class="table table-hover">
								<tr>
									<th><center>Vendedor</center></th>
									<th><center>Produto</center></th>
									<th><center>Especificação</center></th>
									<th><center>Marca</center></th>
									<th><center>Cor</center></th>
									<th><center>Valor</center></th>
									<th><center>Forma de Envio</center></th>
									<th><center>Valor do Envio</center></th>
									<th><center>Link do Produto</center></th>
									<th><center>Escolher Oferta</center></th>
								</tr>
						<?php
						foreach ($offers as $gapoffer){
							if(($gapoffer->getValor() + $gapoffer->getCustoenvio()) <= $gapoffer->precomedio){
								echo("<tr class='".$colorcolumns[2]."'>");
							}
							else if(($gapoffer->getValor() + $gapoffer->getCustoenvio()) <= 1.2*($gapoffer->precomedio)){
								echo("<tr class='".$colorcolumns[1]."'>");
							}
							else if (($gapoffer->getValor() + $gapoffer->getCustoenvio()) > 1.2*($gapoffer->precomedio)){
								echo("<tr class='".$colorcolumns[0]."'>");
							}
							echo ("
										<td><center>".$gapoffer->getNome()."</center></td>
										<td><center>".$gapoffer->getProduto()."</center></td>
										<td><center>".$gapoffer->getEspecificacao()."</center></td>
										<td><center>".$gapoffer->getMarca()."</center></td>
										<td><center>".$gapoffer->getCor()."</center></td>
								");
							if($gapoffer->getValor() > 0){
								echo("<td><center>R$ ".$gapoffer->getValor()."</center></td>");
							}
							else{
								echo("<td><center></center></td>");
							}
							echo("
										<td><center>".$gapoffer->getFormaenvio()."</center></td>
								");
							if($gapoffer->getCustoenvio() > 0){
								echo("<td><center>R$ ".$gapoffer->getCustoenvio()."</center></td>");
							}
							else{
								echo("<td><center></center></td>");
							}
							echo ("
										<td><center><a style='color:#000000;' href='".$gapoffer->getLink()."' target='blank'><strong>Ver Link</strong></a></center></td>
										<td>
											<form action='./pages/closegap.php' method='post'>
												<input type='hidden' id='idgap' name='idgap' value='".$_GET['idgap']."'/>
												<input type='hidden' id='gap' name='gap' value='".$_GET['gap']."'/>
												<input type='hidden' id='idoffer' name='idoffer' value='".$gapoffer->getId()."'/>
												<input type='submit' class='btn btn-inverse' id='closegap' name='closegap' value='Escolher Oferta'/>
											</form>
										</td>
									</tr>
							");
						}
						echo ("</table>");
					}
					else{
						?>
							<table class="table table-hover">
								<tr>
									<th><center>Prestador de Serviço</center></th>
									<th><center>Especialidade</center></th>
									<th><center>Especializado em</center></th>
									<th><center>Prazo para Início</center></th>
									<th><center>Duração do Serviço</center></th>
									<th><center>Atende à Domicílio?</center></th>
									<th><center>Valor do Orçamento</center></th>
									<th><center>Escolher Orçamento</center></th>
								</tr>
						<?php
						foreach ($offers as $gapoffer){
							if($gapoffer->urgencia == 0){
								if ($gapoffer->getPrazoinicio() <= 3){
									echo("<tr class='".$colorcolumns[2]."'>");
								}
								else if ($gapoffer->getPrazoinicio() > 3  && $gapoffer->getPrazoinicio() <= 7){
									echo("<tr class='".$colorcolumns[1]."'>");
								}
								else{
									echo("<tr class='".$colorcolumns[0]."'>");
								}
							}
							else if ($gapoffer->urgencia == 1){
								if ($gapoffer->getPrazoinicio() <= 7){
									echo("<tr class='".$colorcolumns[2]."'>");
								}
								else if ($gapoffer->getPrazoinicio() > 7  && $gapoffer->getPrazoinicio() <= 14){
									echo("<tr class='".$colorcolumns[1]."'>");
								}
								else{
									echo("<tr class='".$colorcolumns[0]."'>");
								}
							}
							else if ($gapoffer->urgencia == 2){
								if ($gapoffer->getPrazoinicio() <= 60){
									echo("<tr class='".$colorcolumns[2]."'>");
								}
								else if ($gapoffer->getPrazoinicio() > 60  && $gapoffer->getPrazoinicio() <= 120){
									echo("<tr class='".$colorcolumns[1]."'>");
								}
								else{
									echo("<tr class='".$colorcolumns[0]."'>");
								}
							}
							else if ($gapoffer->urgencia == 3){
								if ($gapoffer->getPrazoinicio() <= 365){
									echo("<tr class='".$colorcolumns[2]."'>");
								}
								else if ($gapoffer->getPrazoinicio() > 365  && $gapoffer->getPrazoinicio() <= 547){
									echo("<tr class='".$colorcolumns[1]."'>");
								}
								else{
									echo("<tr class='".$colorcolumns[0]."'>");
								}
							}
							else{
								if ($gapoffer->getPrazoinicio() <= 30){
									echo("<tr class='".$colorcolumns[2]."'>");
								}
								else if ($gapoffer->getPrazoinicio() > 30  && $gapoffer->getPrazoinicio() <= 60){
									echo("<tr class='".$colorcolumns[1]."'>");
								}
								else{
									echo("<tr class='".$colorcolumns[0]."'>");
								}
							}
							echo ("
										<td><center>".$gapoffer->getNome()."</center></td>
										<td><center>".$gapoffer->getEspecialidade()."</center></td>
										<td><center>".$gapoffer->getEspecializado()."</center></td>
										<td><center>".$gapoffer->getPrazoinicio()." Dia(s)</center></td>
										<td><center>".$gapoffer->getDuracao()."</center></td>
								");
							if($gapoffer->getDomicilio()==1){
								echo ("<td><center>Sim</center></td>");
							}
							else{
								echo ("<td><center>Não</center></td>");
							}
							echo ("	<td><center>R$ ".$gapoffer->getValor()."</center></td>
									<td>
										<form action='./pages/closegap.php' method='post'>
											<input type='hidden' id='idgap' name='idgap' value='".$_GET['idgap']."'/>
											<input type='hidden' id='gap' name='gap' value='".$_GET['gap']."'/>
											<input type='hidden' id='idoffer' name='idoffer' value='".$gapoffer->getId()."'/>
											<input type='submit' class='btn btn-inverse' id='closegap' name='closegap' value='Escolher Orçamento'/>
										</form>
									</td>
								</tr>
							");
						}
						echo ("</table>");
					}
				}
				else{
					echo ("<h1><center>Este Gap ainda não possui nenhuma oferta!</center></h1>");
				}
			?>
		</div>
	</section>
</section>