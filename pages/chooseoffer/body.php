<?php
	require_once ("./classes/ShowGapUserController.php");
	$controller = new ShowGapUserController();
	$controller->GetGap();
?>
<section class="body">
	<section id="text" class="form">
		<div>
			<h1>Gap's Cadastrados</h1>
		</div>
		<div class="txtalignleft">
			<?php
				$gaps = $_SESSION['gaps'];
			?>
			<form action="./chooseoffer.php" class="seleciona_produtos" method="get">
				<legend>Use os campos abaixo para filtrar</legend>
				<table>
					<tr>
						<td>
							<label for="categoria">Categoria</label>
							<select name="categoria" id="categoria" style="width:100px;">
								<option <?php if(isset($_GET['categoria'])){if($_GET['categoria']==0){echo("selected");}} ?> name="todos" value="0" >Todas</option>
								<option <?php if(isset($_GET['categoria'])){if($_GET['categoria']==1){echo("selected");}} ?> id="produtos" name="produtos" value="1" >Produtos</option>
								<option <?php if(isset($_GET['categoria'])){if($_GET['categoria']==2){echo("selected");}} ?> id="servicos" name="servicos" value="2" >Serviços</option>
							</select>
						</td>
						<td>
							<label for="status">Status</label>
							<select name="status" id="status" style="width:150px;">
								<option value="all">Todos</option>
								<option <?php if(isset($_GET['status'])){if($_GET['status']=="0"){echo("selected");}} ?> value="0">Aberto</option>
								<option <?php if(isset($_GET['status'])){if($_GET['status']=="1"){echo("selected");}} ?> value="1">Em andamento</option>
							</select>
						</td>
						<td>
							<label for="urgencia">Urgência</label>
							<select name="urgencia" id="urgencia" style="width:140px;">
								<option value="all">Todas</option>
								<option <?php if(isset($_GET['urgencia'])){if($_GET['urgencia']=="0"){echo("selected");}} ?> value="0">Muito urgente</option>
								<option <?php if(isset($_GET['urgencia'])){if($_GET['urgencia']=="1"){echo("selected");}} ?> value="1">Urgente</option>
								<option <?php if(isset($_GET['urgencia'])){if($_GET['urgencia']=="2"){echo("selected");}} ?> value="2">Pouco urgente</option>
								<option <?php if(isset($_GET['urgencia'])){if($_GET['urgencia']=="3"){echo("selected");}} ?> value="3">Não urgente</option>
								<option <?php if(isset($_GET['urgencia'])){if($_GET['urgencia']=="9"){echo("selected");}} ?> value="9">Não definida</option>
							</select>
						</td>
						<td>
							<label for="filtro">Filtrar necessidades</label>
							<input type="text" id="filtro" name="filtro" style="width:230px;" maxlength="20" placeholder="Ex : Celular, Bombeiro, Notebook..." <?php if(isset($_GET['filtro'])){if($_GET['filtro']!=""){echo("value='".$_GET['filtro']."'");}} ?>/>
						</td>
						<td>
							<input type="submit" class="btn btn-info" id="filtrar" name="filtrar" value="Find Gap" style="margin-top:15px;" />
						</td>
					</tr>
				</table>
			</form>
			<table class="table table-hover">
				<tr>
					<th>Categoria</th>
					<th>Status</th>
					<th>Urgência</th>
					<th>Gap</th>
					<th>Descrição</th>
					<th>Ofertas</th>
					<th><center>Visualizar Ofertas</center></th>
				</tr>
				<?php
					$urgencia = array(0=>"Muito Urgente",1=>"Urgente",2=>"Pouco Urgente", 3=>"Não Urgente",9=>"Não Definido");
					$status = array(0=>"Aberto", 1=>"Em Andamento");
					$colorcolumns = array(0=>"error",1=>"warning",2=>"warning",3=>"info",4=>"info");
					if(!is_null($gaps[0])){
						while($gapprod = mysqli_fetch_assoc($gaps[0])){
							if (isset($_GET['categoria'])){
								if ($_GET['categoria'] == 2){
									break;
								}
							}
							if (isset($_GET['status'])){
								if ($_GET['status'] != $gapprod['status'] && $_GET['status'] != "all"){
									continue;
								}
							}
							if (isset($_GET['urgencia'])){
								if ($_GET['urgencia'] != $gapprod['urgencia'] && $_GET['urgencia'] != "all"){
									continue;
								}
							}
							if (isset($_GET['filtro']) && $_GET['filtro']!=""){
								$sel_cat = strtolower("| ".$gapprod['gap']." | ". $gapprod['desc']);
								$categoria = strtolower("".$_GET['filtro']."");

								if(!strpos($sel_cat,$categoria) !== false){
									continue;
								 }
							}
							if($gapprod['urgencia']==0){
								echo ("<tr class='".$colorcolumns[0]."'>");
							}
							else if ($gapprod['urgencia']==1){
								echo ("<tr class='".$colorcolumns[1]."'>");
							}
							else if ($gapprod['urgencia']==2){
								echo ("<tr class='".$colorcolumns[2]."'>");
							}
							else if ($gapprod['urgencia']==3){
								echo ("<tr class='".$colorcolumns[3]."'>");
							}
							else if ($gapprod['urgencia']==9){
								echo ("<tr class='".$colorcolumns[4]."'>");
							}
							echo ("
										<td>Produto</td>
										<td>".$status[$gapprod['status']]."</td>
										<td>".$urgencia[$gapprod['urgencia']]."</td>
										<td>".$gapprod['gap']."</td>
										<td>".$gapprod['desc']."</td>
										<td><center>". 0 ."</center></td>
										<td><a style='color:#000000;' href='./philgapprod.php?idgap=".$gapprod['id']."'><center><strong>Abrir</strong></center></a></td>
								   </tr>");
						}
					}
					if(!is_null($gaps[1])){
						while($gapserv = mysqli_fetch_assoc($gaps[1])){
							if (isset($_GET['categoria'])){
								if ($_GET['categoria'] == 1){
									break;
								}
							}
							if (isset($_GET['status'])){
								if ($_GET['status'] != $gapserv['status'] && $_GET['status'] != "all"){
									continue;
								}
							}
							if (isset($_GET['urgencia'])){
								if ($_GET['urgencia'] != $gapserv['urgencia'] && $_GET['urgencia'] != "all"){
									continue;
								}
							}
							if (isset($_GET['filtro']) && $_GET['filtro']!=""){
								$sel_cat = strtolower("| ".$gapserv['gap']." | ". $gapserv['desc']);
								$categoria = strtolower("".$_GET['filtro'].""); 

								if(!strpos($sel_cat,$categoria) !== false){
									continue;
								 }
							}
							if($gapserv['urgencia']==0){
								echo ("<tr class='".$colorcolumns[0]."'>");
							}
							else if ($gapserv['urgencia']==1){
								echo ("<tr class='".$colorcolumns[1]."'>");
							}
							else if ($gapserv['urgencia']==2){
								echo ("<tr class='".$colorcolumns[2]."'>");
							}
							else if ($gapserv['urgencia']==3){
								echo ("<tr class='".$colorcolumns[3]."'>");
							}
							else if ($gapserv['urgencia']==9){
								echo ("<tr class='".$colorcolumns[4]."'>");
							}
							echo ("
										<td>Serviço</td>
										<td>".$status[$gapserv['status']]."</td>
										<td>".$urgencia[$gapserv['urgencia']]."</td>
										<td>".$gapserv['gap']."</td>
										<td>".$gapserv['desc']."</td>
										<td><center>". 0 ."</center></td>
										<td><a style='color:#000000;' href='./philgapserv.php?idgap=".$gapserv['id']."'><center><strong>Abrir</strong></center></a></td>
								   </tr>");
						}
					}
				?>
			</table>
		</div>
	</section>
</section>