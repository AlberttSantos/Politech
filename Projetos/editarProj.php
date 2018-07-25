<!DOCTYPE html>

<html>
	<head>
		<title>Politech - Projetos</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- Imagem título -->
		<link rel="shortcut icon" href="../img/favicon.ico"> 
		 
		<!-- CSS -->
		<link href="../css/estilo.css" rel="stylesheet" type="text/css">
		
		<!-- Bootstrap -->
	    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
		<link href="../bootstrap/css/bootstrap-responsive.css" rel="stylesheet" media="screen">
	
		<!-- JQuery -->
		<script src="../js/jquery.js" type="text/javascript"></script>
		<script src="../js/jquery.maskedinput.js" type="text/javascript"></script>
		<script language="JavaScript" type="text/javascript" src="../js/MascaraValidacao.js"></script> 
				
		<script src="//code.jquery.com/jquery-2.2.2.min.js"></script>
      
   
   <!-- INCLUINDO CAMPOS COMUNS -->
<?php include "../Comuns/comumAdm.inc";?>
<!-- Teste de nivel de usuario -->
<?php if ($nivel >= '4'){ ?>
   <!-- Adicionando Javascript -->
   
<script type = "text/javascript">

			
function testeSel() {
  //var pf = document.getElementById("opt-pf").checked;
  var pj = document.getElementById("opt-pj").checked;
  if (pj) {
	document.getElementById("pf").style.display = "none";
    document.getElementById("pj").style.display = "block";
    
  } else {
    document.getElementById("pf").style.display = "block";
    document.getElementById("pj").style.display = "none";
  }
}



function tipoPessoaSel2() {
  //var pf = document.getElementById("opt-pf").checked;
  var pj = document.getElementById("opt-pj").checked;
  if (pj) {
	document.getElementById("pf").style.display = "none";
    document.getElementById("pj").style.display = "block";
    
  } else {
    document.getElementById("pf").style.display = "block";
    document.getElementById("pj").style.display = "none";
  }
}



 function tipoPessoa() {
  //var pf = document.getElementById("opt-pf").checked;
  var pj = document.getElementById("opt2-pj").checked;
  if (pj) {
	document.getElementById("pesF").style.display = "none";
    document.getElementById("pesJ").style.display = "block";
    
  } else {
    document.getElementById("pesF").style.display = "block";
    document.getElementById("pesJ").style.display = "none";
  }
}	

function tipoP() {
  //var pf = document.getElementById("opt-pf").checked;
  var pj = document.getElementById("opt2-pj").checked;
  if (pj) {
	document.getElementById("pesF").style.display = "none";
    document.getElementById("pesJ").style.display = "block";
    
  } else {
    document.getElementById("pesF").style.display = "block";
    document.getElementById("pesJ").style.display = "none";
  }
}

function addLoadEvent(func) {
  var oldonload = window.onload;
  if (typeof window.onload != 'function') {
    window.onload = func;
  }
  else {
    window.onload = function() {
     if (oldonload) {
      oldonload();
     }
     func();
   }
  }
}

addLoadEvent(testeSel);
addLoadEvent(tipoPessoa);

  $(document).ready(function() {

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#rua").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#uf").val("");
               
            }
            
            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#rua").val("");
                        $("#bairro").val("");
                        $("#cidade").val("");
                        $("#uf").val("");
                        

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("//viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#rua").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#uf").val(dados.uf);
								document.getElementById("msg5").innerHTML="";
								
                              
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                               // alert("CEP não encontrado.");
								document.getElementById("msg5").innerHTML="CEP não encontrado!";
								
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        //alert("Formato de CEP inválido.");
						document.getElementById("msg5").innerHTML="Formato de CEP inválido!";
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });	


function insertSelected(campoOrig, campoDest){
    x = campoOrig.value;
    if (x == "") {
        
        return;
    }
    Origem = campoOrig;
    Destino = campoDest;
    var len = Destino.length;
    for (var i = 0; i < Origem.length; i++) {
        if ((Origem.options[i] != null) && (Origem.options[i].selected)) {
            Destino.options[len] = new Option(Origem.options[i].text, Origem.options[i].value);
            Destino.options[len].disabled = true;
			Destino.options[len].selected = true;
			
			len++;
            Origem.options[i] = null;
            i--;
        }
    }
}
 		
		</script>
   
	</head>
	
	
	<body>
		
			<!-- FECHA CABEÇALHO -->
		</div>
	</div>
	 
	<div class = "areaCadastro">
			
		<!-- SUBCABECALHO DA PAGINA -->
			<div class = areaH1>
				<div class = "h1">Editando dados do Projetos</div>
				<div class = "h2">Nessa sessão é possível editar os dados do Projetos</div>
			</div>
		<!-- ---------------------- -->
			<br/> 
		<!-- FORMULARIO DE CADASTRO -->
		<div class = "conteudo">
