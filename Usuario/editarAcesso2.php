<?php
include "../conexao.php"; 

$cdUsuario = $_POST['cdUsu'];
$nivel = $_POST['txtNivelAcesso'];

mysql_query("UPDATE usuario SET NIVEL = '$nivel' WHERE usuario.CDUSUARIO = '$cdUsuario'");

	//fechando a conexao com o banco
	mysql_close($conexao);
	
	// Após realizar a edicao é redirecionado pra própria página para forçar um refresh nela
	header ("location: http://localhost/Politech/Usuario/ativarAcesso.php");

?>