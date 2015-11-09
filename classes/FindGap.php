<?php
	require_once "ConexaoBD.php";
	class FindGap extends ConexaoBD{
		
		public function showgapprod(){
			$con = ConexaoBD::con();
			
			$sql = "select tbgp.id, tbgp.uf, tbgp.status, tbgp.urgencia, tbgp.produto as 'gap', tbgp.especificacao as 'desc', tbic.nome from tb_gap_produto tbgp inner join tb_info_usuarios tbic on tbgp.id_user = tbic.id order by urgencia, status";
			
			return mysqli_query($con, $sql);
		}
		
		public function showgapserv(){
			$con = ConexaoBD::con();
			
			$sql = "select tbgs.id, tbgs.uf, tbgs.status, tbgs.urgencia, tbgs.especialidade as 'gap', tbgs.foco as 'desc', tbic.nome from tb_gap_servico tbgs inner join tb_info_usuarios tbic on tbgs.id_user = tbic.id order by urgencia, status";
			
			return mysqli_query($con, $sql);
		}
		
		public function filtraprod($uf, $status, $urgencia, $filtro){
			
			$con = ConexaoBD::con();
			
			$sql = "select tbgp.id, tbgp.uf, tbgp.status, tbgp.urgencia, tbgp.produto as 'gap', tbgp.especificacao as 'desc', tbic.nome from tb_gap_produto tbgp inner join tb_info_usuarios tbic on tbgp.id_user = tbic.id where 1=1";
			
			if ($uf != "all"){
				$sql .= " and uf = '".$uf."'";
			}
			if ($status != "all"){
				$sql .= " and status = '".$status."'";
			}
			if($urgencia != "all"){
				$sql .= " and urgencia = ".$urgencia;
			}
			if($filtro != ""){
				$sql .= " and (tbgp.produto like '%".$filtro."%' or tbgp.especificacao like '%".$filtro."%')";
			}
			$sql .= " order by urgencia, status limit 20";
			
			return mysqli_query($con, $sql);
		}
		
		public function filtraserv($uf, $status, $urgencia, $filtro){
			
			$con = ConexaoBD::con();
			
			$sql = "select tbgs.id, tbgs.uf, tbgs.status, tbgs.urgencia, tbgs.especialidade as 'gap', tbgs.foco as 'desc', tbic.nome from tb_gap_servico tbgs inner join tb_info_usuarios tbic on tbgs.id_user = tbic.id where 1=1";
			
			if ($uf != "all"){
				$sql .= " and uf = '".$uf."'";
			}
			if ($status != "all"){
				$sql .= " and status = '".$status."'";
			}
			if($urgencia != "all"){
				$sql .= " and urgencia = ".$urgencia;
			}
			if($filtro != ""){
				$sql .= " and (tbgs.especialidade like '%".$filtro."%' or tbgs.foco like '%".$filtro."%')";
			}
			$sql .= " order by urgencia, status limit 20";
			
			return mysqli_query($con, $sql);
		}
	}
?>