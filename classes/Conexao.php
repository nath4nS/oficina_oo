<?php

class Conexao
{
	private $host;
	private $user;
	private $password;
	private $conn;

	public function __construct() {
		$this->host = 'mysql:host=localhost;dbname=oficina';
		$this->user = 'root';
		$this->password = 'root';
	}

	public function conectar() {
		try {
			$conn = new PDO(
							$this->host,
							$this->user,
							$this->password
						);

			return $conn;
		
		} catch (PDOExpeption $e) {
			echo 'Erro na conexão. Erro reportado: ' . $e->getMessage();
				exit;
		}
	}
}