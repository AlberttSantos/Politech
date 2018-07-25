<?php
	include "../conexao.php"; // incluindo o arquivo que faz a conexao com o banco
	
	$cdPessoaJ = $_GET['cdPessoaJ']; // Recebendo o valor enviado pelo link
	$status = 'D'; //define o status para desativado
	
    mysql_query("UPDATE pessoaJ SET STATUS = '".$status."' WHERE CDPESSOAJ='".$cdPessoaJ."'");
		
	//fechando a conexao com o banco
	mysql_close($conexao);
	
	// Após realizar o cadastro é redirecionado pra própria página para forçar um refresh nela
	header ("location: http://localhost/Politech/PessoaJ/listaPJ.php");
?>