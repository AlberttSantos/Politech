<?php

/*Esta página analisará os dados enviados através do formulário, 
caso estejam corretos cria a sessão, caso contrário redireciona 
novamente para a página de autenticação loginAdm.html*/


// as variáveis login e senha recebem os dados digitados na página anterior
$login = $_POST["username"];
$senha = $_POST["password"];
 
//acesso ao banco de dados
include "conexao.php";
 
//Comando SQL de verificação de autenticação
$sql = "SELECT * FROM usuario WHERE NMUSUARIO = '".$login."' AND SENHA = '".sha1($senha)."'";
 
$resultado = mysql_query($sql);
 
//Caso consiga logar cria a sessão
if (mysql_num_rows ($resultado) > 0) {
    // session_start inicia a sessão
    session_start();
     
    $_SESSION['login'] = $login;
    $_SESSION['senha'] = $senha;
	
	//Redireciona para a painel de controle
    header('location:cp.php');
}
 
//Caso contrário redireciona para a página de autenticação
else {
    //Destrói
    session_destroy();
 
    //Limpa
    unset ($_SESSION['login']);
    unset ($_SESSION['senha']);
 
    //Redireciona para a página de autenticação
	header('location:loginAdm.html');
}

?>