<?php
class ConexaoBD{
	public static function con(){
		//conexão local (gb home)
		return mysqli_connect("localhost","root","","bd_philgap");
		
		//conexão bd hostinger
		//return = mysqli_connect("mysql.hostinger.com.br","u438581021_cuser","bd@user1234","u438581021_bdpg");
	}
}
?>
