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
	$CEP = $_POST["txtCep"];
	$rua = $_POST["txtRua"];
	$num = $_POST["txtNumero"];
	$comp = $_POST["txtComplemento"];
	$bairro = $_POST["txtBairro"];
	$cidade = $_POST["txtCidade"];
	$estado = $_POST["txtEstado"];
	$telefone = $_POST["txtTelefone"];
	$celular = $_POST["txtCelular"];
	$email = $_POST["txtEmail"];
	
	$cdCli = $_POST["cdCliente"];
	$status = 'A';
	
	//echo " $nome]$CPF]$profissao]$sexo]$sal]$dtAdm]$cdcargo]$CEP]$rua]$num]$comp]$bairro]$cidade]$estado]$telefone]$celular]";
                // UPDATE cliente SET NMCLIENTE = 'teste', CPF = '11827490624', NMPROFISSAO = 'nada', SEXO = 'M', TELEFONE = '3173058453', CELULAR  = '3155849691', CEP  = '35170370', LOGRADOURO = 'rua', NUMERO = '211', COMP = 'teste', BAIRRO = 'teste', CIDADE  = 'nada', ESTADO  = 'mg' WHERE CDCLIENTE = 6
	mysql_query("UPDATE cliente SET NMCLIENTE = '".$nome."', CPF = '".$CPF."', NMPROFISSAO = '".$profissao."',  DESCRICAO = '".$comoconheceu."', OBSERVACAO = '".$obs."', SEXO = '".$sexo."', TELEFONE = '".$telefone."', CELULAR  = '".$celular."', CEP  = '".$CEP."', LOGRADOURO = '".$rua."', NUMERO = '".$num."', COMP = '".$comp."', BAIRRO = '".$bairro."', CIDADE  = '".$cidade."', ESTADO  = '".$estado."', STATUS = '".$status."', EMAIL = '".$email."'  WHERE CDCLIENTE='".$cdCli."'");

	//fecha a conexao com o banco apos executar os comandos
	mysql_close($conexao);

	// Após realizar a edicao é redirecionado pra página listar Funcionários
	header ("location: http://localhost/Politech/PessoaF/listaCliente.php");

?>