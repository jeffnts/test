<?php
	$dbHost = 'Localhost';
	$dbUsername = 'root';
	$dbPassowrd = '';
	$dbName = 'test';

	$conexao = new mysqli($dbHost, $dbUsername, $dbPassowrd, $dbName);

	$criaTabelaUsuario = "CREATE TABLE IF NOT EXISTS usuarios (
		id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
		nome varchar(100) NOT NULL,
		email varchar(100) NOT NULL,
		senha varchar(100) NOT NULL
	)
	ENGINE=InnoDB
	DEFAULT CHARSET=latin1
	COLLATE=latin1_swedish_ci;";

	if($conexao->connect_error){
		echo "Ocorreu um erro com a conexão com o banco de dados.";
	}else{   
		mysqli_query($conexao, $criaTabelaUsuario);
	}
?>