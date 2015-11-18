<?php
	require_once ("GapProdOffers.php");
	require_once ("GapServOffers.php");
	require_once ("ModeloDAO.php");
	
	class GapOffersDAO extends ModeloDAO{
		
		public static function getOfferProd($idgap){
			// cria o sql
			$sql = "select tbop.id, tbop.id_gapprod, tbop.nome, tbop.produto, tbop.especificacao, tbop.marca, tbop.cor, tbop.valor, tbop.formaenvio, tbop.custoenvio, tbop.link, tbgp.precomedio from tb_offer_produto tbop inner join tb_gap_produto tbgp on tbop.id_gapprod = tbgp.id where tbop.id_gapprod = ".$idgap."";
			// Executa o SQL na classe PAI (ModeloDAO)
			$rs = parent::query($sql);
			
			$i = 0;
			$gapprod = null;
			while($gap = mysqli_fetch_object($rs, 'GapProdOffers')){
				$gapprod[$i] = $gap;
				$i++;
			}
			return $gapprod;
		}
		
		public static function getOffersServ($idgap){
			// cria o sql
			$sql = "select tbos.id, tbos.id_gapserv, tbos.nome, tbos.especialidade, tbos.especializado, tbos.prazoinicio, tbos.duracao, tbos.domicilio, tbos.valor, tbgs.urgencia from tb_offer_servico tbos inner join tb_gap_servico tbgs on tbos.id_gapserv = tbgs.id where tbos.id_gapserv = ".$idgap."";
			// Executa o SQL na classe PAI (ModeloDAO)
			$rs = parent::query($sql);
			
			$i = 0;
			$gapserv = null;
			while($gap = mysqli_fetch_object($rs, 'GapServOffers')){
				$gapserv[$i] = $gap;
				$i++;
			}
			return $gapserv;
		}
		
		public static function closeGapProd($idgap){
			$sql = "update tb_gap_produto set status = 2 where id = ".$idgap;
			
			$rs = parent::query($sql);
		}
		
		public static function closeGapServ($idgap){
			$sql = "update tb_gap_servico set status = 2 where id = ".$idgap;
			
			$rs = parent::query($sql);
		}
	}
?>