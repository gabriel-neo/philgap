<section class="body">
	<section class="form">
		<h1>Atender Necessidade</h1>
		<h3>Submeter oferta para :</h3>
		<div class="txtalignleft">
			<?php
				unset($_SESSION['busca']);
			?>
			<form action="./findgap.php" class="seleciona_produtos" method="get">
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
							<label for="uf">Estado</label>
							<select name="uf" id="uf" style="width:80px;">
								<option value="all">Todos</option>
								<?php
									$estado=array(0=>"ac", 1=>"al", 2=>"ap", 3=>"am", 4=>"ba", 5=>"ce", 6=>"df", 7=>"es", 8=>"go", 9=>"ma",
									10=>"mt", 11=>"ms", 12=>"mg", 13=>"pa", 14=>"pb", 15=>"pr", 16=>"pe", 17=>"pi", 18=>"rj", 19=>"rn", 20=>"rs",
									21=>"ro", 22=>"rr", 23=>"sc", 24=>"sp", 25=>"se", 26=>"to");
									
									for($i=0;$i<27;$i++){
										if (isset($_GET['uf'])){
											if($_GET['uf']==$estado[$i]){
												echo("<option selected value='".$estado[$i]."'>".strtoupper($estado[$i])."</option>");
											}
											else{
												echo("<option value='".$estado[$i]."'>".strtoupper($estado[$i])."</option>");
											}
										}
										else{
											echo("<option value='".$estado[$i]."'>".strtoupper($estado[$i])."</option>");
										}
									}
								?>
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
			<?php
				include "./classes/FindGap.php";
				
				$findgap = new FindGap();
				
				if (!isset($_GET['categoria'])){
					$lastprod = $findgap->showgapprod();
					$lastserv = $findgap->showgapserv();
				}
				else if (isset($_GET['categoria']) && $_GET['categoria']==0){
					$lastprod = $findgap->filtraprod($_GET['uf'], $_GET['status'], $_GET['urgencia'], $_GET['filtro']);
					$lastserv = $findgap->filtraserv($_GET['uf'], $_GET['status'], $_GET['urgencia'], $_GET['filtro']);
				}
				else if(isset($_GET['categoria']) && $_GET['categoria']==1){
					$lastprod = $findgap->filtraprod($_GET['uf'], $_GET['status'], $_GET['urgencia'], $_GET['filtro']);
					$lastserv = null;
				}
				else if(isset($_GET['categoria']) && $_GET['categoria']==2){
					$lastserv = $findgap->filtraserv($_GET['uf'], $_GET['status'], $_GET['urgencia'], $_GET['filtro']);
					$lastprod = null;
				}
				if(isset($_GET['categoria']) && isset($_GET['uf']) && isset($_GET['status']) && isset($_GET['urgencia']) && isset($_GET['filtro'])){
					$_SESSION['busca'] = array("categoria"=>$_GET['categoria'], "uf"=>$_GET['uf'], "status"=>$_GET['status'], "urgencia"=>$_GET['urgencia'], "filtro"=>$_GET['filtro']);
				}
			?>
			<table class="table table-hover">
				<tr>
					<th>Categoria</th>
					<th>Estado</th>
					<th>Status</th>
					<th>Urgência</th>
					<th>Gap</th>
					<th>Descrição</th>
					<th>Cliente</th>
					<th><center>Inserir Oferta</center></th>
				</tr>
				<?php
					
					$urgencia = array(0=>"Muito Urgente",1=>"Urgente",2=>"Pouco Urgente", 3=>"Não Urgente",9=>"Não Definido");
					$status = array(0=>"Aberto", 1=>"Em Andamento");
					$colorcolumns = array(0=>"error",1=>"warning",2=>"warning",3=>"info",4=>"info");
					
					if(!is_null($lastprod)){
						while($gapprod = mysqli_fetch_array($lastprod)){
							if($gapprod['urgencia']==0){
								echo ("<tr class='".$colorcolumns[0]."'>");
								/*teste para linha da tabela ser clicavel
								?>
									<tr class="error" onclick="location.href = 'index.php';" style="cursor: hand;">
								<?php
								*/
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
										<td>".strtoupper($gapprod['uf'])."</td>
										<td>".$status[$gapprod['status']]."</td>
										<td>".$urgencia[$gapprod['urgencia']]."</td>
										<td>".$gapprod['gap']."</td>
										<td>".$gapprod['desc']."</td>
										<td>".$gapprod['nome']."</td>
										<td><a style='color:#000000;' href='./philgapprod.php?idgap=".$gapprod['id']."'><center><strong>Phil Gap</strong></center></a></td>
								   </tr>");
						}
					}
					if(!is_null($lastserv)){
						while($gapserv = mysqli_fetch_array($lastserv)){
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
										<td>".strtoupper($gapserv['uf'])."</td>
										<td>".$status[$gapserv['status']]."</td>
										<td>".$urgencia[$gapserv['urgencia']]."</td>
										<td>".$gapserv['gap']."</td>
										<td>".$gapserv['desc']."</td>
										<td>".$gapserv['nome']."</td>
										<td><a style='color:#000000;' href='./philgapserv.php?idgap=".$gapserv['id']."'><center><strong>Phil Gap</strong></center></a></td>
								   </tr>");
						}
					}
				?>
			</table>
		</div>
	</section>
</section>