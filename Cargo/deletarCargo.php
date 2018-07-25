<?php
	include "../conexao.php"; // incluindo o arquivo que faz a conexao com o banco
	
	$cdCargo = $_GET['cdCargo']; // Recebendo o valor enviado pelo link
    
	mysql_query("DELETE FROM cargo WHERE CDCARGO='".$cdCargo."'");
	
	//fechando a conexao com o banco
	mysql_close($conexao);
	
	// Após realizar a exclusão é redirecionado pra página de cadastro de cargo
	header ("location: http://localhost/Politech/Cargo/cadastroCargo.php");
?>