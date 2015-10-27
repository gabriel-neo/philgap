<?php
	require_once "ConexaoBD.php";
	class PhilGap extends ConexaoBD{

		public static function gapprodid($id){
			$con = ConexaoBD::con();
			
			$sql = "select tbgp.status, tbgp.urgencia, tbic.nome, tbgp.produto as 'gap', tbgp.especificacao as 'espec', tbgp.marca, tbgp.cor, tbgp.precomedio, tbgp.cep, tbgp.logradouro, tbgp.numero, tbgp.complemento, tbgp.bairro, tbgp.cidade, tbgp.uf from tb_gap_produto tbgp inner join tb_info_usuarios tbic on tbgp.id_user = tbic.id where tbgp.id = ".$id."";

			return mysqli_query($con, $sql);
		}
		
		public static function gapservid($id){
			$con = ConexaoBD::con();
			
			$sql = "select tbgs.status, tbgs.urgencia, tbic.nome, tbgs.especialidade as 'gap', tbgs.foco, tbgs.descricao, tbgs.cep, tbgs.logradouro, tbgs.numero, tbgs.complemento, tbgs.bairro, tbgs.cidade, tbgs.uf from tb_gap_servico tbgs inner join tb_info_usuarios tbic on tbgs.id_user = tbic.id where tbgs.id = ".$id."";
			
			return mysqli_query($con, $sql);
		}
	}
?>