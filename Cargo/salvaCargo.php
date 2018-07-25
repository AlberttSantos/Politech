<?php
	include "../conexao.php"; // incluindo o arquivo que faz a conexao com o banco
	
		$nomeCargo = $_GET["txtCargo"];
		$desc = $_GET["txtCDesc"];
	
// Query que insere os dados obtidos no formulário
 $query = "INSERT INTO cargo (NMCARGO, DESCRICAO) VALUES ('".$nomeCargo."', '".$desc."')";
//executando a query
 $inserir = mysql_query($query);
 
	header('location: http://localhost/Politech/Cargo/cadastroCargo.php');

	//fechando a conexao com o banco
	mysql_close($conexao);
?>