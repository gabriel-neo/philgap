<?php
	require_once ("../classes/GapOffersDAO.php");
	if (isset($_POST['idoffer']) && $_POST['gap'] == 1){
		GapOffersDAO::closeGapProd($_POST['idgap']);
	}
	else if (isset($_POST['idoffer']) && $_POST['gap'] == 2){
		GapOffersDAO::closeGapServ($_POST['idgap']);
	}
	
	session_start();
	$_SESSION['erro'] = "Gap fechado e finalizado com sucesso!";
	header("location:../chooseoffer.php");
?>