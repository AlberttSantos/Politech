<?php

//Inclui o arquivo que faz a conexao com o MySQL
include("../conexao.php");

// armazena as informacoes digitada pelo usuario em variaveis
	$nome = $_POST["txtNome"];
	$email = $_POST["txtEmail"]; 
	$dtNasc= $_POST["txtDtNasc"];
	$sexo = $_POST["cbSexo"];
	$formAcad = $_POST["txtAcad"];
	$disciplinas = $_POST["txtDisc"];
	$orienta = $_POST["txtOrient"];
	$comoconheceu = $_POST["txtCDesc"];
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
	$linkedin = $_POST["txtLink"];
	$obs = $_POST["txtObs"];
	$status = 'A';
	
// Manipulamos as variáveis para evitar problemas com aspas e outros caracteres protegidos do MySQL
//	$titulo = mysql_escape_string($nome);
	
// CONEXAO COM A TABELA DE PROFESSORES 
// Query que insere os dados obtidos no formulário
	$query = "INSERT INTO professor (NMPROF, EMAIL, DTNASC, SEXO, FORMACAD, DISCIPLINAS, FORMORIENT, DESCRICAO, CEP, LOGRADOURO, NUMERO, COMP, BAIRRO, CIDADE, ESTADO, TELEFONE, CELULAR, FACEBOOK, LATTES, LINKEDIN, OBSERVACAO, STATUS) VALUES ('".$nome."', '".$email."', '".$dtNasc."', '".$sexo."', '".$formAcad."', '".$disciplinas."', '".$orienta."', '".$comoconheceu."', '".$CEP."', '".$rua."', '".$num."', '".$comp."', '".$bairro."', '".$cidade."', '".$estado."', '".$telefone."', '".$celular."', '".$face."', '".$lattes."', '".$linkedin."', '".$obs."', '".$status."')";
	
	//Quando cadastramos os usuários usamos SHA1(‘{senha}’) isso significa que usaremos uma senha encriptada
	// Executa a query
	$inserir = mysql_query($query);

	//colocar condição caso não der certo
	
	//Recupera o ID da query anterior
	$IdProf = mysql_insert_id();	
	
	//Query insere dados dos cursos/professor
		foreach($_POST['curso'] as $curso)
	{
		if($curso == 'Arquitetura'){
			$NomeCurso = 'Arquitetura e Urbanismo';
		}
		else if($curso == 'Ambiental'){
			$NomeCurso = 'Engenharia Ambiental e Sanitária';
		}
		else if($curso == 'Civil'){
			$NomeCurso = 'Engenharia Civil';
		}
		else if($curso == 'Elétrica'){
			$NomeCurso = 'Engenharia Elétrica';
		}
		else if($curso == 'Mecânica'){
			$NomeCurso = 'Engenharia Mecânica';
		}
		else if($curso == 'Metalúrgica'){
			$NomeCurso = 'Engenharia Metalúrgica';
		}
		else if($curso == 'Produção'){
			$NomeCurso = 'Engenharia de Produção';
		}
		else if($curso == 'Química'){
			$NomeCurso = 'Engenharia Química';
		}
		else if($curso == 'Sistemas'){
			$NomeCurso = 'Sistemas de Informação';
		}
		else{
			$NomeCurso = 'Tecnologia de Soldagem';
		}		
		
		$query = "INSERT INTO professor_curso (CDPROF,NMCURSO) VALUES ('".$IdProf."','".$NomeCurso."')";
		$inserir = mysql_query($query);
	}

	//fecha a conexao com o banco apos executar os comandos
	mysql_close($conexao);

// Após realizar o cadastro é redirecionado pra página principal
header ("location: http://localhost/Politech/Professor/listaProfessor.php");

?>