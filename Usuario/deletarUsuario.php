<?php
	include "../conexao.php"; // incluindo o arquivo que faz a conexao com o banco
	
	$cdUsu = $_GET['cdUsu']; // Recebendo o valor enviado pelo link
    
	mysql_query("DELETE FROM usuario WHERE CDUSUARIO='".$cdUsu."'");
	
	//fechando a conexao com o banco
	mysql_close($conexao);
	
	// Após realizar a exclusão é redirecionado pra página de cadastro de cargo
	header ("location: http://localhost/Politech/Usuario/ativarAcesso.php");
?>