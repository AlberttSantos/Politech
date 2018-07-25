<?php
	include "../conexao.php"; // incluindo o arquivo que faz a conexao com o banco
	
	$cdProj = $_GET['cdProj']; // Recebendo o valor enviado pelo link
	$status = 'D'; //define o status para desativado
	
    mysql_query("UPDATE projeto SET STATUS = '".$status."' WHERE CDPROJETO ='".$cdProj."'");
	
	//fechando a conexao com o banco
	mysql_close($conexao);
	
	// Após realizar a exclusão é redirecionado pra página que lista os Funcionários
	header ("location: http://localhost/Politech/Projetos/listarProj.php");
?>