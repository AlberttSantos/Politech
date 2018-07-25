<?php

//Inclui o arquivo que faz a conexao com o MySQL
include("../conexao.php");

// armazena as informacoes digitada pelo usuario em variaveis
	$nome = $_POST["txtNome"];
	$CPF = $_POST["txtCPF"];
	$profissao = $_POST["txtProfissao"];
	$sexo = $_POST["cbSexo"];
	$comoconheceu = $_POST["txtCDesc"];
	$obs = $_POST["txtObs"];
	$telefone = $_POST["txtTelefone"];
	$celular = $_POST["txtCelular"];
	$CEP = $_POST["txtCep"];
	$rua = $_POST["txtRua"];
	$num = $_POST["txtNumero"];
	$comp = $_POST["txtComplemento"];
	$bairro = $_POST["txtBairro"];
	$cidade = $_POST["txtCidade"];
	$estado = $_POST["txtEstado"];
	$email = $_POST["txtEmail"];
	$senha = $_POST["txtSenha"];
	$status = 'A';
	
// Manipulamos as variáveis para evitar problemas com aspas e outros caracteres protegidos do MySQL
//	$titulo = mysql_escape_string($nome);
	
// CONEXAO COM A TABELA DE CLIENTES 
// Query que insere os dados obtidos no formulário
	$query = "INSERT INTO cliente (NMCLIENTE, CPF, NMPROFISSAO, DESCRICAO, OBSERVACAO, SEXO, TELEFONE, CELULAR, CEP, LOGRADOURO, NUMERO, COMP, BAIRRO, CIDADE, ESTADO, STATUS, EMAIL) VALUES ('".$nome."', '".$CPF."', '".$profissao."', '".$comoconheceu."', '".$obs."', '".$sexo."', '".$telefone."', '".$celular."', '".$CEP."', '".$rua."', '".$num."', '".$comp."', '".$bairro."', '".$cidade."', '".$estado."', '".$status."', '".$email."')";
	
//Quando cadastramos os usuários usamos SHA1(‘{senha}’) isso significa que usaremos uma senha encriptada
// Executa a query
$inserir = mysql_query($query);

//colocar condição caso não der certo

//fecha a conexao com o banco apos executar os comandos
mysql_close($conexao);

// Após realizar o cadastro é redirecionado pra página principal
	header ("location: http://localhost/Politech/PessoaF/listaCliente.php");

?>