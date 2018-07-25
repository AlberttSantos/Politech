<?php
include "../conexao.php"; 

$nome = $_GET['txtCargo'];
$cdCargo = $_GET['cdCargo']; // Recebendo o valor enviado pelo link
$desc = $_GET['txtCDesc'];

mysql_query("UPDATE cargo SET NMCARGO = '$nome', DESCRICAO = '$desc' WHERE CDCARGO = '$cdCargo'");

	//fechando a conexao com o banco
	mysql_close($conexao);
	
	// Após realizar a edicao é redirecionado pra própria página para forçar um refresh nela
	header ("location: http://localhost/Politech/Cargo/cadastroCargo.php");

?>