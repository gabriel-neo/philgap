<?php
	class PhilGapController{
		
		public function __construct(){

			// Verifica se tem uma ação
			if (isset($_REQUEST['acao'])){
				//Interpreta a ação - Chama o método correspondente
				$this->$_REQUEST['acao']();
			}
		}
	}
?>