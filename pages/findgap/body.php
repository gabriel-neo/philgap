<section class="body">
	<section class="form">
		<h1>Atender Necessidade</h1>
		<h3>Submeter oferta para :</h3>
		<div class="txtalignleft">
			<form action="./findgap.php" class="seleciona_produtos" method="post">
				<legend>Use os campos abaixo para filtrar</legend>
				<table>
					<tr>
						<td>
							<label for="categoria">Categoria</label>
							<select name="categoria" id="categoria" style="width:100px;">
								<option selected name="todos" value="0" >Todas</option>
								<option id="produtos" name="produtos" value="1" >Produtos</option>
								<option id="servicos" name="servicos" value="2" >Serviços</option>
							</select>
						</td>
						<td>
							<label for="uf">Estado</label>
							<select name="uf" id="uf" style="width:80px;">
								<option value="all">Todos</option>
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
						</td>
						<td>
							<label for="status">Status</label>
							<select name="status" id="status" style="width:150px;">
								<option value="all">Todos</option>
								<option value="0">Aberto</option>
								<option value="1">Em andamento</option>
							</select>
						</td>
						<td>
							<label for="urgencia">Urgência</label>
							<select name="urgencia" id="urgencia" style="width:140px;">
								<option value="all">Todas</option>
								<option value="0">Muito urgente</option>
								<option value="1">Urgente</option>
								<option value="2">Pouco urgente</option>
								<option value="3">Não urgente</option>
								<option value="9">Não definida</option>
							</select>
						</td>
						<td>
							<label for="filtro">Filtrar necessidades</label>
							<input type="text" id="filtro" name="filtro" style="width:230px;" maxlength="20" placeholder="Ex : Celular, Bombeiro, Notebook..."/>
						</td>
						<td>
							<input type="submit" id="filtrar" name="filtrar" value="Find Gap" style="margin-top:17px;" />
						</td>
					</tr>
				</table>
			</form>
			<?php
				include "./classes/FindGap.php";
				
				$_SESSION['findgap'] = new FindGap();
				
				if (!isset($_POST['categoria'])){
					$lastprod = $_SESSION['findgap']->showgapprod();
					$lastserv = $_SESSION['findgap']->showgapserv();
				}
				else if (isset($_POST['categoria']) && $_POST['categoria']==0){
					$lastprod = $_SESSION['findgap']->filtraprod($_POST['uf'], $_POST['status'], $_POST['urgencia'], $_POST['filtro']);
					$lastserv = $_SESSION['findgap']->filtraserv($_POST['uf'], $_POST['status'], $_POST['urgencia'], $_POST['filtro']);
				}
				else if(isset($_POST['categoria']) && $_POST['categoria']==1){
					$lastprod = $_SESSION['findgap']->filtraprod($_POST['uf'], $_POST['status'], $_POST['urgencia'], $_POST['filtro']);
					$lastserv = null;
				}
				else if(isset($_POST['categoria']) && $_POST['categoria']==2){
					$lastserv = $_SESSION['findgap']->filtraserv($_POST['uf'], $_POST['status'], $_POST['urgencia'], $_POST['filtro']);
					$lastprod = null;
				}
				
				unset($_SESSION['findgap']);
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
								echo ("<tr class='".$colorcolumns[0]."'");
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