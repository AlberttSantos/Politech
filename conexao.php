<?php
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
//conexao com o servidor
$conexao = mysql_connect("localhost", "root", "");

// Caso a conexao seja reprovada, exibe na tela uma mensagem de erro
if (!$conexao) die ("<h1>Falha na coneco com o Banco de Dados!</h1>");

// Caso a conexao seja aprovada, entao conecta o Banco de Dados.	
$db = mysql_select_db("bdpolitech");

// Para retornar valores do banco de dados com a acentuação e pontuação corretamente sem carecteres especiais no lugar
	mysql_query("SET NAMES utf8");
	mysql_query("SET CHARACTER_SET utf8");

?>