<?php

//Inclui o arquivo que faz a conexao com o MySQL
include("../conexao.php");

// armazena as informacoes digitada pelo usuario em variaveis
	$nome = $_POST["txtNome"];
	$nomeR = $_POST["txtNomeR"];
	$CNPJ = $_POST["txtCNPJ"];
	$segmento = $_POST["txtSegmento"];
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
	$emailR = $_POST["txtEmailR"];
	$emailE = $_POST["txtEmailE"];
	$cpf = $_POST["txtCPF"];
	$status = 'A';
	
	$cdPes = $_POST["cdPessoaJ"];
	
	//echo " $nome]$CPF]$profissao]$sexo]$sal]$dtAdm]$cdcargo]$CEP]$rua]$num]$comp]$bairro]$cidade]$estado]$telefone]$celular]";
                // UPDATE cliente SET NMCLIENTE = 'teste', CPF = '11827490624', NMPROFISSAO = 'nada', SEXO = 'M', TELEFONE = '3173058453', CELULAR  = '3155849691', CEP  = '35170370', LOGRADOURO = 'rua', NUMERO = '211', COMP = 'teste', BAIRRO = 'teste', CIDADE  = 'nada', ESTADO  = 'mg' WHERE CDCLIENTE = 6
	mysql_query("UPDATE pessoaj SET NMEMPRESA = '".$nome."', CNPJ = '".$CNPJ."',  NMREPRESENTANTE = '".$nomeR."', SEGMENTO = '".$segmento."', DESCRICAO = '".$comoconheceu."', OBSERVACAO = '".$obs."', TELEFONE = '".$telefone."', CELULAR  = '".$celular."', CEP  = '".$CEP."', LOGRADOURO = '".$rua."', NUMERO = '".$num."', COMP = '".$comp."', BAIRRO = '".$bairro."', CIDADE  = '".$cidade."', ESTADO  = '".$estado."', STATUS = '".$status."', EMAILE = '".$emailE."', EMAILR = '".$emailR."', CPF = '".$cpf."' WHERE CDPESSOAJ ='".$cdPes."'");

	//fecha a conexao com o banco apos executar os comandos
	mysql_close($conexao);

	// Após realizar a edicao é redirecionado pra página listar Funcionários
	header ("location: http://localhost/Politech/PessoaJ/listaPJ.php");

?>