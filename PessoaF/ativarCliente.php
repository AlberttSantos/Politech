<?php
	include "../conexao.php"; // incluindo o arquivo que faz a conexao com o banco
	
	$cdCliente = $_GET['cdCliente']; // Recebendo o valor enviado pelo link
	$status = 'A'; //define o status para desativado
	
    mysql_query("UPDATE cliente SET STATUS = '".$status."' WHERE CDCLIENTE='".$cdCliente."'");

		
	//fechando a conexao com o banco
	mysql_close($conexao);
	
	// Após realizar o cadastro é redirecionado pra própria página para forçar um refresh nela
	header ("location: http://localhost/Politech/PessoaF/listaClienteD.php");
?>