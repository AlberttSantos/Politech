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
<?php if ($nivel >= '3'){ ?>
   <!-- Adicionando Javascript -->
   
<script type = "text/javascript" >
			
			function tipoPessoaSel() {
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



           /*function TrocaList(ListOrigem,ListDestino) 
             {
                var i;
                for (i = 0; i < ListOrigem.options.length ; i++)
				{
				if (ListOrigem.options[i].selected == true)
							{
					var Op = document.createElement("OPTION");
							Op.text = ListOrigem.options[i].text;
							Op.value = ListOrigem.options[i].value;
						ListDestino.options.add(Op);
						ListOrigem.options.remove(i);
						i–;
						}
						}
			 }
			 */

function SelectMoveRows(SS1,SS2)
{
    var SelID='';
    var SelText='';
    // Move rows from SS1 to SS2 from bottom to top
    for (i=SS1.options.length - 1; i>=0; i--)
    {
        if (SS1.options[i].selected == true)
        {
            SelID=SS1.options[i].value;
            SelText=SS1.options[i].text;
            var newRow = new Option(SelText,SelID);
            SS2.options[SS2.length]=newRow;
            SS1.options[i]=null;
        }
    }
    SelectSort(SS2);
}
function SelectSort(SelList)
{
    var ID='';
    var Text='';
    for (x=0; x < SelList.length - 1; x++)
    {
        for (y=x + 1; y < SelList.length; y++)
        {
            if (SelList[x].text > SelList[y].text)
            {
                // Swap rows
                ID=SelList[x].value;
                Text=SelList[x].text;
                SelList[x].value=SelList[y].value;
                SelList[x].text=SelList[y].text;
                SelList[y].value=ID;
                SelList[y].text=Text;
            }
        }
    }
}


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
				<div class = "h1">Cadastro de Projetos</div>
				<div class = "h2">Nessa sessão é possível cadastrar Projetos</div>
			</div>
		<!-- ---------------------- -->
			<br/> 
		<!-- FORMULARIO DE CADASTRO -->
		<div class = "conteudo">
         <form method = "post" action = "salvaProj.php" name="CadastroProjeto" class = "form-horizontal">
				<div class="container-fluid">
		  
		  			<!-- AREA DADOS DO PROJETO ------------------------------------->	
					<legend>Dados do Projeto</legend>
					
					<!-- Linha 1 -->
						<div class="row-fluid">
							<div class="span10">
								<label>Nome do Projeto</label>
								<input type = "text" name = "txtNome" class="input-xxlarge" required/>
							</div><!-- /Campo 1 -->
						</div><p><!-- fim da Linha 1 -->
						
						<!-- Linha 2 -->
						<div class="row-fluid">
								<div class="span2">
								<label>Data de Entrada</label>
								<input type = "text" name = "txtDtEntrada" class = "span11" id="data"  maxlength="10" onBlur="VerificaDataNasc(CadastroProjeto.data)" placeholder = "00/00/0000" onKeyPress="formata_data(CadastroProjeto.data)" required/> <!-- onKeyPress="MascaraData(CadastroFuncionario.data);" onKeyPress= "ValidaData(CadastroFuncionario.data);-->
						       <div id="msg11" class = "msg"></div> 
						</div>
						
						<div class="span2">
								<label>Data de início Planejado</label>
								<input type = "text" name = "txtDtInicio" class = "span11" id="dataAdm"  maxlength="10" onBlur="VerificaDataAdm(CadastroProjeto.dataAdm)" placeholder = "00/00/0000" onKeyPress="formata_data(CadastroProjeto.dataAdm)" required/> <!-- onKeyPress="MascaraData(CadastroFuncionario.data);" onKeyPress= "ValidaData(CadastroFuncionario.data);-->
						       <div id="msg12" class = "msg"></div> 
						</div>
						
						
						<div class="span2">
								<label>Data de início Real</label>
								<input type = "text" name = "txtDtReal" class = "span11" id="dataInicioR"  maxlength="10" onBlur="VerificaDataInicioR(CadastroProjeto.dataInicioR)" placeholder = "00/00/0000" onKeyPress="formata_data(CadastroProjeto.dataInicioR)" required/> <!-- onKeyPress="MascaraData(CadastroFuncionario.data);" onKeyPress= "ValidaData(CadastroFuncionario.data);-->
						       <div id="msg16" class = "msg"></div> 
						</div>
						</div> <p>
						<div class="row-fluid">
						<div class="span3">
								<label>Data final Planejado</label>
								<input type = "text" name = "txtDtFinalPlan" class = "span11" id="dataFinalPlan"  maxlength="10" onBlur="VerificaDataFinalPlan(CadastroProjeto.dataFinalPlan)" placeholder = "00/00/0000" onKeyPress="formata_data(CadastroProjeto.dataFinalPlan)" required/> <!-- onKeyPress="MascaraData(CadastroFuncionario.data);" onKeyPress= "ValidaData(CadastroFuncionario.data);-->
						       <div id="msg14" class = "msg"></div> 
						</div>
						<div class="span3">
								<label>Data final Real</label>
								<input type = "text" name = "txtDtFinal" class = "span11" id="dataFinal"  maxlength="10" onBlur="VerificaDataFinal(CadastroProjeto.dataFinal)" placeholder = "00/00/0000" onKeyPress="formata_data(CadastroProjeto.dataFinal)" required/> <!-- onKeyPress="MascaraData(CadastroFuncionario.data);" onKeyPress= "ValidaData(CadastroFuncionario.data);-->
						       <div id="msg19" class = "msg"></div> 
						</div>
				   
						</div>
						
						<div class="row-fluid">
						<!--Colocar campo para formatar/mascara os preços-->
						<div class="span3">
						<label>Preço Real</label>
						<input type = "text" name = "txtPreco" id="precoR" onBlur="somenteNumerosPrecoR(CadastroProjeto.precoR);" placeholder = "R$ 0000,00" maxlength="10"  class = "span11" required/>
					   <div id="msg19" class = "msg"></div>
					    </div>
					   
					   <div class="span3">
						<label>Preço com Desconto</label>
						<input type = "text" name = "txtPrecoD" id="precoD" onBlur="somenteNumerosPrecoD(CadastroProjeto.precoD);" placeholder = "R$ 0000,00" maxlength="10" class = "span11" required/>
					   <div id="msg20" class = "msg"></div>
					  </div>
					  </div>
												
						<div class="row-fluid">
						<div class="span10">
						
						
						<table border="0" cellpadding="3" cellspacing="0">
					    <tr>
						<td>
						<label>Áreas da Politech</label>
						<select multiple name="sel1" id="sel1"  size="7" style="width: 250px;" >
									<option  value="Arquitetura e Urbanismo" >Arquitetura e Urbanismo</option>
									<option value="Engenharia Ambiental e Sanitária">Engenharia Ambiental e Sanitária</option>
									<option value="Engenharia Civil">Engenharia Civil</option>
									<option value="Engenharia Elétrica">Engenharia Elétrica</option>
									<option value="Engenharia Mecânica">Engenharia Mecânica</option>		
									<option value="Engenharia Metalúrgica">Engenharia Metalúrgica</option>
									<option value="Engenharia de Produção">Engenharia de Produção</option>
									<option value="Engenharia Química">Engenharia Química</option>
									<option value="Sistemas de Informação">Sistemas de Informação</option>
									<option value="Tecnologia de Soldagem">Tecnologia de Soldagem</option>
						</select>
						</td>
                        <td>
						<input type="button" value=">>" onclick="insertSelected(getElementById('sel1'), getElementById('curso'));" /><br />

                        <input type="button" value="<<"   onclick="insertSelected(getElementById('curso'), getElementById('sel1'));" />

						<!--
					   <input type="Button" value=">>" style="width: 50px;"  onClick="SelectMoveRows(document.CadastroProjeto.Features,document.CadastroProjeto.curso)"> 
							<br> 
                       <input type="Button" value="<<" style="width: 50px;" onClick="SelectMoveRows(document.CadastroProjeto.curso,document.CadastroProjeto.Features)">	
						-->
						</td>
							<td>
							<label>Áreas de Atuação do Projeto <i class='icon-info-sign' title="Para salvar os dados corretamente, é preciso que todos os cursos neste campo estejam selecionados. " ></i></label>							
						 <select multiple style="width: 250px;"  name="curso[]" id="curso"  size="7" required >
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
						?>
						
							    <table border="0" cellpadding="3" cellspacing="0">
								<tr>
								<td>
								<label>Membros</label>
								 <select multiple  name = "sel3" size="7" id="sel3" style="width: 250px;" >
									<?php while($membro = mysql_fetch_array($query)) { ?>
									<option value="<?php echo $membro['CDFUNCIONARIO'] ?>"> <?php echo $membro['NMFUNCIONARIO'] ?></option>
									<?php } ?>
								</select> <!-- &nbsp;&nbsp;&nbsp;<a href="cadastroCargo.php"><i class='icon-plus'></i></a> -->
						
						</td>
                        <td>
						<input type="button" value=">>" onclick="insertSelected(getElementById('sel3'), getElementById('membro'));" /><br />

                        <input type="button" value="<<"   onclick="insertSelected(getElementById('membro'), getElementById('sel3'));" />
						</td>
						<td>
						<label>Membros Participantes  <i class='icon-info-sign' title="Para salvar os dados corretamente, é preciso que todos os membros neste campo estejam selecionados. " ></i></label>
						<select multiple style="width: 250px;" name="membro[]" id="membro"  size="7" required >
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
									<option></option>
									<?php while($membro = mysql_fetch_array($query)) { ?>
									<option value="<?php echo $membro['CDFUNCIONARIO'] ?>"> <?php echo $membro['NMFUNCIONARIO'] ?></option>
									<?php } ?>
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
							$query = mysql_query("SELECT NMFUNCIONARIO, CDFUNCIONARIO FROM funcionario");
						?>
								<label>Membro responsavel pela precificação</label>
								 <select required name = "MembroR" id="MembroR" style="width: 250px;">
									<option selected></option>
									<?php while($membro = mysql_fetch_array($query)) { ?>
									<option value="<?php echo $membro['CDFUNCIONARIO'] ?>"> <?php echo $membro['NMFUNCIONARIO'] ?></option>
									<?php } ?>
								</select> <!-- &nbsp;&nbsp;&nbsp;<a href="cadastroCargo.php"><i class='icon-plus'></i></a> -->
						</div>
							
										
						<div class="span3">
						<?php	
							include '../conexao.php';
							
							//mudar select para filtrar setor de Marketing
							$query = mysql_query("SELECT NMFUNCIONARIO, CDFUNCIONARIO FROM funcionario");
						?>
								<label>Gerente comercial responsável</label>
								 <select required name = "GerenteC" id="GerenteC" style="width: 250px;">
									<option selected></option>
									<?php while($membro = mysql_fetch_array($query)) { ?>
									<option value="<?php echo $membro['CDFUNCIONARIO'] ?>"> <?php echo $membro['NMFUNCIONARIO'] ?></option>
									<?php } ?>
								</select> <!-- &nbsp;&nbsp;&nbsp;<a href="cadastroCargo.php"><i class='icon-plus'></i></a> -->
						</div>
					</div> <br>
					
	<div class="row-fluid">
	<div class="span5">
	 Houve atraso? &nbsp;&nbsp;
     Sim &nbsp;
    <input id="opt-pf" value = "sim" type="radio" name="Atraso" onclick="tipoPessoaSel();"  />&nbsp;&nbsp;&nbsp;&nbsp;Não &nbsp;
    <input id="opt-pj" value = "nao" CHECKED  type="radio" name="Atraso" onclick="tipoPessoaSel();"  />
  </div>
  </div>  
  <div class="row-fluid" id="pf" style="display:none">
    <div class="span2">
      <label for="cpf" >Número de dias</label>
	  <!-- Ajustar validação -->
	  <input type = "text" id="numDias" name = "txtQTDdias" onBlur="somenteNumerosDias(CadastroProjeto.numDias);" maxlength="7" class = "span10" />
	  <div id="msg17" class = "msg"></div>
	 <div id="pj">
	 </div>
    </div> <p>
    </div> <p>
	
	<div class="row-fluid">
	
	<div class="span5">
	 Cliente do projeto: &nbsp;&nbsp;
     Pessoa Física &nbsp;
	 <input id="opt2-pf"  type="radio" value = "pessoaFisica" name="TipoPessoa" onclick="tipoPessoa();" required/>&nbsp;&nbsp;&nbsp;&nbsp;Pessoa Jurídica &nbsp;
     <input id="opt2-pj" type="radio" value = "pessoaJuridica" name="TipoPessoa"  onclick="tipoPessoa();" required/>
  	 </div> 
	 </div> 
				<div class="row-fluid">
						<div class="span3" id="pesF" style="display:none" >
						<?php	
							include '../conexao.php';
							$query = mysql_query("SELECT NMCLIENTE, CDCLIENTE FROM cliente");
							$query2 = mysql_query("SELECT NMEMPRESA, CDPESSOAJ FROM pessoaj");
						?>
								
								 <select  name = "clienteF" id="clienteF" style="width: 250px;" >
									<option selected></option>
									<?php while($cliente = mysql_fetch_array($query)) { ?>
									<option value="<?php echo $cliente['CDCLIENTE'] ?>"> <?php echo $cliente['NMCLIENTE'] ?></option>
									<?php } ?>
								</select> <!-- &nbsp;&nbsp;&nbsp;<a href="cadastroCargo.php"><i class='icon-plus'></i></a> -->
					</div>
					</div>
					
					<div class="row-fluid">
					<div class="span3" id="pesJ" style="display:none" >
						
								 <select name = "clienteJ" id="clienteJ" style="width: 250px;" >
									<option selected></option>
									<?php while($pessoaj = mysql_fetch_array($query2)) { ?>
									<option value="<?php echo $pessoaj['CDPESSOAJ'] ?>"> <?php echo $pessoaj['NMEMPRESA'] ?></option>
									<?php } ?>
								</select>
						
						</div>
					</div> 
				
				<br>
				
				
				<legend>Informações Adicionais</legend>
						<div class="row-fluid">
								<div class="span3">
								<label>Data de Assinatura do Contrato</label>
								<input type = "text" name = "txtDtAssContrato" class = "span11" id="dataAss"  maxlength="10" onBlur="VerificaDataAss(CadastroProjeto.dataAss)" placeholder = "00/00/0000" onKeyPress="formata_data(CadastroProjeto.dataAss)" > <!-- onKeyPress="MascaraData(CadastroFuncionario.data);" onKeyPress= "ValidaData(CadastroFuncionario.data);-->
						       <div id="msg15" class = "msg"></div> 
						</div>
							 <div class="span3">
								<label>Status do Projeto</label>
									<select  name="txtStatusProj"  style="width: 250px;" required>
									<option selected value="Não Iniciado">Não Iniciado</option>
									<option value="Em Andamento">Em andamento</option>
									<option value="Concluido">Concluido</option>
									</select>
	                   </div>					
						</div> <p>
					
					
	<div class="row-fluid">
	<div class="span5">
	 Houve contra proposta? &nbsp;&nbsp;
     Sim &nbsp;
	 <input id="ContraSim" value = "Sim"  type="radio" name="ContraProposta"  />&nbsp;&nbsp;&nbsp;&nbsp;Não &nbsp;
     <input id="ContraNao" value = "Não" type="radio" name="ContraProposta"  checked />
  	 </div> 
	</div> <p>
	
	<div class="row-fluid">
	<div class="span3">
								<label>Forma de Pagamento</label>
									<select required name="txtFormaPag"  style="width: 250px;" >
									<option selected></option>
									<option value="Dinheiro">Dinheiro</option>
									<option value="Transferencia Bancaria">Transferencia Bancaria</option>
									<option value="Crédito">Crédito</option>
									<option value="Débito">Débito</option>
									<option value="Boleto">Boleto</option>
									</select>
									
     </div>	
	 </div>
	 <p>
	 
	 <div class="row-fluid">
	<div class="span3">
	<label>Número de Visitas Técnicas</label>
	<input type = "text" name = "NumVisitas" onBlur="somenteNumerosVisitas(CadastroProjeto.numVisitas);"  maxlength="10" id="numVisitas" class = "span11" required/>
	<div id="msg18" class = "msg"></div>
	</div>
	</div>
	 <div class="row-fluid">
	<div class="span3">
	<label>Data e descrição Visitas Técnicas <i class='icon-info-sign' title="Para verificar as informações coletadas nas visitas de forma mais completa, deve-se procurar os documentos padrões de visitas técnicas." ></i></label>

	<textarea required rows="3" name = "txtVisitas" class = "input-xxlarge" placeholder = "Digite aqui as datas e uma breve descrição das Visitas Técnicas...  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp; 00/00/0000 - Descrição da Visita" id = "Obs" maxlength = "200"></textarea>
							
	</div>  
    </div> 	   
    <br>	

<!-- CAMPOS ENDEREÇO ------------------>
				<legend>Endereço</legend>
				<div class="row-fluid">
					<div class="span6">
						<label>Código Postal</label>
						<input type = "text" id = "cep" name ="txtCep" onkeypress= "MascaraCep(CadastroProjeto.cep);" maxlength="10" placeholder = "00000-000"required/>&nbsp;&nbsp;&nbsp;<a href =http://www.buscacep.correios.com.br/sistemas/buscacep/ target="_blank">Não sei meu CEP</a>
					 <div id="msg5" class = "msg"></div>
					</div>
				</div><p>
				<!-- FIM LINHA 1 -->
				
				<div class="row-fluid">
					<div class="span12">
						<label>Logradouro</label>
						<input type = "text" name = "txtRua" id="rua" class = "input-xxlarge" required/>
					</div>
                </div><p> 
				<!-- FIM LINHA 2 -->
		  
				
				<div class="row-fluid">
					<div class="span2">
						<label>Número</label>
						<input type = "text" name = "txtNumero" onBlur="somenteNumeros(CadastroProjeto.num);" maxlength="7" id="num" class = "span10" required/>
					   <div id="msg10" class = "msg"></div>
					</div>
					<div class="span5">
						<label>Complemento</label>
						<input type = "text" name = "txtComplemento" class = "span9" id="comp">
					</div><!--/span-->
				</div><p><!--/row-->
				<!-- FIM LINHA 3 -->				
         

				<!-- Linha 4 -->
						<div class="row-fluid">
						<div class="span2">
								<label>Bairro</label>
								<input type = "text" name = "txtBairro" id="bairro" class = "span10"/required>
						</div><!-- /Campo 1 -->
						<div class="span2">
								<label>Cidade</label>
								<input type = "text" name = "txtCidade" id="cidade" class = "span10"/required>
						</div><!-- /Campo 2 -->
						<div class="span2">
								<label>Estado</label>
									<select required name="txtEstado" id="uf" style="width: 70px;" /required>
									<option selected></option>
									<option value="AC">AC</option>
									<option value="AL">AL</option>
									<option value="AM">AM</option>
									<option value="AP">AP</option>
									<option value="BA">BA</option>		
									<option value="CE">CE</option>
									<option value="DF">DF</option>
									<option value="ES">ES</option>
									<option value="GO">GO</option>
									<option value="MA">MA</option>
									<option value="MG">MG</option>
									<option value="MS">MS</option>
									<option value="MT">MT</option>
									<option value="PA">PA</option>
									<option value="PB">PB</option>
									<option value="PE">PE</option>
									<option value="PI">PI</option>
									<option value="PR">PR</option>	
									<option value="RJ">RJ</option>
									<option value="RN">RN</option>
									<option value="RS">RS</option>	
									<option value="RO">RO</option>
									<option value="RR">RR</option>
									<option value="SC">SC</option>
									<option value="SE">SE</option>
									<option value="SP">SP</option>
									<option value="TO">TO</option>
								</select>
						</div><!-- /Campo 2 -->
						</div><br> <!--FIM DA LINHA 4-->

						
					
										
					<legend>Observações</legend>
							<div class="row-fluid">
						<div class="row-fluid">
							<div class="span3">
								<textarea rows="3" name = "txtObs" class = "input-xxlarge" placeholder = "Digite aqui qualquer observação a ser feita..." id = "Obs" maxlength = "200"></textarea>
							</div>
						</div><br>
						</div>
						
							<br> <br>	 
					
					<!-- BOTÕES -->
							<input type="submit" value="Cadastrar" name="btnCadastrar" class = "btn " >
							<input type="reset" value="Limpar" name="btnLimpar"  class = "btn btn-danger">
            
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
