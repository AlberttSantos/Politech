<?php

//Inclui o arquivo que faz a conexao com o MySQL
include("../conexao.php");

// armazena as informacoes digitada pelo usuario em variaveis

  
	//$curso = $_POST["txtCurso"];
	//$cdMembro = $_POST["Membro"];
	$cursos = isset($_POST["curso"]) ? implode (",", $_POST["curso"]) : "";
	$membros =isset($_POST["membro"]) ? implode (",", $_POST["membro"]) : "";
	
	$nome = addslashes($_POST["txtNome"]);
	$dtEntrada = $_POST["txtDtEntrada"];
	$dtInicio = $_POST["txtDtInicio"];
	$dtReal = $_POST["txtDtReal"];
	$dtFinal = $_POST["txtDtFinal"];
	$preco = $_POST["txtPreco"];
	$precoD = $_POST["txtPrecoD"];
	$cdGerente = $_POST["Gerente"]; 
	$cdProfessor = $_POST["Professor"];
	$cdMembroR = $_POST["MembroR"];
	$cdGerenteC = $_POST["GerenteC"];
	$atraso = $_POST["Atraso"];
	$atrasoS = $_POST["txtQTDdias"];
	
	$tipoClienteProj = $_POST["TipoPessoa"];
	
	if ($tipoClienteProj == "pessoaJuridica")
	{
	$cdClienteProj = $_POST["clienteJ"];
	}
	else{
		$cdClienteProj = $_POST["clienteF"];
	}
	
	$dtAssContrato = $_POST["txtDtAssContrato"];
	$numVisitas = $_POST["NumVisitas"];
	$obsVisitas = $_POST["txtVisitas"];
	$contraProposta = $_POST["ContraProposta"];
	$formaPag = $_POST["txtFormaPag"];
	$statusProj = $_POST["txtStatusProj"];
	$CEP = $_POST["txtCep"];
	$rua = $_POST["txtRua"];
	$num = $_POST["txtNumero"];
	$comp = $_POST["txtComplemento"];
	$bairro = $_POST["txtBairro"];
	$cidade = $_POST["txtCidade"];
	$estado = $_POST["txtEstado"];
	$status = 'A';
	$dtPlan = $_POST["txtDtFinalPlan"];
	$obs = $_POST["txtObs"];
	$cdProj = $_POST["cdProj"];
	
// Query que insere os dados obtidos no formulário
	mysql_query("UPDATE projeto SET NMPROJETO = '".$nome."', DTENTRADA = '".$dtEntrada."', DTINICIOPLAN = '".$dtInicio."', DTINICIOREAL = '".$dtReal."', DTFINAL = '".$dtFinal."', PRECOR = '".$preco."', PRECOD = '".$precoD."', CDFUNCGERENTE = '".$cdGerente."', CDPROFESSOR = '".$cdProfessor."', AREAPROJ = '".$cursos."', CDFUNCPARTICIPANTE = '".$membros."', CDFUNCRESPONSAVEL = '".$cdMembroR."', CDFUNCCOMERCIAL = '".$cdGerenteC."', ATRASO = '".$atraso."', ATRASOSIM = '".$atrasoS."', TIPOCLIENTEPROJ = '".$tipoClienteProj."', CDCLIENTEPROJ = '".$cdClienteProj."', DTASSINATURA = '".$dtAssContrato."', NUMVISITASTEC = '".$numVisitas."', CONTRAPROPOSTA = '".$contraProposta."', OBSVISITAS = '".$obsVisitas."', FORMAPAG = '".$formaPag."', STATUSPROJ = '".$statusProj."', CEP = '".$CEP."', LOGRADOURO = '".$rua."', NUMERO = '".$num."', COMP = '".$comp."', BAIRRO = '".$bairro."', CIDADE = '".$cidade."', ESTADO = '".$estado."', STATUS = '".$status."', OBSERVACAO = '".$obs."', DTFINALPLAN = '".$dtPlan."' WHERE CDPROJETO = '".$cdProj."'");
	//mysql_query("UPDATE cliente SET NMCLIENTE = '".$nome."', CPF = '".$CPF."', NMPROFISSAO = '".$profissao."',  DESCRICAO = '".$comoconheceu."', OBSERVACAO = '".$obs."', SEXO = '".$sexo."', TELEFONE = '".$telefone."', CELULAR  = '".$celular."', CEP  = '".$CEP."', LOGRADOURO = '".$rua."', NUMERO = '".$num."', COMP = '".$comp."', BAIRRO = '".$bairro."', CIDADE  = '".$cidade."', ESTADO  = '".$estado."', STATUS = '".$status."', EMAIL = '".$email."'  WHERE CDCLIENTE='".$cdCli."'");

	//fecha a conexao com o banco apos executar os comandos
   mysql_close($conexao);

    // Após realizar o cadastro é redirecionado pra própria página para forçar um refresh nela
	header ("location: http://localhost/Politech/Projetos/listarProj.php");

?>