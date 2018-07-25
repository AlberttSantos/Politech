<!DOCTYPE html>

<html>
	<head>
		<title>Politech - Membros</title>
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
    <script type="text/javascript" >

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

    </script>
		
		
	</head>
	
	

<body>
	
			<!-- FECHA CABEÇALHO -->
		</div>
	</div>
	 
	<div class = "areaCadastro">
			
		<!-- SUBCABECALHO DA PAGINA -->
			<div class = areaH1>
				<div class = "h1">Editando dados dos Membros</div>
				<div class = "h2">Nessa sessão é possível editar os dados dos Membros</div>
			</div>
		<!-- ---------------------- -->
			
		<!-- FORMULARIO DE CADASTRO -->
		<div class = "conteudo">
			<form method = "post" action = "editarFunc2.php" name="CadastroFuncionario" class = "form-horizontal">
				<div class="container-fluid">
		  <br/> 
		  			<!-- AREA DADOS PESSOAIS ------------------------------------->	
					<legend>Dados Pessoais</legend>
					
					<?php
						include "../conexao.php"; // incluindo o arquivo que faz a conexao com o banco
	
						$cdFunc = $_GET['cdFunc']; // Recebendo o valor enviado pelo link

						$busca = mysql_query("SELECT * FROM funcionario WHERE CDFUNCIONARIO = $cdFunc"); 
						$row = mysql_fetch_array($busca);
						
					?>
					
					<!-- Linha 1 -->
						<div class="row-fluid">
							<div class="span10">
								<label>Nome do Membro</label>
								<input type = "text" name = "txtNome" class="input-xxlarge" value="<?php echo $row[1]; ?>" required/>
								<input type="hidden" value="<?php echo $cdFunc; ?>" name="cdFunc" />
							</div><!-- /Campo 1 -->
						</div><p><!-- fim da Linha 1 -->
						
						<!-- Linha 2 -->
						<div class="row-fluid">
							<div class="span3">
								
								<label>E-mail</label>
									<input type = "text" name = "txtEmail" id="inputIcon" value="<?php echo $row[2]; ?>" class = "input-xxlarge" placeholder = "example@dominio.com.br" onBlur = "verificaEmail()" required/>
									<div id="msg" class = "msg"></div> 
								
							</div><!-- /Campo 1 -->
						</div><p>
						<!-- fim da Linha 2 -->
						
					<!-- Linha 3 -->
						<div class="row-fluid">
						<div class="span2">
								<label>CPF</label>
								<input type = "text" name = "txtCPF" onBlur="ValidarCPF(CadastroFuncionario.cpf);" onKeyPress="MascaraCPF(CadastroFuncionario.cpf);" maxlength="14" class="span11" placeholder = "000.000.000-00" id = "cpf" value="<?php echo $row[3]; ?>" required/>
								<div id="msg4" class = "msg"></div> 
						</div><!-- /Campo 1 -->
						<div class="span2">
								<label>Data de Nascimento</label>
								<input type = "text" name = "txtDtNasc" value="<?php echo $row[4]; ?>" class = "span11" id="data"  maxlength="10" onBlur="VerificaDataNasc(CadastroFuncionario.data)" placeholder = "00/00/0000" onKeyPress="formata_data(CadastroFuncionario.data)" > <!-- onKeyPress="MascaraData(CadastroFuncionario.data);" onKeyPress= "ValidaData(CadastroFuncionario.data);-->
						        <div id="msg11" class = "msg"></div> 
								</div><!-- /Campo 2 -->
						<div class="span2">
								<label>Sexo</label>
								<select name = "cbSexo" style = "width: 142px;">
											<option value = "M" <?php if($row[5] == 'M') echo 'selected="selected"'; ?>>Masculino</option>
											<option value = "F" <?php if($row[5] == 'F') echo 'selected="selected"'; ?>>Feminino</option>
								</select>
						</div><!-- /Campo 2 -->
						</div><br> <!--FIM DA LINHA 2-->
					
					<div class="row-fluid">
					<div class="row-fluid">
							<div class="span3">
								<label>Como conheceu a Politech?</label>
								<textarea rows="2" name = "txtCDesc" class = "input-xxlarge" id = "CDesc" maxlength = "100"><?php echo $row[25]; ?></textarea>
							</div>
						</div><br>
						</div>
						<!--FIM DA LINHA 3 -->
				
				<!-- FIM AREA DADOS PESSOAIS -->
				<legend>Informações Adicionais</legend>
					
					<!-- Linha 1 -->
						<!-- Linha 1 -->
					
						<div class="row-fluid">
						<!-- /Campo 1 -->
						<div class="span2">
								<label>Data de Admissão</label>
								<input type = "text" name = "txtAdm" maxlength="10" value="<?php echo $row[6]; ?>"  placeholder = "00/00/0000" id="dataAdm" onBlur="VerificaDataAdm(CadastroFuncionario.dataAdm)"  onKeyPress="formata_data(CadastroFuncionario.dataAdm)" class="span11"required/>
						        <div id="msg12" class = "msg"></div> 
								
						</div><!-- /Campo 2 -->
							<div class="span2">
								<label>Data de Desligamento</label>
								<input type = "text" name = "txtDesligamento" maxlength="10" value="<?php echo $row[7]; ?>" placeholder = "00/00/0000" id="dataD" onBlur="VerificaDataD(CadastroFuncionario.dataD)" onKeyPress="formata_data(CadastroFuncionario.dataD)" class="span11" >
						        <div id="msg13" class = "msg"></div>
								
						</div>
						<div class="span2">
						<label>Período</label>
						<select required name="txtPeriodo" id="periodo" style="width: 130px;" >
									
									<option value="1" <?php if($row[8] == '1') echo 'selected="selected"'; ?>>1</option>
									<option value="2" <?php if($row[8] == '2') echo 'selected="selected"'; ?>>2</option>
									<option value="3" <?php if($row[8] == '3') echo 'selected="selected"'; ?>>3</option>
									<option value="4" <?php if($row[8] == '4') echo 'selected="selected"'; ?>>4</option>
									<option value="5" <?php if($row[8] == '5') echo 'selected="selected"'; ?>>5</option>		
									<option value="6" <?php if($row[8] == '6') echo 'selected="selected"'; ?>>6</option>
									<option value="7" <?php if($row[8] == '7') echo 'selected="selected"'; ?>>7</option>
									<option value="8" <?php if($row[8] == '8') echo 'selected="selected"'; ?>>8</option>
									<option value="9" <?php if($row[8] == '9') echo 'selected="selected"'; ?>>9</option>
									<option value="10" <?php if($row[8] == '10') echo 'selected="selected"'; ?>>10</option>
						</select>
						</div>
						</div>	<p>	
						
						<div class="row-fluid">
						<!-- /Campo 1 -->
							<div class="span3">
						<label>Curso</label>
						<select required name="txtCurso" id="curso" style="width: 250px;" >
									
									<option value="Arquitetura e Urbanismo" <?php if($row[9] == 'Arquitetura e Urbanismo') echo 'selected="selected"'; ?> >Arquitetura e Urbanismo</option>
									<option value="Engenharia Ambiental e Sanitária" <?php if($row[9] == 'Engenharia Ambiental e Sanitária') echo 'selected="selected"'; ?>>Engenharia Ambiental e Sanitária</option>
									<option value="Engenharia Civil" <?php if($row[9] == 'Engenharia Civil') echo 'selected="selected"'; ?>>Engenharia Civil</option>
									<option value="Engenharia Elétrica" <?php if($row[9] == 'Engenharia Elétrica') echo 'selected="selected"'; ?>>Engenharia Elétrica</option>
									<option value="Engenharia Mecânica" <?php if($row[9] == 'Engenharia Mecânica') echo 'selected="selected"'; ?>>Engenharia Mecânica</option>		
									<option value="Engenharia Metalúrgica" <?php if($row[9] == 'Engenharia Metalúrgica') echo 'selected="selected"'; ?>>Engenharia Metalúrgica</option>
									<option value="Engenharia de Produção" <?php if($row[9] == 'Engenharia de Produção') echo 'selected="selected"'; ?>>Engenharia de Produção</option>
									<option value="Engenharia Química" <?php if($row[9] == 'Engenharia Química') echo 'selected="selected"'; ?>>Engenharia Química</option>
									<option value="Sistemas de Informação" <?php if($row[9] == 'Sistemas de Informação') echo 'selected="selected"'; ?>>Sistemas de Informação</option>
									<option value="Tecnologia de Soldagem" <?php if($row[9] == 'Tecnologia de Soldagem') echo 'selected="selected"'; ?>>Tecnologia de Soldagem</option>
						</select>
					    </div>
						
						<!-- /Campo 2 -->
						<div class="span2">
						<?php	
							include '../conexao.php';
							$query = mysql_query("SELECT CDCARGO, NMCARGO, DESCRICAO FROM cargo");
							$query2 = mysql_query ("SELECT * FROM cargo C, funcionario F where C.CDCARGO = F.CDCARGO AND C.CDCARGO = $row[10]");
							$linha = mysql_fetch_array($query2);
						?>
								<label>Cargo do Funcionário</label>
								 <select required name = "cb" style="width: 230px;">
								     <!-- Deixar selecionado o cargo que foi cadastrado -->
								     <option value="<?php echo $row[10]?>" <?php if($row[10] == $linha[0]) echo 'selected="selected"'; ?>> <?php echo $linha[1];?> </option>
								     				
									<!-- While para carregar o resto dos cargos disponivies e if pra não exibir o cargo que já está selecionado-->
									<?php while($cargo = mysql_fetch_array($query)) { if ($cargo['CDCARGO'] != $linha[0]){?>
									<option value="<?php echo $cargo['CDCARGO']  ?>"><?php echo $cargo['NMCARGO'] ?></option>
									<?php } }?>
								</select>
						</div><!-- /Campo 2 -->
						</div><br> <!--FIM DA LINHA 2-->
				
				
				
				<!-- CAMPOS ENDEREÇO ------------------>
				<legend>Endereço</legend>
				<div class="row-fluid">
					<div class="span6">
						<label>Código Postal</label>
						<input type = "text" value="<?php echo $row[13]; ?>" id = "cep" name = "txtCep" onKeyPress="MascaraCep(CadastroFuncionario.cep);" maxlength="10"  placeholder = "00000-000"required/>&nbsp;&nbsp;&nbsp;<a href = http://www.buscacep.correios.com.br/servicos/dnec/menuAction.do?Metodo=menuLogradouro>Não sei meu CEP</a>
						<div id="msg5" class = "msg"></div>
					</div>
				</div><p>
				<!-- FIM LINHA 1 -->
				
				<div class="row-fluid">
					<div class="span12">
						<label>Logradouro</label>
						<input type = "text" value="<?php echo $row[14]; ?>" name = "txtRua" id="rua" class = "input-xxlarge" required/>
					</div>
                </div><p> 
				<!-- FIM LINHA 2 -->
		  
				<div class="row-fluid">
					<div class="span2">
						<label>Número</label>
						<input type = "text" value="<?php echo $row[15]; ?>" name = "txtNumero" onBlur="somenteNumeros(CadastroFuncionario.num);" maxlength="7" id="num" class = "span10" required/>
					    <div id="msg10" class = "msg"></div>
					</div>
					<div class="span5">
						<label>Complemento</label>
						<input type = "text" value="<?php echo $row[16]; ?>" name = "txtComplemento" class = "span9" id="comp">
					</div><!--/span-->
				</div><p><!--/row-->
				<!-- FIM LINHA 3 -->				
         

				<!-- Linha 4 -->
						<div class="row-fluid">
						<div class="span2">
								<label>Bairro</label>
								<input type = "text" value="<?php echo $row[17]; ?>" name = "txtBairro" id="bairro" class = "span10"/required>
						</div><!-- /Campo 1 -->
						<div class="span2">
								<label>Cidade</label>
								<input type = "text" value="<?php echo $row[18]; ?>" name = "txtCidade" id="cidade" class = "span10"/required>
						</div><!-- /Campo 2 -->
					<div class="span2">
								<label>Estado</label>
									<select name="txtEstado" id="uf"  style="width: 70px;" /required>
									<option value="AC" <?php if($row[19] == 'AC') echo 'selected="selected"'; ?>>AC</option>
									<option value="AL" <?php if($row[19] == 'AL') echo 'selected="selected"'; ?>>AL</option>
									<option value="AM" <?php if($row[19] == 'AM') echo 'selected="selected"'; ?>>AM</option>
									<option value="AP" <?php if($row[19] == 'AP') echo 'selected="selected"'; ?>>AP</option>
									<option value="BA" <?php if($row[19] == 'BA') echo 'selected="selected"'; ?>>BA</option>		
									<option value="CE" <?php if($row[19] == 'CE') echo 'selected="selected"'; ?>>CE</option>
									<option value="DF" <?php if($row[19] == 'DF') echo 'selected="selected"'; ?>>DF</option>
									<option value="ES" <?php if($row[19] == 'ES') echo 'selected="selected"'; ?>>ES</option>
									<option value="GO" <?php if($row[19] == 'GO') echo 'selected="selected"'; ?>>GO</option>
									<option value="MA" <?php if($row[19] == 'MA') echo 'selected="selected"'; ?>>MA</option>
									<option value="MG" <?php if($row[19] == 'MG') echo 'selected="selected"'; ?>>MG</option>
									<option value="MS" <?php if($row[19] == 'MS') echo 'selected="selected"'; ?>>MS</option>
									<option value="MT" <?php if($row[19] == 'MT') echo 'selected="selected"'; ?>>MT</option>
									<option value="PA" <?php if($row[19] == 'PA') echo 'selected="selected"'; ?>>PA</option>
									<option value="PB" <?php if($row[19] == 'PB') echo 'selected="selected"'; ?>>PB</option>
									<option value="PE" <?php if($row[19] == 'PE') echo 'selected="selected"'; ?>>PE</option>
									<option value="PI" <?php if($row[19] == 'PI') echo 'selected="selected"'; ?>>PI</option>
									<option value="PR" <?php if($row[19] == 'PR') echo 'selected="selected"'; ?>>PR</option>	
									<option value="RJ" <?php if($row[19] == 'RJ') echo 'selected="selected"'; ?>>RJ</option>
									<option value="RN" <?php if($row[19] == 'RN') echo 'selected="selected"'; ?>>RN</option>
									<option value="RS" <?php if($row[19] == 'RS') echo 'selected="selected"'; ?>>RS</option>	
									<option value="RO" <?php if($row[19] == 'RO') echo 'selected="selected"'; ?>>RO</option>
									<option value="RR" <?php if($row[19] == 'RR') echo 'selected="selected"'; ?>>RR</option>
									<option value="SC" <?php if($row[19] == 'SC') echo 'selected="selected"'; ?>>SC</option>
									<option value="SE" <?php if($row[19] == 'SE') echo 'selected="selected"'; ?>>SE</option>
									<option value="SP" <?php if($row[19] == 'SP') echo 'selected="selected"'; ?>>SP</option>
									<option value="TO" <?php if($row[19] == 'TO') echo 'selected="selected"'; ?>>TO</option>
								</select>
						</div><!-- /Campo 2 -->
						</div><br> <!--FIM DA LINHA 4-->

						<!-- CONTATO ------------------>
						<legend>Contato</legend>
							<div class="row-fluid">
								<div class="span3">
									<label>Telefone</label>
									<input type = "text" value="<?php echo $row[11]; ?>" name = "txtTelefone" id = "tel" onBlur="ValidaTelefone(CadastroFuncionario.tel);" onKeyPress="MascaraTelefone(CadastroFuncionario.tel);" maxlength = "14" class = "span11" placeholder = "(00)00000-000" id="campoTelefone">
									<div id="msg6" class = "msg"></div>
								</div>
								<div class="span3">
									<label>Celular</label>
										<input type = "text" value="<?php echo $row[12]; ?>" name = "txtCelular" id = "cel" onBlur="ValidaCelular(CadastroFuncionario.cel);" onKeyPress="MascaraTelefone(CadastroFuncionario.cel);" maxlength = "14" class = "span11" placeholder = "(00)00000-000" id="campoTelefone">
										<div id="msg7" class = "msg"></div>
								</div>
							</div> <br>
							
						<!-- FIM CONTATO -->
						<!-- CURRICULO ------------------>
					
					<legend>Currículo</legend>
					 <div class="row-fluid">
						<div class="span5">
						<label>Facebook</label>
						<input type = "text" name = "txtFace" value="<?php echo $row[21]; ?>" class = "input-xxlarge" id = "Face">
						</div>
					</div> <p>
					 <div class="row-fluid">
						<div class="span10">
						<label>Lattes</label>
						<input type = "text" name = "txtLattes" value="<?php echo $row[22]; ?>" class = "input-xxlarge"  id = "Lattes" />&nbsp;&nbsp;&nbsp;<a href =http://plsql1.cnpq.br/curriculoweb/pkg_cv_estr.inicio target="_blank">Não tenho Lattes</a>
					
						</div>
					</div> <p>
					 <div class="row-fluid">
						<div class="span10"> 
						<label>Linkedin</label>
						<input type = "text" name = "txtLink" value="<?php echo $row[23]; ?>" class = "input-xxlarge" id = "Link"  />&nbsp;&nbsp;&nbsp;<a href =https://www.linkedin.com/start/join?trk=hb_join target="_blank">Não tenho Linkedin</a>

						</div>
					</div> <br>
					<!-- FIM CURRICULO -->
					
					<legend>Observações</legend>
							<div class="row-fluid">
						<div class="row-fluid">
							<div class="span3">
								<textarea rows="3" name = "txtObs" class = "input-xxlarge" id = "Obs" maxlength = "200"><?php echo $row[24]; ?></textarea>
							</div>
						</div><br>
						</div>
						
						<br><br>

						<!-- BOTÕES -->
							<input type="submit" value="Salvar alterações" name="btnSalvar" class = "btn " >
							
							<input type="button" value="Cancelar" name="btnVoltar" class = "btn btn-danger" onclick="location.href = 'listarFunc.php'">
            
      </div><!--/row-->
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