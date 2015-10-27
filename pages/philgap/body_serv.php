<section class="body">
	<section class="form">
		<h1>Gap de Serviço</h1>
		<div class="txtalignleft">
			<?php
				include "./classes/PhilGap.php";
				
				var_dump(mysqli_fetch_assoc(PhilGap::gapservid($_GET['idgap'])));
			?>
		</div>
	</section>
</section>