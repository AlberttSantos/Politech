<?php

//Inclui o arquivo que faz a conexao com o MySQL
include("../conexao.php");

// armazena as informacoes digitada pelo usuario em variaveis

  
	//$curso = $_POST["txtCurso"];
	//$cdMembro = $_POST["Membro"];
	
	$cursos = isset($_POST["curso"]) ? implode (",", $_POST["curso"]) : "";
	$membros =isset($_POST["membro"]) ? implode (",", $_POST["membro"]) : "";
	
	/*for ($i=0;$i<count($cursos);$i++)
	{
     //$cursos[$i];
	 $query2 = "(UPDATE projeto SET AREAPROJ = '".$cursos[$i]."')";
	 $inserir = mysql_query($query2);
	}

	for ($i=0;$i<count($membros);$i++)
	{
     $membros[$i];
	}*/
	
	
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
	
	
// Query que insere os dados obtidos no formulário
	$query = "INSERT INTO projeto (NMPROJETO, DTENTRADA, DTINICIOPLAN, DTINICIOREAL, DTFINAL, PRECOR, PRECOD, CDFUNCGERENTE, CDPROFESSOR, AREAPROJ, CDFUNCPARTICIPANTE, CDFUNCRESPONSAVEL, CDFUNCCOMERCIAL, ATRASO, ATRASOSIM, TIPOCLIENTEPROJ, CDCLIENTEPROJ, DTASSINATURA, NUMVISITASTEC, CONTRAPROPOSTA, OBSVISITAS, FORMAPAG, STATUSPROJ, CEP, LOGRADOURO, NUMERO, COMP, BAIRRO, CIDADE, ESTADO, STATUS, OBSERVACAO, DTFINALPLAN) VALUES ('".$nome."', '".$dtEntrada."', '".$dtInicio."', '".$dtReal."', '".$dtFinal."', '".$preco."',  '".$precoD."',  '".$cdGerente."',  '".$cdProfessor."', '".$cursos."', '".$membros."', '".$cdMembroR."', '".$cdGerenteC."', '".$atraso."', '".$atrasoS."', '".$tipoClienteProj."', '".$cdClienteProj."', '".$dtAssContrato."', '".$numVisitas."', '".$contraProposta."', '".$obsVisitas."', '".$formaPag."', '".$statusProj."', '".$CEP."', '".$rua."', '".$num."', '".$comp."', '".$bairro."', '".$cidade."', '".$estado."', '".$status."', '".$obs."', '".$dtPlan."')";
	 
//Quando cadastramos os usuários usamos SHA1(‘{senha}’) isso significa que usaremos uma senha encriptada
// Executa a query
    $inserir = mysql_query($query);

/*
//Recupera o ID da query anterior
	$IdProj = mysql_insert_id();	
	
	//Query insere dados dos cursos/professor
		foreach($_POST['curso'] as $curso)
	{
		if($curso == 'Arquitetura e Urbanismo'){
			$NomeCurso = 'Arquitetura e Urbanismo';
		}
		else if($curso == 'Engenharia Ambiental e Sanitária'){
			$NomeCurso = 'Engenharia Ambiental e Sanitária';
		}
		else if($curso == 'Engenharia Civil'){
			$NomeCurso = 'Engenharia Civil';
		}
		else if($curso == 'Engenharia Elétrica'){
			$NomeCurso = 'Engenharia Elétrica';
		}
		else if($curso == 'Engenharia Mecânica'){
			$NomeCurso = 'Engenharia Mecânica';
		}
		else if($curso == 'Engenharia Metalúrgica'){
			$NomeCurso = 'Engenharia Metalúrgica';
		}
		else if($curso == 'Engenharia de Produção'){
			$NomeCurso = 'Engenharia de Produção';
		}
		else if($curso == 'Engenharia Química'){
			$NomeCurso = 'Engenharia Química';
		}
		else if($curso == 'Sistemas de Informação'){
			$NomeCurso = 'Sistemas de Informação';
		}
		else{
			$NomeCurso = 'Tecnologia de Soldagem';
		}		
		
		$query = "INSERT INTO projetocurso (CDPROJETO,NMCURSO) VALUES ('".$IdProj."','".$NomeCurso."')";
		$inserir = mysql_query($query);
	}
*/

//fecha a conexao com o banco apos executar os comandos
mysql_close($conexao);

// Após realizar o cadastro é redirecionado pra própria página para forçar um refresh nela
	header ("location: http://localhost/Politech/Projetos/listarProj.php");

?>