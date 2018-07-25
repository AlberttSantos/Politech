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
	$IdProf = $_POST["cdProfessor"];
	$status = 'A';
	
// Manipulamos as variáveis para evitar problemas com aspas e outros caracteres protegidos do MySQL
//	$titulo = mysql_escape_string($nome);
	
// CONEXAO COM A TABELA DE PROFESSORES 
// Query que insere os dados obtidos no formulário
	$query = ("UPDATE professor SET NMPROF='".$nome."', EMAIL='".$email."', DTNASC='".$dtNasc."', SEXO='".$sexo."', FORMACAD='".$formAcad."', DISCIPLINAS='".$disciplinas."', FORMORIENT='".$orienta."', DESCRICAO='".$comoconheceu."', CEP='".$CEP."', LOGRADOURO='".$rua."', NUMERO='".$num."', COMP='".$comp."', BAIRRO='".$bairro."', CIDADE='".$cidade."', ESTADO='".$estado."', TELEFONE='".$telefone."', CELULAR='".$celular."', FACEBOOK='".$face."', LATTES='".$lattes."', LINKEDIN='".$linkedin."', OBSERVACAO='".$obs."', STATUS='".$status."' WHERE CDPROF='".$IdProf."'");
	
	//Quando cadastramos os usuários usamos SHA1(‘{senha}’) isso significa que usaremos uma senha encriptada
	// Executa a query
	$inserir = mysql_query($query);

	//colocar condição caso não der certo
	
	mysql_query("DELETE FROM professor_curso WHERE CdProf='".$IdProf."'");
	
	//Query insere dados dos cursos/professor
		foreach($_POST['curso'] as $curso)
	{
		if($curso == "Arquitetura"){
			$NomeCurso = "Arquitetura e Urbanismo";
		}
		else if($curso == "Ambiental"){
			$NomeCurso = "Engenharia Ambiental e Sanitária";
		}
		else if($curso == "Civil"){
			$NomeCurso = "Engenharia Civil";
		}
		else if($curso == "Elétrica"){
			$NomeCurso = "Engenharia Elétrica";
		}
		else if($curso == "Mecânica"){
			$NomeCurso = "Engenharia Mecânica";
		}
		else if($curso == "Metalúrgica"){
			$NomeCurso = 'Engenharia Metalúrgica';
		}
		else if($curso == "Produção"){
			$NomeCurso = "Engenharia de Produção";
		}
		else if($curso == "Química"){
			$NomeCurso = "Engenharia Química";
		}
		else if($curso == "Sistemas"){
			$NomeCurso = "Sistemas de Informação";
		}
		else{
			$NomeCurso = "Tecnologia de Soldagem";
		}		
		
		$query = "INSERT INTO professor_curso (CDPROF,NMCURSO) VALUES ('".$IdProf."','".$NomeCurso."')";
		$inserir = mysql_query($query);
	}
	//fecha a conexao com o banco apos executar os comandos
	mysql_close($conexao);

// Após realizar o cadastro é redirecionado pra página principal
header ("location: http://localhost/Politech/Professor/listaProfessor.php");

?>