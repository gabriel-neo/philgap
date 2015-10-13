<section class="body">
		<section class="index">
			<div id="lefttop" class="left index">
				<h2>Sobre Philgap</h2>
				<br/>
				<p>Visando desenvolver um produto que contribua para o <br/>
				crescimento do seu poder aquisitivo, disponibilizamos o <br/>
				mais novo sistema para realização de transações no meio <br/>
				virtual.</p>
			</div>
			<div id="right" class="index">
				<img src="./img/layout/mini_index.png" width="350px"/>
			</div> 
			<div class="left">
				<p>Philgap surgiu da ideia de querer criar uma plataforma onde fosse possível atender <br/>
				às necessidades humanas de forma ágil, inovadora e realmente efetiva.<br/>
				Inicialmente atuando na área de produtos e serviços, nosso sitema dispõe de uma completa <br/>
				ferramenta para identificar problemas e propor soluções.<br/>
				Para testar, basta realizar seu cadastro e então escolher se deseja iniciar um processo de
				compra ou de venda.</p>
			</div>
			
			<div class="contato">
				<hr/>
				<br/>
				<br/>
				<div id="txtcontato" class="fontcontato index">
					<h2>Contato</h2>
					<br/>
					<p>Se você tiver alguma dúvida ou sugestão<br/>
					a respeito de nosso sitema, use este formulário<br/>
					à direita para nos encaminhar uma mensagem.<br/>
					</p>
				</div>
				<div id="form_contato" class="index">
					<form action="./pages/enviar_email.php" method="post">
						<table>
							<tr>
								<th>Nome</th>
								<td>
									<input class="form-field input-xlarge" type="text" id="nome" name="nome" required>
								</td>
							</tr>
							<tr>
								<th>Email</th>
								<td>
									<input class="form-field input-xlarge" type="text" id="email" name="email" required>
								</td>
							</tr>
							<tr class="area-row">
								<th width="100px">Mensagem</th>
								<td>
									<textarea class="form-field form-area-field input-xlarge" rows="3" cols="20" id="mensagem" name="mensagem" required></textarea>
								</td>
							</tr>
							<tr class="form-footer">
								<td colspan="2" align="right">
									<button type="reset" class="btn">Limpar Campos</button>
									<button type="submit" class="btn">Enviar</button>
								</td>
							</tr>
						</table>
					</form>
				</div>
			</div>
		</section>
</section>