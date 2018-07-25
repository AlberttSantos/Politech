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
	$status = 'A';
	$face = $_POST["txtFace"];
	$lattes = $_POST["txtLattes"];
	$linkedin = $_POST["txtLink"];
	$obs = $_POST["txtObs"];
	$comoc = $_POST["txtCDesc"];
	
// Query que insere os dados obtidos no formulário
	$query = "INSERT INTO funcionario (NMFUNCIONARIO, EMAIL, CPF, DTNASC, SEXO, DTADM, DTDESLIGAMENTO, PERIODO, CURSO, CDCARGO, TELEFONE, CELULAR, CEP, LOGRADOURO, NUMERO, COMP, BAIRRO, CIDADE, ESTADO, STATUS, FACEBOOK, LATTES, LINKEDIN, OBSERVACAO, DESCRICAO) VALUES ('".$nome."', '".$email."', '".$CPF."', '".$dtNasc."', '".$sexo."', '".$dtAdm."',  '".$dtDesligamento."',  '".$periodo."',  '".$curso."', '".$cdcargo."', '".$telefone."', '".$celular."', '".$CEP."', '".$rua."', '".$num."', '".$comp."', '".$bairro."', '".$cidade."', '".$estado."', '".$status."', '".$face."', '".$lattes."', '".$linkedin."', '".$obs."', '".$comoc."')";
	
//Quando cadastramos os usuários usamos SHA1(‘{senha}’) isso significa que usaremos uma senha encriptada
// Executa a query
$inserir = mysql_query($query);

//fecha a conexao com o banco apos executar os comandos
mysql_close($conexao);

// Após realizar o cadastro é redirecionado pra própria página para forçar um refresh nela
	header ("location: http://localhost/Politech/Membros/listarFunc.php");

?>