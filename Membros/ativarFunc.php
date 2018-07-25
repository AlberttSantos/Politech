<?php
	include "../conexao.php"; // incluindo o arquivo que faz a conexao com o banco
	
	$cdFunc = $_GET['cdFunc']; // Recebendo o valor enviado pelo link
	$status = 'A'; //define o status para desativado
	
    mysql_query("UPDATE funcionario SET STATUS = '".$status."' WHERE CDFUNCIONARIO='".$cdFunc."'");
	
	//fechando a conexao com o banco
	mysql_close($conexao);
	
	// Após realizar a exclusão é redirecionado pra página que lista os Funcionários
	header ("location: http://localhost/Politech/Membros/listaFuncD.php");
?>