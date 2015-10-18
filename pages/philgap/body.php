<section class="body">
	<section class="form">
		<h1>Atender Necessidade</h1>
		<h3>Submeter oferta para :</h3>
		<div class="txtalignleft">
			<form action="./philgap.php" class="seleciona_produtos" method="post">
				<legend> Use os campos abaixo para filtrar</legend>
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
								<option value="aberta">Aberto</option>
								<option value="emandamento">Em andamento</option>
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
							<input type="submit" id="filtrar" name="filtrar" value="Filtrar" style="margin-top:17px;" />
						</td>
					</tr>
				</table>
			</form>
			<?php
				include "./classes/PhilGap.php";
				
				$_SESSION['philgap'] = new PhilGap();
				
				$lastprod = $_SESSION['philgap']->last10regprod();
				$lastserv = $_SESSION['philgap']->last10regserv();
			?>
			<table class="table table-hover" style="width:600px;">
				<tr>
					<th>Categoria</th>
					<th>Estado</th>
					<th>Status</th>
					<th>Urgência</th>
					<th>Gap</th>
					<th>Descrição</th>
					<th>Cliente</th>
				</tr>
				<?php
				
					$urgencia = array(0=>"Muito Urgente",1=>"Urgente",2=>"Pouco Urgente", 3=>"Não Urgente",9=>"Não Definido");
					$status = array(0=>"Aberto", 1=>"Em Andamento");
					
					while($gapprod = mysqli_fetch_array($lastprod)){
						echo ("<tr>
									<td>Produto</td>
									<td>".strtoupper($gapprod['uf'])."</td>
									<td>".$status[$gapprod['status']]."</td>
									<td>".$urgencia[$gapprod['urgencia']]."</td>
									<td>".$gapprod['gap']."</td>
									<td>".$gapprod['desc']."</td>
									<td>".$gapprod['nome']."</td>
							   </tr>");
					}
					while($gapserv = mysqli_fetch_array($lastserv)){
						echo ("<tr>
									<td>Serviço</td>
									<td>".strtoupper($gapserv['uf'])."</td>
									<td>".$status[$gapserv['status']]."</td>
									<td>".$urgencia[$gapserv['urgencia']]."</td>
									<td>".$gapserv['gap']."</td>
									<td>".$gapserv['desc']."</td>
									<td>".$gapserv['nome']."</td>
							   </tr>");
					}
				?>
			</table>
		</div>
	</section>
</section>