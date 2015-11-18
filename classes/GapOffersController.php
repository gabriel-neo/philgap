<?php
	require_once ("PhilGapController.php");
	require_once ("GapOffersDAO.php");
	
	class GapOffersController extends PhilGapController{
		
		public function GetProdOffers($idgap){
			return $offers = GapOffersDAO::getOfferProd($idgap);
		}
		public function GetServOffers($idgap){
			return $offers = GapOffersDAO::getOffersServ($idgap);
		}
	}
?>

