<?php
/*Esta página analisará os dados enviados através do formulário, 
caso estejam corretos cria a sessão, caso contrário redireciona 
novamente para a página de autenticação loginAdm.html*/


// as variáveis login e senha recebem os dados digitados na página anterior

$login = addslashes ($_POST["username"]);
$senha = addslashes ($_POST["password"]);

//acesso ao banco de dados
include "conexao.php";

$sql = "select * from usuario where NMUSUARIO = '".$login."' and SENHA = '".sha1($senha)."'";

$resultado = mysql_query($sql);
//Caso consiga logar cria a sessão
if (mysql_num_rows ($resultado) > 0) {
    
	while($linha = mysql_fetch_array($resultado))
		{
	
	// session_start inicia a sessão
    session_start();
     
    $_SESSION['login'] = $login;
    $_SESSION['senha'] = $senha;
	$_SESSION['nivel'] = $linha[3];
	
	//Redireciona para a Confirmação de Login
    header('location:Home/cp.php');
		}
}
else 
{
 //Destrói
    session_destroy();
 
    //Limpa
    unset ($_SESSION['login']);
    unset ($_SESSION['senha']);
	unset ($_SESSION['nivel']);
 
    //Redireciona para a página de erro
	header ("Location:loginErro.php");
}
mysql_close($conexao);
?>

