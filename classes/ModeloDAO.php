<?php
	class ModeloDAO{
		static $servidor = "localhost";
		static $login = "root";
		static $senha = "";
		static $banco = "bd_philgap";
		
		static $conexao = null;
		
		// Conecta com o servidor e seleciona o banco de dados
		public static function con(){
			self::$conexao = @mysqli_connect(self::$servidor, self::$login, self::$senha, self::$banco) or die("Erro ao conectar ao banco: ".mysqli_connect_error());
		}
		public static function query($sql){
			if (is_null(self::$conexao)){
				self::con();
			}
			// Executa o SQL e retorna o resultado.
			return @mysqli_query(self::$conexao, $sql);
		}
	}
?>