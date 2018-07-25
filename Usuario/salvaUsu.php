<?php
	include "../conexao.php"; // incluindo o arquivo que faz a conexao com o banco
	
		$nome = $_POST["txtEmail"];
		$senha = $_POST["txtSenha"];
		$nivel = $_POST["txtNivelAcesso"];
		$status = 'A';
	
// Query que insere os dados obtidos no formulário
 $query = "INSERT INTO usuario (NMUSUARIO, SENHA, NIVEL, STATUS) VALUES ('".$nome."', '".SHA1($senha)."', '".$nivel."', '".$status."')";
//executando a query
 $inserir = mysql_query($query);

	//fechando a conexao com o banco
	mysql_close($conexao);
	
	// Após realizar o cadastro é redirecionado pra própria página para forçar um refresh nela
	header ("location: http://localhost/Politech/Usuario/ativarAcesso.php");
	
?>