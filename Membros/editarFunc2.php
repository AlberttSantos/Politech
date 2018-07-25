<?php

//Inclui o arquivo que faz a conexao com o MySQL
include("../conexao.php");

// armazena as informacoes digitada pelo usuario em variaveis
    $nome = addslashes($_POST["txtNome"]);
	$email = $_POST["txtEmail"];
	$CPF = $_POST["txtCPF"];
	$dtNasc = $_POST["txtDtNasc"];
	$sexo = $_POST["cbSexo"];
	$dtAdm = $_POST["txtAdm"];
	$dtDesligamento = $_POST["txtDesligamento"];
	$periodo = $_POST["txtPeriodo"];
	$curso = $_POST["txtCurso"];
	$cdcargo = $_POST["cb"];
	$CEP = $_POST["txtCep"];
	$rua = $_POST["txtRua"];
	$num = $_POST["txtNumero"];
	$comp = $_POST["txtComplemento"];
	$bairro = $_POST["txtBairro"];
	$cidade = $_POST["txtCidade"];
	$estado = $_POST["txtEstado"];
	$telefone = $_POST["txtTelefone"];
	$celular = $_POST["txtCelular"];
	$face = $_POST["txtFace"];
	$lattes = $_POST["txtLattes"];
	$link = $_POST["txtLink"];
	$obs = $_POST["txtObs"];
	$comoc = $_POST["txtCDesc"];
	
	$status = 'A';
	$cdFunc = $_POST['cdFunc'];
	
	//echo " $nome]$CPF]$dtNasc]$sexo]$sal]$dtAdm]$cdcargo]$CEP]$rua]$num]$comp]$bairro]$cidade]$estado]$telefone]$celular]";

	mysql_query("UPDATE funcionario SET NMFUNCIONARIO = '$nome', EMAIL = '$email', CPF = '$CPF', DTNASC = '$dtNasc', SEXO = '$sexo', DTADM = '$dtAdm', DTDESLIGAMENTO = '$dtDesligamento', PERIODO = '$periodo', CURSO = '$curso', CDCARGO = '$cdcargo', TELEFONE = '$telefone', CELULAR  = '$celular', CEP  = '$CEP', LOGRADOURO = '$rua', NUMERO = '$num', COMP = '$comp', BAIRRO = '$bairro', CIDADE  = '$cidade', ESTADO  = '$estado', STATUS = '$status', FACEBOOK = '$face', LATTES = '$lattes', LINKEDIN = '$link', OBSERVACAO = '$obs', DESCRICAO = '$comoc' WHERE CDFUNCIONARIO = '$cdFunc'");

	//fecha a conexao com o banco apos executar os comandos
	mysql_close($conexao);

	// Após realizar a edicao é redirecionado pra página listar Funcionários
	header ("location: http://localhost/Politech/Membros/listarFunc.php");

?>