<form method = "post" action = "editarProj2.php" name="CadastroProjeto" class = "form-horizontal">
				<div class="container-fluid">
		  
		  			<!-- AREA DADOS DO PROJETO ------------------------------------->	
					<legend>Dados do Projeto</legend>
					
					<?php
						include "../conexao.php"; // incluindo o arquivo que faz a conexao com o banco
	
						$cdProj = $_GET['cdProj']; // Recebendo o valor enviado pelo link
						
						$busca = mysql_query("SELECT * FROM projeto WHERE CDPROJETO = $cdProj"); 
						$row = mysql_fetch_array($busca);
						
						if ($row[16] == "pessoaJuridica")
	                     {
	                    $cdpessoaJ = mysql_query("SELECT pessoaj.CDPESSOAJ, pessoaj.NMEMPRESA FROM projeto, pessoaj WHERE projeto.CDPROJETO = $row[0] and projeto.CDCLIENTEPROJ = pessoaj.CDPESSOAJ");
	                    $clienteJ = mysql_fetch_array($cdpessoaJ);
	                     }
						  else {
	                   $cdpessoaF = mysql_query("SELECT cliente.CDCLIENTE, cliente.NMCLIENTE FROM projeto, cliente WHERE projeto.CDPROJETO = $row[0] and projeto.CDCLIENTEPROJ = cliente.CDCLIENTE");
	                   $clienteF = mysql_fetch_array($cdpessoaF);
						  }
					    
					   $cdgerente = mysql_query("SELECT funcionario.CDFUNCIONARIO, funcionario.NMFUNCIONARIO FROM projeto, funcionario WHERE CDPROJETO = $row[0] and projeto.CDFUNCGERENTE = funcionario.CDFUNCIONARIO");
	                   $gerente = mysql_fetch_array($cdgerente);
					
					   $cdmembroR = mysql_query("SELECT funcionario.CDFUNCIONARIO, funcionario.NMFUNCIONARIO FROM projeto, funcionario WHERE CDPROJETO = $row[0] and projeto.CDFUNCRESPONSAVEL = funcionario.CDFUNCIONARIO");
	                   $membroR = mysql_fetch_array($cdmembroR);
					    
					   $cdgerenteC = mysql_query("SELECT funcionario.CDFUNCIONARIO,funcionario.NMFUNCIONARIO FROM projeto, funcionario WHERE CDPROJETO = $row[0] and projeto.CDFUNCCOMERCIAL = funcionario.CDFUNCIONARIO");
	                   $gerenteC = mysql_fetch_array($cdgerenteC);
					   
					   $cdareas = mysql_query("SELECT AREAPROJ FROM projeto WHERE CDPROJETO = $row[0]");
	                   $areaatuacao = mysql_fetch_array($cdareas);
					   
					   $array1 = explode(',',$areaatuacao[0]);
					   
					   //salvar os codigos dos areas de atuação no vetor aa[]
					   foreach($array1 as $t)
						{							
							//echo $s;
						$aa [] = $t;
						$cont2++;
						}
					
										   
					   $cursoss[] = 'Arquitetura e Urbanismo,Engenharia Ambiental e Sanitária,Engenharia Civil,Engenharia Elétrica,Engenharia Mecânica,Engenharia Metalúrgica,Engenharia de Produção,Engenharia Química,Sistemas de Informação,Tecnologia de Soldagem';
											   
					   $array2 = explode(',',$cursoss[0]);
					   
					   //salvar os codigos dos areas de atuação no vetor aa[]
					   foreach($array2 as $y)
						{							
							//echo $s;
						$bb [] = $y;
						}
					  	
                       $arquitetura = $bb [0];
					   $ambiental = $bb [1];
					   $civil = $bb [2];
					   $eletrica = $bb [3];
					   $mecanica = $bb [4];
					   $metalurgica = $bb [5];
					   $producao = $bb [6];
					   $quimica = $bb [7];
					   $sistemas = $bb [8];
					   $solda = $bb [9];
						
					  					   
					   $cdmembro0 = mysql_query("SELECT CDFUNCPARTICIPANTE FROM projeto WHERE CDPROJETO = $row[0]");
	                   $teste = mysql_fetch_array($cdmembro0);
					
					
					   //tirar virgula do array dos codigos dos funcionarios
					   $array = explode(',',$teste[0]);
					   
					   //salvar os codigos dos membros participantes no vetor mm[]
					   foreach($array as $s)
						{							
							//echo $s;
						$mm [] = $s.'</br>';
						$cont++;
						}
					   
					   //realizar pesquisa de ate 10 membros participantes
					   		   
					   $cdmembr = mysql_query("SELECT funcionario.NMFUNCIONARIO FROM projeto, funcionario WHERE CDPROJETO = '".$row[0]."' and funcionario.CDFUNCIONARIO = '".$mm[0]."'");
	                   $membr = mysql_fetch_array($cdmembr);
					   						
					   $cdmembros1 = mysql_query("SELECT funcionario.NMFUNCIONARIO FROM projeto, funcionario WHERE CDPROJETO = '".$row[0]."' and '".$mm[1]."' = funcionario.CDFUNCIONARIO");
	                   $membros1 = mysql_fetch_array($cdmembros1);
					   
					   $cdmembros2 = mysql_query("SELECT funcionario.NMFUNCIONARIO FROM projeto, funcionario WHERE CDPROJETO = '".$row[0]."' and '".$mm[2]."' = funcionario.CDFUNCIONARIO");
	                   $membros2 = mysql_fetch_array($cdmembros2);
					   
					   $cdmembros3 = mysql_query("SELECT funcionario.NMFUNCIONARIO FROM projeto, funcionario WHERE CDPROJETO = '".$row[0]."' and '".$mm[3]."' = funcionario.CDFUNCIONARIO");
	                   $membros3 = mysql_fetch_array($cdmembros3);
					  
					   $cdmembros4 = mysql_query("SELECT funcionario.NMFUNCIONARIO FROM projeto, funcionario WHERE CDPROJETO = '".$row[0]."' and '".$mm[4]."' = funcionario.CDFUNCIONARIO");
	                   $membros4 = mysql_fetch_array($cdmembros4);
					 						
					   $cdmembros5 = mysql_query("SELECT funcionario.NMFUNCIONARIO FROM projeto, funcionario WHERE CDPROJETO = '".$row[0]."' and '".$mm[5]."' = funcionario.CDFUNCIONARIO");
	                   $membros5 = mysql_fetch_array($cdmembros5);
					   
					   $cdmembros6 = mysql_query("SELECT funcionario.NMFUNCIONARIO FROM projeto, funcionario WHERE CDPROJETO = '".$row[0]."' and '".$mm[6]."' = funcionario.CDFUNCIONARIO");
	                   $membros6 = mysql_fetch_array($cdmembros6);
					   
					   $cdmembros7 = mysql_query("SELECT funcionario.NMFUNCIONARIO FROM projeto, funcionario WHERE CDPROJETO = '".$row[0]."' and '".$mm[7]."' = funcionario.CDFUNCIONARIO");
	                   $membros7 = mysql_fetch_array($cdmembros7);
						
					   $cdmembros8 = mysql_query("SELECT funcionario.NMFUNCIONARIO FROM projeto, funcionario WHERE CDPROJETO = '".$row[0]."' and '".$mm[8]."' = funcionario.CDFUNCIONARIO");
	                   $membros8 = mysql_fetch_array($cdmembros8);
					   
					   $cdmembros9 = mysql_query("SELECT funcionario.NMFUNCIONARIO FROM projeto, funcionario WHERE CDPROJETO = '".$row[0]."' and '".$mm[9]."' = funcionario.CDFUNCIONARIO");
	                   $membros9 = mysql_fetch_array($cdmembros9);
					   
					   $cdmembros10 = mysql_query("SELECT funcionario.NMFUNCIONARIO FROM projeto, funcionario WHERE CDPROJETO = '".$row[0]."' and '".$mm[10]."' = funcionario.CDFUNCIONARIO");
	                   $membros10 = mysql_fetch_array($cdmembros10);
					    
						//savar todos os membros participantes em um array
						$teste [] = $membr[0];
						$teste [] = $membros1[0];
						$teste [] = $membros2[0];
						$teste [] = $membros3[0];
						$teste [] = $membros4[0];
						$teste [] = $membros5[0];
						$teste [] = $membros6[0];
						$teste [] = $membros7[0];
						$teste [] = $membros8[0];
						$teste [] = $membros9[0];
						$teste [] = $membros10[0];
						
						
					  
					  
					  //$cdprofessor = mysql_query("SELECT professor.NMPROFESSOR FROM projeto, professor WHERE CDPROJETO = $row[0] and projeto.CDPROFESSOR = professor.CDPROFESSOR");
	                 //$professor = mysql_fetch_array($cdprofessor);
					  
					  // Acertar sql de busca		
					  // $busca2 = mysql_query("SELECT * FROM cadastroProj WHERE CDCLIENTE = $cdCliente");
					  // $row2 = mysql_fetch_array($busca2);
						
						
					?>
					
					<!-- Linha 1 -->
						<div class="row-fluid">
							<div class="span10">
								<label>Nome do Projeto</label>
								<input  value = "<?php echo $row[1]; ?>" type = "text" name = "txtNome" class="input-xxlarge" required/>
							     <input type="hidden" value="<?php echo $cdProj; ?>" name="cdProj" />
							</div><!-- /Campo 1 -->
						</div><p><!-- fim da Linha 1 -->
						
						<!-- Linha 2 -->
						<div class="row-fluid">
								<div class="span2">
								<label>Data de Entrada</label>
								<input value = "<?php echo $row[2]; ?>" type = "text" name = "txtDtEntrada" class = "span11" id="data"  maxlength="10" onBlur="VerificaDataNasc(CadastroProjeto.data)" placeholder = "00/00/0000" onKeyPress="formata_data(CadastroProjeto.data)" required/> <!-- onKeyPress="MascaraData(CadastroFuncionario.data);" onKeyPress= "ValidaData(CadastroFuncionario.data);-->
						       <div id="msg11" class = "msg"></div> 
						</div>
						
						<div class="span2">
								<label>Data de início Planejado</label>
								<input value = "<?php echo $row[3]; ?>" type = "text" name = "txtDtInicio" class = "span11" id="dataAdm"  maxlength="10" onBlur="VerificaDataAdm(CadastroProjeto.dataAdm)" placeholder = "00/00/0000" onKeyPress="formata_data(CadastroProjeto.dataAdm)" required/> <!-- onKeyPress="MascaraData(CadastroFuncionario.data);" onKeyPress= "ValidaData(CadastroFuncionario.data);-->
						       <div id="msg12" class = "msg"></div> 
						</div>
						
						
						<div class="span2">
								<label>Data de início Real</label>
								<input value = "<?php echo $row[4]; ?>" type = "text" name = "txtDtReal" class = "span11" id="dataInicioR"  maxlength="10" onBlur="VerificaDataInicioR(CadastroProjeto.dataInicioR)" placeholder = "00/00/0000" onKeyPress="formata_data(CadastroProjeto.dataInicioR)" required/> <!-- onKeyPress="MascaraData(CadastroFuncionario.data);" onKeyPress= "ValidaData(CadastroFuncionario.data);-->
						       <div id="msg16" class = "msg"></div> 
						</div>
						</div> <p>
						<div class="row-fluid">
						<div class="span3">
								<label>Data final Planejado</label>
								<input value = "<?php echo $row[33]; ?>" type = "text" name = "txtDtFinalPlan" class = "span11" id="dataFinalP"  maxlength="10" onBlur="VerificaDataFinalP(CadastroProjeto.dataFinalP)" placeholder = "00/00/0000" onKeyPress="formata_data(CadastroProjeto.txtDtFinalPlan)" required/> <!-- onKeyPress="MascaraData(CadastroFuncionario.data);" onKeyPress= "ValidaData(CadastroFuncionario.data);-->
						       <div id="msg19" class = "msg"></div> 
						</div>
						<div class="span3">
								<label>Data final Real</label>
								<input value = "<?php echo $row[5]; ?>" type = "text" name = "txtDtFinal" class = "span11" id="dataFinal"  maxlength="10" onBlur="VerificaDataFinal(CadastroProjeto.dataFinal)" placeholder = "00/00/0000" onKeyPress="formata_data(CadastroProjeto.dataFinal)" required/> <!-- onKeyPress="MascaraData(CadastroFuncionario.data);" onKeyPress= "ValidaData(CadastroFuncionario.data);-->
						       <div id="msg14" class = "msg"></div> 
						</div>
				   
						</div>
						
						<div class="row-fluid">
						<!--Colocar campo para formatar/mascara os preços-->
						<div class="span3">
						<label>Preço Real</label>
						<input value = "<?php echo $row[6]; ?>" type = "text" name = "txtPreco" onBlur="somenteNumeros(CadastroFuncionario.num);" placeholder = "R$ 0000,00" maxlength="10" id="num" class = "span11" required/>
					   <div id="msg10" class = "msg"></div>
					    </div>
					   
					   <div class="span3">
						<label>Preço com Desconto</label>
						<input value = "<?php echo $row[7]; ?>"type = "text" name = "txtPrecoD" onBlur="somenteNumeros(CadastroFuncionario.num);" placeholder = "R$ 0000,00" maxlength="10" id="num" class = "span11" required/>
					   <div id="msg10" class = "msg"></div>
					  </div>
					  </div>
												
						<div class="row-fluid">
						<div class="span3">
						<table border="0" cellpadding="3" cellspacing="0">
						<tr>
						<td>
						<label>Áreas da Politech</label>
						<select multiple  name="sel1" size= "7" id="sel1" style="width: 250px;"  >
									
									<?php if ( $arquitetura != $aa[0] && $arquitetura != $aa[1] && $arquitetura != $aa[2] && $arquitetura != $aa[3] && $arquitetura != $aa[4] && $arquitetura != $aa[5] && $arquitetura != $aa[6] && $arquitetura != $aa[7] && $arquitetura != $aa[8] && $arquitetura != $aa[9]) { ?>
									<option value="Arquitetura e Urbanismo" >Arquitetura e Urbanismo</option>
									<?php  }  ?> 
									
									<?php if ( $ambiental != $aa[0] && $ambiental != $aa[1] && $ambiental != $aa[2] && $ambiental != $aa[3] && $ambiental != $aa[4] && $ambiental != $aa[5] && $ambiental != $aa[6] && $ambiental != $aa[7] && $ambiental != $aa[8] && $ambiental != $aa[9]) { ?>
									<option value="Engenharia Ambiental e Sanitária">Engenharia Ambiental e Sanitária</option>
									<?php  }  ?> 
									
									<?php if ( $civil != $aa[0] && $civil != $aa[1] && $civil != $aa[2] && $civil != $aa[3] && $civil != $aa[4] && $civil != $aa[5] && $civil != $aa[6] && $civil != $aa[7] && $civil != $aa[8] && $civil != $aa[9]) { ?>
									<option value="Engenharia Civil">Engenharia Civil</option>
									<?php  }  ?> 
									
									<?php if ( $eletrica != $aa[0] && $eletrica != $aa[1] && $eletrica != $aa[2] && $eletrica != $aa[3] && $eletrica != $aa[4] && $eletrica != $aa[5] && $eletrica != $aa[6] && $eletrica != $aa[7] && $eletrica != $aa[8] && $eletrica != $aa[9]) { ?>
									<option value="Engenharia Elétrica">Engenharia Elétrica</option>
									<?php  }  ?> 
									
									<?php if ( $mecanica != $aa[0] && $mecanica != $aa[1] && $mecanica != $aa[2] && $mecanica != $aa[3] && $mecanica != $aa[4] && $mecanica != $aa[5] && $mecanica != $aa[6] && $mecanica != $aa[7] && $mecanica != $aa[8] && $mecanica != $aa[9]) { ?>
									<option value="Engenharia Mecânica">Engenharia Mecânica</option>		
									<?php  }  ?> 
									
									<?php if ( $metalurgica != $aa[0] && $metalurgica != $aa[1] && $metalurgica != $aa[2] && $metalurgica != $aa[3] && $metalurgica != $aa[4] && $metalurgica != $aa[5] && $metalurgica != $aa[6] && $metalurgica != $aa[7] && $metalurgica != $aa[8] && $metalurgica != $aa[9]) { ?>
									<option value="Engenharia Metalúrgica">Engenharia Metalúrgica</option>
									<?php  }  ?> 
									
									<?php if ( $producao != $aa[0] && $producao != $aa[1] && $producao != $aa[2] && $producao != $aa[3] && $producao != $aa[4] && $producao != $aa[5] && $producao != $aa[6] && $producao != $aa[7] && $producao != $aa[8] && $producao != $aa[9]) { ?>
									<option value="Engenharia de Produção">Engenharia de Produção</option>
									<?php  }  ?> 
									
									<?php if ( $quimica != $aa[0] && $quimica != $aa[1] && $quimica != $aa[2] && $quimica != $aa[3] && $quimica != $aa[4] && $quimica != $aa[5] && $quimica != $aa[6] && $quimica != $aa[7] && $quimica != $aa[8] && $quimica != $aa[9]) { ?>
									<option value="Engenharia Química">Engenharia Química</option>
									<?php  }  ?> 
									
									<?php if ( $sistemas != $aa[0] && $sistemas != $aa[1] && $sistemas != $aa[2] && $sistemas != $aa[3] && $sistemas != $aa[4] && $sistemas != $aa[5] && $sistemas != $aa[6] && $sistemas != $aa[7] && $sistemas != $aa[8] && $sistemas != $aa[9]) { ?>
									<option value="Sistemas de Informação">Sistemas de Informação</option>
									<?php  }  ?> 
									
									<?php if ( $solda != $aa[0] && $solda != $aa[1] && $solda != $aa[2] && $solda != $aa[3] && $solda != $aa[4] && $solda != $aa[5] && $solda != $aa[6] && $solda != $aa[7] && $solda != $aa[8] && $solda != $aa[9]) { ?>
									<option value="Tecnologia de Soldagem">Tecnologia de Soldagem</option>
									<?php  }  ?> 
									
					 	</select>
						</td>
								<td>
								<input type="button" value=">>" onclick="insertSelected(getElementById('sel1'), getElementById('curso'));" /><br />

								<input type="button" value="<<"   onclick="insertSelected(getElementById('curso'), getElementById('sel1'));" />
								</td>
								<td>
								<label>Áreas de Atuação do Projeto <i class='icon-info-sign' title="Para alterar os dados corretamente, é preciso que todos os cursos neste campo estejam selecionados. " ></i></label>
								 <select multiple required name = "curso[]" id="curso" size="7" style="width: 250px;" >
								 <?php if ($cont2 == 1){?>
									<option value="<?php echo $aa[0];?>" <?php if ($aa[0]!= "") echo 'selected="selected"'; ?>> <?php echo $aa[0]; ?></option>
						            <?php } ?> <?php if ($cont2 == 2){?>
									<option value="<?php echo $aa[0];?>" <?php if ($aa[0]!= "") echo 'selected="selected"';?>> <?php echo $aa[0]; ?></option>
									<option value="<?php echo $aa[1];?>" <?php if ($aa[1]!= "") echo 'selected="selected"';?>> <?php echo $aa[1]; ?></option>
									<?php } ?> <?php if ($cont2 == 3){?>
									<option value="<?php echo $aa[0];?>" <?php if ($aa[0]!= "") echo 'selected="selected"';?>> <?php echo $aa[0]; ?></option>
									<option value="<?php echo $aa[1];?>" <?php if ($aa[1]!= "") echo 'selected="selected"';?>> <?php echo $aa[1]; ?></option>
									<option value="<?php echo $aa[2];?>" <?php if ($aa[2]!= "") echo 'selected="selected"';?>> <?php echo $aa[2]; ?></option>
									<?php } ?> <?php if ($cont2 == 4){?>
									<option value="<?php echo $aa[0];?>" <?php if ($aa[0]!= "") echo 'selected="selected"';?>> <?php echo $aa[0]; ?></option>
									<option value="<?php echo $aa[1];?>" <?php if ($aa[1]!= "") echo 'selected="selected"';?>> <?php echo $aa[1]; ?></option>
									<option value="<?php echo $aa[2];?>" <?php if ($aa[2]!= "") echo 'selected="selected"';?>> <?php echo $aa[2]; ?></option>
									<option value="<?php echo $aa[3];?>" <?php if ($aa[3]!= "") echo 'selected="selected"';?>> <?php echo $aa[3]; ?></option>
									<?php } ?> <?php if ($cont2 == 5){?>
									<option value="<?php echo $aa[0];?>" <?php if ($aa[0]!= "") echo 'selected="selected"';?>> <?php echo $aa[0]; ?></option>
									<option value="<?php echo $aa[1];?>" <?php if ($aa[1]!= "") echo 'selected="selected"';?>> <?php echo $aa[1]; ?></option>
									<option value="<?php echo $aa[2];?>" <?php if ($aa[2]!= "") echo 'selected="selected"';?>> <?php echo $aa[2]; ?></option>
									<option value="<?php echo $aa[3];?>" <?php if ($aa[3]!= "") echo 'selected="selected"';?>> <?php echo $aa[3]; ?></option>
									<option value="<?php echo $aa[4];?>" <?php if ($aa[4]!= "") echo 'selected="selected"';?>> <?php echo $aa[4]; ?></option>
									<?php } ?> <?php if ($cont2 == 6){?>
									<option value="<?php echo $aa[0];?>" <?php if ($aa[0]!= "") echo 'selected="selected"';?>> <?php echo $aa[0]; ?></option>
									<option value="<?php echo $aa[1];?>" <?php if ($aa[1]!= "") echo 'selected="selected"';?>> <?php echo $aa[1]; ?></option>
									<option value="<?php echo $aa[2];?>" <?php if ($aa[2]!= "") echo 'selected="selected"';?>> <?php echo $aa[2]; ?></option>
									<option value="<?php echo $aa[3];?>" <?php if ($aa[3]!= "") echo 'selected="selected"';?>> <?php echo $aa[3]; ?></option>
									<option value="<?php echo $aa[4];?>" <?php if ($aa[4]!= "") echo 'selected="selected"';?>> <?php echo $aa[4]; ?></option>
									<option value="<?php echo $aa[5];?>" <?php if ($aa[5]!= "") echo 'selected="selected"';?>> <?php echo $aa[5]; ?></option>
									<?php } ?> <?php if ($cont2 == 7){?>
									<option value="<?php echo $aa[0];?>" <?php if ($aa[0]!= "") echo 'selected="selected"';?>> <?php echo $aa[0]; ?></option>
									<option value="<?php echo $aa[1];?>" <?php if ($aa[1]!= "") echo 'selected="selected"';?>> <?php echo $aa[1]; ?></option>
									<option value="<?php echo $aa[2];?>" <?php if ($aa[2]!= "") echo 'selected="selected"';?>> <?php echo $aa[2]; ?></option>
									<option value="<?php echo $aa[3];?>" <?php if ($aa[3]!= "") echo 'selected="selected"';?>> <?php echo $aa[3]; ?></option>
									<option value="<?php echo $aa[4];?>" <?php if ($aa[4]!= "") echo 'selected="selected"';?>> <?php echo $aa[4]; ?></option>
									<option value="<?php echo $aa[5];?>" <?php if ($aa[5]!= "") echo 'selected="selected"';?>> <?php echo $aa[5]; ?></option>
									<option value="<?php echo $aa[6];?>" <?php if ($aa[6]!= "") echo 'selected="selected"';?>> <?php echo $aa[6]; ?></option>
									<?php } ?> <?php if ($cont2 == 8){?>
									<option value="<?php echo $aa[0];?>" <?php if ($aa[0]!= "") echo 'selected="selected"';?>> <?php echo $aa[0]; ?></option>
									<option value="<?php echo $aa[1];?>" <?php if ($aa[1]!= "") echo 'selected="selected"';?>> <?php echo $aa[1]; ?></option>
									<option value="<?php echo $aa[2];?>" <?php if ($aa[2]!= "") echo 'selected="selected"';?>> <?php echo $aa[2]; ?></option>
									<option value="<?php echo $aa[3];?>" <?php if ($aa[3]!= "") echo 'selected="selected"';?>> <?php echo $aa[3]; ?></option>
									<option value="<?php echo $aa[4];?>" <?php if ($aa[4]!= "") echo 'selected="selected"';?>> <?php echo $aa[4]; ?></option>
									<option value="<?php echo $aa[5];?>" <?php if ($aa[5]!= "") echo 'selected="selected"';?>> <?php echo $aa[5]; ?></option>
									<option value="<?php echo $aa[6];?>" <?php if ($aa[6]!= "") echo 'selected="selected"';?>> <?php echo $aa[6]; ?></option>
									<option value="<?php echo $aa[7];?>" <?php if ($aa[7]!= "") echo 'selected="selected"';?>> <?php echo $aa[7]; ?></option>
									<?php } ?> <?php if ($cont2 == 9){?>
									<option value="<?php echo $aa[0];?>" <?php if ($aa[0]!= "") echo 'selected="selected"';?>> <?php echo $aa[0]; ?></option>
									<option value="<?php echo $aa[1];?>" <?php if ($aa[1]!= "") echo 'selected="selected"';?>> <?php echo $aa[1]; ?></option>
									<option value="<?php echo $aa[2];?>" <?php if ($aa[2]!= "") echo 'selected="selected"';?>> <?php echo $aa[2]; ?></option>
									<option value="<?php echo $aa[3];?>" <?php if ($aa[3]!= "") echo 'selected="selected"';?>> <?php echo $aa[3]; ?></option>
									<option value="<?php echo $aa[4];?>" <?php if ($aa[4]!= "") echo 'selected="selected"';?>> <?php echo $aa[4]; ?></option>
									<option value="<?php echo $aa[5];?>" <?php if ($aa[5]!= "") echo 'selected="selected"';?>> <?php echo $aa[5]; ?></option>
									<option value="<?php echo $aa[6];?>" <?php if ($aa[6]!= "") echo 'selected="selected"';?>> <?php echo $aa[6]; ?></option>
									<option value="<?php echo $aa[7];?>" <?php if ($aa[7]!= "") echo 'selected="selected"';?>> <?php echo $aa[7]; ?></option>
									<option value="<?php echo $aa[8];?>" <?php if ($aa[8]!= "") echo 'selected="selected"';?>> <?php echo $aa[8]; ?></option>
									<?php } ?> <?php if ($cont2 == 10){?>
									<option value="<?php echo $aa[0];?>" <?php if ($aa[0]!= "") echo 'selected="selected"';?>> <?php echo $aa[0]; ?></option>
									<option value="<?php echo $aa[1];?>" <?php if ($aa[1]!= "") echo 'selected="selected"';?>> <?php echo $aa[1]; ?></option>
									<option value="<?php echo $aa[2];?>" <?php if ($aa[2]!= "") echo 'selected="selected"';?>> <?php echo $aa[2]; ?></option>
									<option value="<?php echo $aa[3];?>" <?php if ($aa[3]!= "") echo 'selected="selected"';?>> <?php echo $aa[3]; ?></option>
									<option value="<?php echo $aa[4];?>" <?php if ($aa[4]!= "") echo 'selected="selected"';?>> <?php echo $aa[4]; ?></option>
									<option value="<?php echo $aa[5];?>" <?php if ($aa[5]!= "") echo 'selected="selected"';?>> <?php echo $aa[5]; ?></option>
									<option value="<?php echo $aa[6];?>" <?php if ($aa[6]!= "") echo 'selected="selected"';?>> <?php echo $aa[6]; ?></option>
									<option value="<?php echo $aa[7];?>" <?php if ($aa[7]!= "") echo 'selected="selected"';?>> <?php echo $aa[7]; ?></option>
									<option value="<?php echo $aa[8];?>" <?php if ($aa[8]!= "") echo 'selected="selected"';?>> <?php echo $aa[8]; ?></option>
									<option value="<?php echo $aa[9];?>" <?php if ($aa[9]!= "") echo 'selected="selected"';?>> <?php echo $aa[9]; ?></option>
									<?php } ?> 									
								 </select>
								 </td>
								</tr>
							</table>
					    </div>
						</div> <p>
						<div class="row-fluid">
						<div class="span10">
						<?php	
						
							include '../conexao.php';
							$query = mysql_query("SELECT NMFUNCIONARIO, CDFUNCIONARIO FROM funcionario");
							$a=1;
						?>
								<table border="0" cellpadding="3" cellspacing="0">
								<tr>
								<td>
								<label>Membros</label>
								<select multiple  name = "sel3" id="sel3" size="7" style="width: 250px;" >
								    									
									<?php while($membross = mysql_fetch_array($query)){  if ($membross ['NMFUNCIONARIO'] != $teste[1] && $membross ['NMFUNCIONARIO'] != $teste[2] && $membross ['NMFUNCIONARIO'] != $teste[3] && $membross ['NMFUNCIONARIO'] != $teste[4] && $membross ['NMFUNCIONARIO'] != $teste[5] && $membross ['NMFUNCIONARIO'] != $teste[6] && $membross ['NMFUNCIONARIO'] != $teste[7] && $membross ['NMFUNCIONARIO'] != $teste[8] && $membross ['NMFUNCIONARIO'] != $teste[9] && $membross ['NMFUNCIONARIO'] != $teste[10]) {  ?>
									
									<option value="<?php echo $membross['CDFUNCIONARIO'] ?>"> <?php echo $membross['NMFUNCIONARIO'] ?></option>
									<?php  } }?>
								</select> 
								
								</td>
								<td>
								<input type="button" value=">>" onclick="insertSelected(getElementById('sel3'), getElementById('membro'));" /><br />

								<input type="button" value="<<"   onclick="insertSelected(getElementById('membro'), getElementById('sel3'));" />
								</td>
								<td>
												
								<label>Membros Participantes <i class='icon-info-sign' title="Para alterar os dados corretamente, é preciso que todos os membros neste campo estejam selecionados. " ></i></label>
								 <select multiple required name = "membro[]" id="membro" size="7" style="width: 250px;" >
								   <?php if ($cont == 1){?>
									<option value="<?php echo $mm[0];?>" <?php if ($mm[0]!= 0) echo 'selected="selected"';?>> <?php echo $membr[0]; ?></option>
						            <?php } ?> <?php if ($cont == 2){?>
									<option value="<?php echo $mm[0];?>" <?php if ($mm[0]!= 0) echo 'selected="selected"';?>> <?php echo $membr[0]; ?></option>
									<option value="<?php echo $mm[1];?>" <?php if ($mm[1]!= 0) echo 'selected="selected"';?>> <?php echo $membros1[0]; ?></option>
									<?php } ?> <?php if ($cont == 3){?>
									<option value="<?php echo $mm[0];?>" <?php if ($mm[0]!= 0) echo 'selected="selected"';?>> <?php echo $membr[0]; ?></option>
									<option value="<?php echo $mm[1];?>" <?php if ($mm[1]!= 0) echo 'selected="selected"';?>> <?php echo $membros1[0]; ?></option>
									<option value="<?php echo $mm[2];?>" <?php if ($mm[2]!= 0) echo 'selected="selected"';?>> <?php echo $membros2[0]; ?></option>
									<?php } ?> <?php if ($cont == 4){?>
									<option value="<?php echo $mm[0];?>" <?php if ($mm[0]!= 0) echo 'selected="selected"';?>> <?php echo $membr[0]; ?></option>
									<option value="<?php echo $mm[1];?>" <?php if ($mm[1]!= 0) echo 'selected="selected"';?>> <?php echo $membros1[0]; ?></option>
									<option value="<?php echo $mm[2];?>" <?php if ($mm[2]!= 0) echo 'selected="selected"';?>> <?php echo $membros2[0]; ?></option>
									<option value="<?php echo $mm[3];?>" <?php if ($mm[3]!= 0) echo 'selected="selected"';?>> <?php echo $membros3[0]; ?></option>
									<?php } ?> <?php if ($cont == 5){?>
									<option value="<?php echo $mm[0];?>" <?php if ($mm[0]!= 0) echo 'selected="selected"';?>> <?php echo $membr[0]; ?></option>
									<option value="<?php echo $mm[1];?>" <?php if ($mm[1]!= 0) echo 'selected="selected"';?>> <?php echo $membros1[0]; ?></option>
									<option value="<?php echo $mm[2];?>" <?php if ($mm[2]!= 0) echo 'selected="selected"';?>> <?php echo $membros2[0]; ?></option>
									<option value="<?php echo $mm[3];?>" <?php if ($mm[3]!= 0) echo 'selected="selected"';?>> <?php echo $membros3[0]; ?></option>
									<option value="<?php echo $mm[4];?>" <?php if ($mm[4]!= 0) echo 'selected="selected"';?>> <?php echo $membros4[0]; ?></option>
									<?php } ?> <?php if ($cont == 6){?>
									<option value="<?php echo $mm[0];?>" <?php if ($mm[0]!= 0) echo 'selected="selected"';?>> <?php echo $membr[0]; ?></option>
									<option value="<?php echo $mm[1];?>" <?php if ($mm[1]!= 0) echo 'selected="selected"';?>> <?php echo $membros1[0]; ?></option>
									<option value="<?php echo $mm[2];?>" <?php if ($mm[2]!= 0) echo 'selected="selected"';?>> <?php echo $membros2[0]; ?></option>
									<option value="<?php echo $mm[3];?>" <?php if ($mm[3]!= 0) echo 'selected="selected"';?>> <?php echo $membros3[0]; ?></option>
									<option value="<?php echo $mm[4];?>" <?php if ($mm[4]!= 0) echo 'selected="selected"';?>> <?php echo $membros4[0]; ?></option>
									<option value="<?php echo $mm[5];?>" <?php if ($mm[5]!= 0) echo 'selected="selected"';?>> <?php echo $membros5[0]; ?></option>
									<?php } ?> <?php if ($cont == 7){?>
									<option value="<?php echo $mm[0];?>" <?php if ($mm[0]!= 0) echo 'selected="selected"';?>> <?php echo $membr[0]; ?></option>
									<option value="<?php echo $mm[1];?>" <?php if ($mm[1]!= 0) echo 'selected="selected"';?>> <?php echo $membros1[0]; ?></option>
									<option value="<?php echo $mm[2];?>" <?php if ($mm[2]!= 0) echo 'selected="selected"';?>> <?php echo $membros2[0]; ?></option>
									<option value="<?php echo $mm[3];?>" <?php if ($mm[3]!= 0) echo 'selected="selected"';?>> <?php echo $membros3[0]; ?></option>
									<option value="<?php echo $mm[4];?>" <?php if ($mm[4]!= 0) echo 'selected="selected"';?>> <?php echo $membros4[0]; ?></option>
									<option value="<?php echo $mm[5];?>" <?php if ($mm[5]!= 0) echo 'selected="selected"';?>> <?php echo $membros5[0]; ?></option>
									<option value="<?php echo $mm[6];?>" <?php if ($mm[6]!= 0) echo 'selected="selected"';?>> <?php echo $membros6[0]; ?></option>
									<?php } ?> <?php if ($cont == 8){?>
									<option value="<?php echo $mm[0];?>" <?php if ($mm[0]!= 0) echo 'selected="selected"';?>> <?php echo $membr[0]; ?></option>
									<option value="<?php echo $mm[1];?>" <?php if ($mm[1]!= 0) echo 'selected="selected"';?>> <?php echo $membros1[0]; ?></option>
									<option value="<?php echo $mm[2];?>" <?php if ($mm[2]!= 0) echo 'selected="selected"';?>> <?php echo $membros2[0]; ?></option>
									<option value="<?php echo $mm[3];?>" <?php if ($mm[3]!= 0) echo 'selected="selected"';?>> <?php echo $membros3[0]; ?></option>
									<option value="<?php echo $mm[4];?>" <?php if ($mm[4]!= 0) echo 'selected="selected"';?>> <?php echo $membros4[0]; ?></option>
									<option value="<?php echo $mm[5];?>" <?php if ($mm[5]!= 0) echo 'selected="selected"';?>> <?php echo $membros5[0]; ?></option>
									<option value="<?php echo $mm[6];?>" <?php if ($mm[6]!= 0) echo 'selected="selected"';?>> <?php echo $membros6[0]; ?></option>
									<option value="<?php echo $mm[7];?>" <?php if ($mm[7]!= 0) echo 'selected="selected"';?>> <?php echo $membros7[0]; ?></option>
									<?php } ?> <?php if ($cont == 9){?>
									<option value="<?php echo $mm[0];?>" <?php if ($mm[0]!= 0) echo 'selected="selected"';?>> <?php echo $membr[0]; ?></option>
									<option value="<?php echo $mm[1];?>" <?php if ($mm[1]!= 0) echo 'selected="selected"';?>> <?php echo $membros1[0]; ?></option>
									<option value="<?php echo $mm[2];?>" <?php if ($mm[2]!= 0) echo 'selected="selected"';?>> <?php echo $membros2[0]; ?></option>
									<option value="<?php echo $mm[3];?>" <?php if ($mm[3]!= 0) echo 'selected="selected"';?>> <?php echo $membros3[0]; ?></option>
									<option value="<?php echo $mm[4];?>" <?php if ($mm[4]!= 0) echo 'selected="selected"';?>> <?php echo $membros4[0]; ?></option>
									<option value="<?php echo $mm[5];?>" <?php if ($mm[5]!= 0) echo 'selected="selected"';?>> <?php echo $membros5[0]; ?></option>
									<option value="<?php echo $mm[6];?>" <?php if ($mm[6]!= 0) echo 'selected="selected"';?>> <?php echo $membros6[0]; ?></option>
									<option value="<?php echo $mm[7];?>" <?php if ($mm[7]!= 0) echo 'selected="selected"';?>> <?php echo $membros7[0]; ?></option>
									<option value="<?php echo $mm[8];?>" <?php if ($mm[8]!= 0) echo 'selected="selected"';?>> <?php echo $membros8[0]; ?></option>
									<?php } ?> <?php if ($cont == 10){?>
									<option value="<?php echo $mm[0];?>" <?php if ($mm[0]!= 0) echo 'selected="selected"';?>> <?php echo $membr[0]; ?></option>
									<option value="<?php echo $mm[1];?>" <?php if ($mm[1]!= 0) echo 'selected="selected"';?>> <?php echo $membros1[0]; ?></option>
									<option value="<?php echo $mm[2];?>" <?php if ($mm[2]!= 0) echo 'selected="selected"';?>> <?php echo $membros2[0]; ?></option>
									<option value="<?php echo $mm[3];?>" <?php if ($mm[3]!= 0) echo 'selected="selected"';?>> <?php echo $membros3[0]; ?></option>
									<option value="<?php echo $mm[4];?>" <?php if ($mm[4]!= 0) echo 'selected="selected"';?>> <?php echo $membros4[0]; ?></option>
									<option value="<?php echo $mm[5];?>" <?php if ($mm[5]!= 0) echo 'selected="selected"';?>> <?php echo $membros5[0]; ?></option>
									<option value="<?php echo $mm[6];?>" <?php if ($mm[6]!= 0) echo 'selected="selected"';?>> <?php echo $membros6[0]; ?></option>
									<option value="<?php echo $mm[7];?>" <?php if ($mm[7]!= 0) echo 'selected="selected"';?>> <?php echo $membros7[0]; ?></option>
									<option value="<?php echo $mm[8];?>" <?php if ($mm[8]!= 0) echo 'selected="selected"';?>> <?php echo $membros8[0]; ?></option>
									<option value="<?php echo $mm[9];?>" <?php if ($mm[9]!= 0) echo 'selected="selected"';?>> <?php echo $membros9[0]; ?></option>
									<?php } ?> <?php if ($cont == 11){?>
									<option value="<?php echo $mm[0];?>" <?php if ($mm[0]!= 0) echo 'selected="selected"';?>> <?php echo $membr[0]; ?></option>
									<option value="<?php echo $mm[1];?>" <?php if ($mm[1]!= 0) echo 'selected="selected"';?>> <?php echo $membros1[0]; ?></option>
									<option value="<?php echo $mm[2];?>" <?php if ($mm[2]!= 0) echo 'selected="selected"';?>> <?php echo $membros2[0]; ?></option>
									<option value="<?php echo $mm[3];?>" <?php if ($mm[3]!= 0) echo 'selected="selected"';?>> <?php echo $membros3[0]; ?></option>
									<option value="<?php echo $mm[4];?>" <?php if ($mm[4]!= 0) echo 'selected="selected"';?>> <?php echo $membros4[0]; ?></option>
									<option value="<?php echo $mm[5];?>" <?php if ($mm[5]!= 0) echo 'selected="selected"';?>> <?php echo $membros5[0]; ?></option>
									<option value="<?php echo $mm[6];?>" <?php if ($mm[6]!= 0) echo 'selected="selected"';?>> <?php echo $membros6[0]; ?></option>
									<option value="<?php echo $mm[7];?>" <?php if ($mm[7]!= 0) echo 'selected="selected"';?>> <?php echo $membros7[0]; ?></option>
									<option value="<?php echo $mm[8];?>" <?php if ($mm[8]!= 0) echo 'selected="selected"';?>> <?php echo $membros8[0]; ?></option>
									<option value="<?php echo $mm[9];?>" <?php if ($mm[9]!= 0) echo 'selected="selected"';?>> <?php echo $membros9[0]; ?></option>
									<option value="<?php echo $mm[10];?>"<?php if ($mm[10]!= 0) echo 'selected="selected"';?>> <?php echo $membros10[0]; ?></option>
									<?php } ?> 
								</select> 
								</td>
								</tr>
							</table>	
						</div>
					</div> <p>
					
				<div class="row-fluid">
						<div class="span3">
						<?php	
							include '../conexao.php';
							$query = mysql_query("SELECT NMFUNCIONARIO, CDFUNCIONARIO FROM funcionario");
						?>
								<label>Gerente do Projeto</label>
								 <select required name = "Gerente" style="width: 250px;">
									<option value="<?php echo $row[8]?>" <?php if($row[8] == $gerente[0]) echo 'selected="selected"'; ?>> <?php echo $gerente[1];?> </option>
									
									<?php while($membro = mysql_fetch_array($query)) { if ($membro['CDFUNCIONARIO'] != $gerente[0]){ ?>
									<option value="<?php echo $membro['CDFUNCIONARIO'] ?>"> <?php echo $membro['NMFUNCIONARIO'] ?></option>
									<?php }} ?>
								</select> <!-- &nbsp;&nbsp;&nbsp;<a href="cadastroCargo.php"><i class='icon-plus'></i></a> -->
						</div>
						<div class="span3">
						<?php	
							include '../conexao.php';
							$query = mysql_query("SELECT NMPROF, CDPROF FROM professor");
						?>
								<label>Professor Orientador</label>
								 <select required name = "Professor" style="width: 250px;">
									<option></option>
									<option value="Professor teste">Professor teste</option>
									
								</select> <!-- &nbsp;&nbsp;&nbsp;<a href="cadastroCargo.php"><i class='icon-plus'></i></a> -->
						</div>
					</div><p> 
				
				<div class="row-fluid">
						<div class="span3">
						<?php	
							include '../conexao.php';
							
							//mudar select para filtrar setor ADM financeiro
							$query2 = mysql_query("SELECT NMFUNCIONARIO, CDFUNCIONARIO FROM funcionario");
						?>

								<label>Membro responsavel pela precificação</label>
								 <select required name = "MembroR" id="MembroR" style="width: 250px;">
									<option value="<?php echo $row[12]?>" <?php if($row[12] == $membroR[0]) echo 'selected="selected"'; ?>> <?php echo $membroR[1];?> </option>
									
									<?php while($membro = mysql_fetch_array($query2)) { if ($membro['CDFUNCIONARIO'] != $membroR[0]){?>
									<option value="<?php echo $membro['CDFUNCIONARIO'] ?>"> <?php echo $membro['NMFUNCIONARIO'] ?> </option>
									<?php }} ?>
								</select> <!-- &nbsp;&nbsp;&nbsp;<a href="cadastroCargo.php"><i class='icon-plus'></i></a> -->
						</div>
							
										
						<div class="span3">
						<?php	
							include '../conexao.php';
							
							//mudar select para filtrar setor de Marketing
							$query3 = mysql_query("SELECT NMFUNCIONARIO, CDFUNCIONARIO FROM funcionario");
						?>
								<label>Gerente comercial responsável</label>
								 <select required name = "GerenteC" id="GerenteC" style="width: 250px;">
									<option value="<?php echo $row[13]?>" <?php if($row[13] == $gerenteC[0]) echo 'selected="selected"'; ?>> <?php echo $gerenteC[1];?> </option>
									
									<?php while($membro = mysql_fetch_array($query3)) { if ($membro['CDFUNCIONARIO'] != $gerenteC[0]){ ?>
									<option value="<?php echo $membro['CDFUNCIONARIO'] ?>"> <?php echo $membro['NMFUNCIONARIO'] ?></option>
									<?php } }?>
								</select> <!-- &nbsp;&nbsp;&nbsp;<a href="cadastroCargo.php"><i class='icon-plus'></i></a> -->
						</div>
					</div> <br>
					<?php $row[14] ?>
	<div class="row-fluid">
	<div class="span5">
	 Houve atraso? &nbsp;&nbsp;
     Sim &nbsp;
	
    <input id="opt-pf" value = "Sim" <?php if($row [14] == "Sim") echo 'checked="checked"'  ?>  type="radio" name="Atraso" onclick="tipoPessoaSel2();" onload="testeSel();"  />&nbsp;&nbsp;&nbsp;&nbsp;Não &nbsp;
    <input id="opt-pj" value = "Não" <?php if($row [14] == "Não") echo 'checked="checked"'  ?>  type="radio" name="Atraso" onclick="tipoPessoaSel2();" onload="testeSel();"  />
  </div>
  </div>  
  <div class="row-fluid" id="pf" style="display:none">
    <div class="span2">
      <label for="cpf" >Número de dias</label>
	  <!-- Ajustar validação -->
	  <input type = "text" id="numDias" value="<?php echo $row[15]?>" name = "txtQTDdias" onBlur="somenteNumerosDias(CadastroProjeto.numDias);" maxlength="7" class = "span10" />
	  <div id="msg17" class = "msg"></div>
	 <div id="pj">
	 </div>
    </div> <p>
    </div> <p>
	
	<div class="row-fluid">
	
	<div class="span5">
	 Cliente do projeto: &nbsp;&nbsp;
     Pessoa Física &nbsp;
	 <input id="opt2-pf"  type="radio" value = "pessoaFisica" <?php if($row [16] == "pessoaFisica") echo 'checked="checked"' ?> name="TipoPessoa" onclick="tipoP();" onload="tipoPessoa();"  required/>&nbsp;&nbsp;&nbsp;&nbsp;Pessoa Jurídica &nbsp;
     <input id="opt2-pj" type="radio" value = "pessoaJuridica" <?php if($row [16] == "pessoaJuridica") echo 'checked="checked"' ?> name="TipoPessoa" onclick="tipoP();" onload="tipoPessoa();"  required/>
  	 </div> 
	 </div> 
	 	
		<?php	
							include '../conexao.php';
							$query4 = mysql_query("SELECT NMCLIENTE, CDCLIENTE FROM cliente");
							$query5 = mysql_query("SELECT NMEMPRESA, CDPESSOAJ FROM pessoaj");
		?>
						
				<?php if ($row [16]== "pessoaFisica"){?>	
				<div class="row-fluid">
						<div class="span3" id="pesF" style="display:none" >
													
								 <select  name = "clienteF" id="clienteF" style="width: 250px;" >
									<option value="<?php echo $row[17]?>" <?php if($row[17] == $clienteF[0]) echo 'selected="selected"'; ?>> <?php echo $clienteF[1];?> </option>
									
									<?php while($cliente = mysql_fetch_array($query4)) { if ($cliente['CDCLIENTE'] != $clienteF[0]){ ?>
									<option value="<?php echo $cliente['CDCLIENTE'] ?>"> <?php echo $cliente['NMCLIENTE'] ?></option>
									<?php } } ?>
								</select> <!-- &nbsp;&nbsp;&nbsp;<a href="cadastroCargo.php"><i class='icon-plus'></i></a> -->
					</div>
					</div>
					
					<div class="row-fluid">
					<div class="span3" id="pesJ" style="display:none" >
						
								 <select name = "clienteJ" id="clienteJ" style="width: 250px;" >
									<option selected> </option>
									
									<?php while($pessoaj = mysql_fetch_array($query5)) { ?>
									<option value="<?php echo $pessoaj['CDPESSOAJ'] ?>"> <?php echo $pessoaj['NMEMPRESA'] ?></option>
									<?php  }?>
								</select>
						
						</div>
					</div> <br>
				<?php }
				else {?>
				
				<div class="row-fluid">
						<div class="span3" id="pesF" style="display:none" >
													
								 <select  name = "clienteF" id="clienteF" style="width: 250px;" >
									<option selected> </option>
									
									<?php while($cliente = mysql_fetch_array($query4)) { ?>
									<option value="<?php echo $cliente['CDCLIENTE'] ?>"> <?php echo $cliente['NMCLIENTE'] ?></option>
									<?php }  ?>
								</select> <!-- &nbsp;&nbsp;&nbsp;<a href="cadastroCargo.php"><i class='icon-plus'></i></a> -->
					</div>
					</div>
				
					<div class="row-fluid">
					<div class="span3" id="pesJ" style="display:none" >
						
								 <select name = "clienteJ" id="clienteJ" style="width: 250px;" >
									<option value="<?php echo $row[17]?>" <?php if($row[17] == $clienteJ[0]) echo 'selected="selected"'; ?>> <?php echo $clienteJ[1];?> </option>
									
									<?php while($pessoaj = mysql_fetch_array($query5)) { if ($pessoaj['CDPESSOAJ'] != $clienteJ[0]){?>
									<option value="<?php echo $pessoaj['CDPESSOAJ'] ?>"> <?php echo $pessoaj['NMEMPRESA'] ?></option>
									<?php } }?>
								</select>
						
						</div>
					</div> 
				<?php }?>
				<br>
			
				
				<legend>Informações Adicionais</legend>
						<div class="row-fluid">
								<div class="span3">
								<label>Data de Assinatura do Contrato</label>
								<input type = "text" value = "<?php echo $row[18]; ?>" name = "txtDtAssContrato" class = "span11" id="dataAss"  maxlength="10" onBlur="VerificaDataAss(CadastroProjeto.dataAss)" placeholder = "00/00/0000" onKeyPress="formata_data(CadastroProjeto.dataAss)" > <!-- onKeyPress="MascaraData(CadastroFuncionario.data);" onKeyPress= "ValidaData(CadastroFuncionario.data);-->
						       <div id="msg15" class = "msg"></div> 
						</div>
							 <div class="span3">
								<label>Status do Projeto</label>
									<select  name="txtStatusProj"  style="width: 250px;" required>
									<option value = "Não Iniciado" <?php if($row[23] == 'Não Iniciado') echo 'selected="selected"'; ?> >Não Iniciado</option>
									<option value = "Em andamento" <?php if($row[23] == 'Em andamento') echo 'selected="selected"'; ?> >Em andamento</option>
									<option value = "Concluido"    <?php if($row[23] == 'Concluido') echo 'selected="selected"'; ?> >Concluido</option>
									</select>
	                   </div>					
						</div> <p>
					
					
	<div class="row-fluid">
	<div class="span5">
	 Houve contra proposta? &nbsp;&nbsp;
     Sim &nbsp;
	 <input id="ContraSim" value = "Sim" <?php if($row [20] == "Sim") echo 'checked="checked"'  ?> type="radio" name="ContraProposta"  />&nbsp;&nbsp;&nbsp;&nbsp;Não &nbsp;
     <input id="ContraNao" value = "Não" <?php if($row [20] == "Não") echo 'checked="checked"'  ?> type="radio" name="ContraProposta"  />
  	 </div> 
	</div> <p>
	
	<div class="row-fluid">
	<div class="span3">
								<label>Forma de Pagamento</label>
									<select required name="txtFormaPag"  style="width: 250px;" >
									
									<option value="Dinheiro" <?php if($row[22] == 'Dinheiro') echo 'selected="selected"'; ?> >Dinheiro</option>
									<option value="Transferencia Bancaria" <?php if($row[22] == 'Transferencia Bancaria') echo 'selected="selected"'; ?>>Transferencia Bancaria</option>
									<option value="Crédito" <?php if($row[22] == 'Crédito') echo 'selected="selected"'; ?>>Crédito</option>
									<option value="Débito" <?php if($row[22] == 'Débito') echo 'selected="selected"'; ?>>Débito</option>
									<option value="Boleto" <?php if($row[22] == 'Boleto') echo 'selected="selected"'; ?>>Boleto</option>
									</select>
									
     </div>	
	 </div>
	 <p>
	 
	 <div class="row-fluid">
	<div class="span3">
	<label>Número de Visitas Técnicas</label>
	<input value = "<?php echo $row[19]; ?>"  type = "text" name = "NumVisitas" onBlur="somenteNumerosVisitas(CadastroProjeto.numVisitas);"  maxlength="10" id="numVisitas" class = "span11" required/>
	<div id="msg18" class = "msg"></div>
	</div>
	</div>
	 <div class="row-fluid">
	<div class="span3">
	<label>Data e descrição Visitas Técnicas <i class='icon-info-sign' title="Para verificar as informações coletadas nas visitas de forma mais completa, deve-se procurar os documentos padrões de visitas técnicas." ></i> </label>

	<textarea required rows="3"  name = "txtVisitas" class = "input-xxlarge" placeholder = "Digite aqui as datas e uma breve descrição das Visitas Técnicas...  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp; 00/00/0000 - Descrição da Visita" id = "Obs" maxlength = "200"><?php echo $row[21];?></textarea>
							
	</div>  
    </div> 	   
    <br>	

