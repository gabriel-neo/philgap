<section class="body">
	<section class="form">
		<h1>Gap de Produto</h1>
		<div class="txtalignleft">
			<?php
				include "./classes/PhilGap.php";
				
				var_dump(mysqli_fetch_assoc(PhilGap::gapprodid($_GET['idgap'])));
			?>
		</div>
	</section>
</section>