<!-- CAMPOS ENDEREÇO ------------------>
				<legend>Endereço</legend>
				<div class="row-fluid">
					<div class="span6">
						<label>Código Postal</label>
						<input type = "text" value = "<?php echo $row[24]; ?>" id = "cep" name ="txtCep" onkeypress= "MascaraCep(CadastroProjeto.cep);" maxlength="10" placeholder = "00000-000"required/>&nbsp;&nbsp;&nbsp;<a href =http://www.buscacep.correios.com.br/sistemas/buscacep/ target="_blank">Não sei meu CEP</a>
					 <div id="msg5" class = "msg"></div>
					</div>
				</div><p>
				<!-- FIM LINHA 1 -->
				
				<div class="row-fluid">
					<div class="span12">
						<label>Logradouro</label>
						<input value = "<?php echo $row[25]; ?>" type = "text" name = "txtRua" id="rua" class = "input-xxlarge" required/>
					</div>
                </div><p> 
				<!-- FIM LINHA 2 -->
		  
				
				<div class="row-fluid">
					<div class="span2">
						<label>Número</label>
						<input value = "<?php echo $row[26]; ?>" type = "text" name = "txtNumero" onBlur="somenteNumeros(CadastroProjeto.num);" maxlength="7" id="num" class = "span10" required/>
					   <div id="msg10" class = "msg"></div>
					</div>
					<div class="span5">
						<label>Complemento</label>
						<input type = "text" name = "txtComplemento" value = "<?php echo $row[27]; ?>" class = "span9" id="comp">
					</div><!--/span-->
				</div><p><!--/row-->
				<!-- FIM LINHA 3 -->				
         

				<!-- Linha 4 -->
						<div class="row-fluid">
						<div class="span2">
								<label>Bairro</label>
								<input type = "text" value = "<?php echo $row[28]; ?>" name = "txtBairro" id="bairro" class = "span10"/required>
						</div><!-- /Campo 1 -->
						<div class="span2">
								<label>Cidade</label>
								<input type = "text" value = "<?php echo $row[29]; ?>" name = "txtCidade" id="cidade" class = "span10"/required>
						</div><!-- /Campo 2 -->
						<div class="span2">
								<label>Estado</label>
									<select required name="txtEstado" id="uf" style="width: 70px;" /required>
									<option selected></option>
									<option value="AC" <?php if($row[30] == 'AC') echo 'selected="selected"'; ?>>AC</option>
									<option value="AL" <?php if($row[30] == 'AL') echo 'selected="selected"'; ?>>AL</option>
									<option value="AM" <?php if($row[30] == 'AM') echo 'selected="selected"'; ?>>AM</option>
									<option value="AP" <?php if($row[30] == 'AP') echo 'selected="selected"'; ?>>AP</option>
									<option value="BA" <?php if($row[30] == 'BA') echo 'selected="selected"'; ?>>BA</option>		
									<option value="CE" <?php if($row[30] == 'CE') echo 'selected="selected"'; ?>>CE</option>
									<option value="DF" <?php if($row[30] == 'DF') echo 'selected="selected"'; ?>>DF</option>
									<option value="ES" <?php if($row[30] == 'ES') echo 'selected="selected"'; ?>>ES</option>
									<option value="GO" <?php if($row[30] == 'GO') echo 'selected="selected"'; ?>>GO</option>
									<option value="MA" <?php if($row[30] == 'MA') echo 'selected="selected"'; ?>>MA</option>
									<option value="MG" <?php if($row[30] == 'MG') echo 'selected="selected"'; ?>>MG</option>
									<option value="MS" <?php if($row[30] == 'MS') echo 'selected="selected"'; ?>>MS</option>
									<option value="MT" <?php if($row[30] == 'MT') echo 'selected="selected"'; ?>>MT</option>
									<option value="PA" <?php if($row[30] == 'PA') echo 'selected="selected"'; ?>>PA</option>
									<option value="PB" <?php if($row[30] == 'PB') echo 'selected="selected"'; ?>>PB</option>
									<option value="PE" <?php if($row[30] == 'PE') echo 'selected="selected"'; ?>>PE</option>
									<option value="PI" <?php if($row[30] == 'PI') echo 'selected="selected"'; ?>>PI</option>
									<option value="PR" <?php if($row[30] == 'PR') echo 'selected="selected"'; ?>>PR</option>	
									<option value="RJ" <?php if($row[30] == 'RJ') echo 'selected="selected"'; ?>>RJ</option>
									<option value="RN" <?php if($row[30] == 'RN') echo 'selected="selected"'; ?>>RN</option>
									<option value="RS" <?php if($row[30] == 'RS') echo 'selected="selected"'; ?>>RS</option>	
									<option value="RO" <?php if($row[30] == 'RO') echo 'selected="selected"'; ?>>RO</option>
									<option value="RR" <?php if($row[30] == 'RR') echo 'selected="selected"'; ?>>RR</option>
									<option value="SC" <?php if($row[30] == 'SC') echo 'selected="selected"'; ?>>SC</option>
									<option value="SE" <?php if($row[30] == 'SE') echo 'selected="selected"'; ?>>SE</option>
									<option value="SP" <?php if($row[30] == 'SP') echo 'selected="selected"'; ?>>SP</option>
									<option value="TO" <?php if($row[30] == 'TO') echo 'selected="selected"'; ?>>TO</option>
								</select>
						</div><!-- /Campo 2 -->
						</div><br> <!--FIM DA LINHA 4-->

						
					
										
					<legend>Observações</legend>
							<div class="row-fluid">
						<div class="row-fluid">
							<div class="span3">
								<textarea  rows="3" name = "txtObs" class = "input-xxlarge" placeholder = "Digite aqui qualquer observação a ser feita..." id = "Obs" maxlength = "200"><?php echo $row[32]; ?></textarea>
							</div>
						</div><br>
						</div>
						
							<br> <br>	 
					
					<!-- BOTÕES -->
							<input type="submit" value="Salvar alterações" name="btnCadastrar" class = "btn " >
							<input type="button" value="Cancelar" name="btnVoltar" class = "btn btn-danger" onclick="location.href = 'listarProj.php'">
            
	</div>
      </form>
	</div> <!-- FECHA CONTEUDO -->
<!-- RODAPÉ -->
		<div class = "hr"></div>
		<div class ="rodape">
			<div class = "textorodape">
				©2016 Politech. Todos os direitos reservados - albertt.santos@politech.com.br<br>
			</div>
		</div>
</body>
</html>
<?php }
else
{
	header('location:../Home/cp.php');
}

?>
