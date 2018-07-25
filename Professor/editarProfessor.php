<!DOCTYPE html>
<html>
	<head>
		<title>Politech - Cadastro</title>
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
		
		<!-- Para funcionar a busca automatica do CEP -->
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
	
	<?php
		include "../conexao.php"; // incluindo o arquivo que faz a conexao com o banco
	
		$cdProfessor = $_GET['cdProfessor']; // Recebendo o valor enviado pelo link

		$busca = mysql_query("SELECT * FROM professor WHERE CdProf = $cdProfessor"); 
		$row = mysql_fetch_array($busca);
		
		$busca2 = mysql_query("SELECT NmCurso FROM professor_curso WHERE professor_curso.CdProf = $cdProfessor"); 
		$curso = mysql_fetch_array($busca2);
						
	?>
	
	<div class = "areaCadastro">
			
		<!-- SUBCABECALHO DA PAGINA -->
			<div class = areaH1>
				<div class = "h1">Cadastro de Professor Orientador</div>
			<div class = "h2">Nessa sessão é possível cadastrar Professor Orientador</div>
			</div>
		<!-- ---------------------- -->
			
		<!-- FORMULARIO DE CADASTRO DE PROFESSOR -->
		    	  <br/>  
		<div class = "conteudo">
		
			<form method = "post" action = "editarProfessor2.php" name="EditarProfessor" class = "form-horizontal" id="form1">
				<div class="container-fluid">
				
				<input type="hidden" value="<?php echo $cdProfessor; ?>" name="cdProfessor" />
	
		  		<!-- AREA DADOS PESSOAIS ------------------------------------->	
					
				<legend>Dados Pessoais</legend>
					
					<!-- LINHA 1 -->
						<div class="row-fluid">
							<div class="span10">
								<label>Nome</label>
								<input type = "text" name = "txtNome" class="input-xxlarge" value="<?php echo $row[1]; ?>" required/>
								<input type="hidden" value="<?php echo $cdProfessor; ?>" name="cdCliente" />
							</div>
						</div><p>
						<!-- FIM DA LINHA -->
						<!-- LINHA 2 -->
						<div class="row-fluid">
						<div class="span3">
								
								<label>E-mail</label>
									<input type = "text" name = "txtEmail" id="inputIcon" class = "input-xxlarge" placeholder = "example@dominio.com.br" onBlur = "verificaEmailPF()" value="<?php echo $row[2]; ?>"  required/>
									<div id="msg" class = "msg"></div> 
								
							</div> </div><p>
						<!-- FIM DA LINHA 2 -->
						<!-- LINHA 3 -->
						<div class="row-fluid">
						<div class="row-fluid">
							<!-- /Campo 1 -->
							<div class="span3">
								<label>Data de Nascimento</label>
								<input type = "text" name = "txtDtNasc" class = "span11" id="data"  maxlength="10" onBlur="VerificaDataNasc(CadastroProfessor.data)" placeholder = "00/00/0000" onKeyPress="formata_data(CadastroProfessor.data)" value="<?php echo $row[3]; ?>" > <!-- onKeyPress="MascaraData(CadastroProfessor.data);" onKeyPress= "ValidaData(CadastroProfessor.data);-->
								<div id="msg7" class = "msg"></div> 
							</div>
							<!-- /Campo 2 -->
							<div class="span3">
								<label>Sexo</label>
								<select required name = "cbSexo" style = "width: 142px;" >
									<option selected></option>
									<option value = "M" <?php if($row[4] == 'M') echo 'selected="selected"'; ?>>Masculino</option>
									<option value = "F" <?php if($row[4] == 'F') echo 'selected="selected"'; ?>>Feminino</option>
								</select>
						</div>
						</div>
						<!-- FIM DA LINHA 3 -->
						
						
						<!-- Checkbox -->
						<div class="row-fluid">
						<div class="row-fluid">
							<div class="span6">
								<label>Selecione os cursos que pode auxiliar:</label>
								<table>
									<tr>
										<td><input type="checkbox" name="curso[]" <?php if($curso[0] == 'Arquitetura e Urbanismo') echo 'selected="selected"';?> value="Arquitetura"> Arquitetura e Urbanismo</td>
										<td><input type="checkbox" name="curso[]" value="Ambiental"> Engenharia Ambiental e Sanitária</td>
									</tr><tr>	
										<td><input type="checkbox" name="curso[]" value="Civil"> Engenharia Civil</td>
										<td><input type="checkbox" name="curso[]" value="Elétrica"> Engenharia Elétrica</td>	
									</tr><tr>
										<td><input type="checkbox" name="curso[]" value="Mecânica"> Engenharia Mecânica</td>
										<td><input type="checkbox" name="curso[]" value="Metalúrgica"> Engenharia Metalúrgica</td>
									</tr><tr>
										<td><input type="checkbox" name="curso[]" value="Produção"> Engenharia de Produção</td>
										<td><input type="checkbox" name="curso[]" value="Química"> Engenharia Química</td>
									</tr><tr>
										<td><input type="checkbox" name="curso[]" value="Sistemas"> Sistemas de Informação</td>
										<td><input type="checkbox" name="curso[]" value="Tecnologia"> Tecnologia de Soldagem</td>
									</tr>
								</table>
							</div>
						</div><br>
						</div>
						
				<!-- AREA INFORMAÇÕES PESSOAIS ------------------------------------->	
						
					<legend>Informações Adicionais</legend>
					
					<!-- LINHA  1 -->
						<div class="row-fluid">
						<div class="row-fluid">
							<div class="span3">
								<label>Formação Acadêmica</label>
								<textarea rows="3" name = "txtAcad" class = "input-xxlarge" placeholder = "Digite aqui sua formação acadêmica..." id = "CDisc" maxlength = "400"><?php echo $row[5]; ?></textarea>
							</div>
						</div><br>
						</div>
					<!-- FIM DA LINHA 1 -->
						
					<!-- LINHA 2 -->
						<div class="row-fluid">
						<div class="row-fluid">
							<div class="span3">
								<label>Quais disciplinas que leciona?</label>
								<textarea rows="3" name = "txtDisc" class = "input-xxlarge" placeholder = "Digite aqui as matérias que leciona..." id = "CDisc" maxlength = "400"><?php echo $row[6]; ?></textarea>
							</div>
						</div><br>
						</div>
					<!-- FIM DA LINHA 2 -->
					
					<!-- LINHA 3 -->	
						<div class="row-fluid">
						<div class="row-fluid">
							<div class="span3">
								<label>De que forma você pode Orientar?</label>
								<textarea rows="3" name = "txtOrient" class = "input-xxlarge" placeholder = "Digite aqui formas de orientação..." id = "CProf" maxlength = "400"><?php echo $row[7]; ?></textarea>
							</div>
						</div><br>
						</div>
					<!--FIM DA LINHA 3 -->
						
					<!-- LINHA 4 -->	
						<div class="row-fluid">
					<div class="row-fluid">
							<div class="span3">
								<label>Como conheceu a Politech?</label>
								<textarea rows="2" name = "txtCDesc" class = "input-xxlarge" placeholder = "Digite aqui como conheceu a empresa..." id = "CDesc" maxlength = "100"><?php echo $row[8]; ?></textarea>
							</div>
						</div><br>
						</div>
					<!--FIM DA LINHA 4 -->
				
				<!-- CAMPOS ENDEREÇO  ------------------------------------->
				<!-- LINHA 1 -->
				<legend>Endereço</legend>
				<div class="row-fluid">
					<div class="span6">
						<label>Código Postal</label> 
						<input type = "text"  value ="<?php echo $row[9]; ?>" id = "cep" name ="txtCep" onkeypress= "MascaraCep(CadastroProfessor.cep);" maxlength="10" placeholder = "00000-000"required/>&nbsp;&nbsp;&nbsp;<a href =http://www.buscacep.correios.com.br/sistemas/buscacep/ target="_blank">Não sei meu CEP</a>
					<div id="msg5" class = "msg"></div>
					</div>
				</div><p>
				<!-- FIM LINHA 1 -->
				
				<!-- LINHA 2 -->
				<div class="row-fluid">
					<div class="span12">
						<label>Logradouro</label>
						<input type = "text" name = "txtRua" id= "rua" class = "input-xxlarge" value="<?php echo $row[10]; ?>" required/>
					</div>
                </div><p> 
				<!-- FIM LINHA 2 -->
				
				<!-- LINHA 3 -->
				<div class="row-fluid">
					<!-- Campo 1 -->
					<div class="span2">
						<label>Número</label>
						<input type = "text" name = "txtNumero" onBlur="somenteNumeros(CadastroProfessor.num);" maxlength="7" id="num" class = "span10" value="<?php echo $row[11]; ?>" required/>
					    <div id="msg10" class = "msg"></div>
					</div>
					<!-- Campo 2 -->
					<div class="span5">
						<label>Complemento</label>
						<input type = "text" name = "txtComplemento" class = "span9" id="comp" value="<?php echo $row[12]; ?>">
					</div><!--/span-->
				</div><p><!--/row-->
				<!-- FIM LINHA 3 -->				
       
				<!-- LINHA 4 -->
						<div class="row-fluid">
						<!-- Campo 1 -->
						<div class="span2">
								<label>Bairro</label>
								<input type = "text" name = "txtBairro" id="bairro" value="<?php echo $row[13]; ?>" class = "span10"/required>
						</div>
						<!-- Campo 2 -->
						<div class="span2">
								<label>Cidade</label>
								<input type = "text" name = "txtCidade" id="cidade" value="<?php echo $row[14]; ?>" class = "span10"/required>
						</div>
						<!-- Campo 3 -->
						<div class="span2">
								<label>Estado</label>
								<select name="txtEstado" id="uf"  style="width: 70px;" /required>
									<option value="AC" <?php if($row[15] == 'AC') echo 'selected="selected"'; ?>>AC</option>
									<option value="AL" <?php if($row[15] == 'AL') echo 'selected="selected"'; ?>>AL</option>
									<option value="AM" <?php if($row[15] == 'AM') echo 'selected="selected"'; ?>>AM</option>
									<option value="AP" <?php if($row[15] == 'AP') echo 'selected="selected"'; ?>>AP</option>
									<option value="BA" <?php if($row[15] == 'BA') echo 'selected="selected"'; ?>>BA</option>		
									<option value="CE" <?php if($row[15] == 'CE') echo 'selected="selected"'; ?>>CE</option>
									<option value="DF" <?php if($row[15] == 'DF') echo 'selected="selected"'; ?>>DF</option>
									<option value="ES" <?php if($row[15] == 'ES') echo 'selected="selected"'; ?>>ES</option>
									<option value="GO" <?php if($row[15] == 'GO') echo 'selected="selected"'; ?>>GO</option>
									<option value="MA" <?php if($row[15] == 'MA') echo 'selected="selected"'; ?>>MA</option>
									<option value="MG" <?php if($row[15] == 'MG') echo 'selected="selected"'; ?>>MG</option>
									<option value="MS" <?php if($row[15] == 'MS') echo 'selected="selected"'; ?>>MS</option>
									<option value="MT" <?php if($row[15] == 'MT') echo 'selected="selected"'; ?>>MT</option>
									<option value="PA" <?php if($row[15] == 'PA') echo 'selected="selected"'; ?>>PA</option>
									<option value="PB" <?php if($row[15] == 'PB') echo 'selected="selected"'; ?>>PB</option>
									<option value="PE" <?php if($row[15] == 'PE') echo 'selected="selected"'; ?>>PE</option>
									<option value="PI" <?php if($row[15] == 'PI') echo 'selected="selected"'; ?>>PI</option>
									<option value="PR" <?php if($row[15] == 'PR') echo 'selected="selected"'; ?>>PR</option>	
									<option value="RJ" <?php if($row[15] == 'RJ') echo 'selected="selected"'; ?>>RJ</option>
									<option value="RN" <?php if($row[15] == 'RN') echo 'selected="selected"'; ?>>RN</option>
									<option value="RS" <?php if($row[15] == 'RS') echo 'selected="selected"'; ?>>RS</option>	
									<option value="RO" <?php if($row[15] == 'RO') echo 'selected="selected"'; ?>>RO</option>
									<option value="RR" <?php if($row[15] == 'RR') echo 'selected="selected"'; ?>>RR</option>
									<option value="SC" <?php if($row[15] == 'SC') echo 'selected="selected"'; ?>>SC</option>
									<option value="SE" <?php if($row[15] == 'SE') echo 'selected="selected"'; ?>>SE</option>
									<option value="SP" <?php if($row[15] == 'SP') echo 'selected="selected"'; ?>>SP</option>
									<option value="TO" <?php if($row[15] == 'TO') echo 'selected="selected"'; ?>>TO</option>
								</select>
						</div>
						</div><br> <!--FIM DA LINHA 4-->

				<!-- CONTATO ------------------>
					<legend>Contato</legend>
						<div class="row-fluid">
							<!-- Campo 1 -->	
								<div class="span3">
									<label>Telefone</label>
									<input type = "text" name = "txtTelefone" id = "tel" onBlur="ValidaTelefone(CadastroProfessor.tel);" onKeyPress="MascaraTelefone(CadastroProfessor.tel);" maxlength = "14" class = "span11" placeholder = "(00)0000-0000" id="campoTelefone" value="<?php echo $row[16]; ?>" required/>
									<div id="msg6" class = "msg"></div>								
								</div>
							<!-- Campo 2 -->	
								<div class="span3">
									<label>Celular</label>
										<input type = "text" name = "txtCelular" id = "cel" onBlur="ValidaCelular(CadastroProfessor.cel);" onKeyPress="MascaraCelular(CadastroProfessor.cel);" maxlength = "15" class = "span11" placeholder = "(00)00000-0000" id="campoCelular" value="<?php echo $row[17]; ?>" required/>
								     <div id="msg8" class = "msg"></div>
								</div>
							</div><br>
					
				<!-- CURRICULO --------------------------------------------->
					
					<!-- LINHA 1 -->
					<legend>Currículo</legend>
					 <div class="row-fluid">
						<div class="span5">
							<label>Facebook</label>
							<input type = "text" name = "txtFace" placeholder = "Digite aqui o link do seu perfil no Facebook, Ex: www.facebook.com/..." class = "input-xxlarge" id = "Face" value="<?php echo $row[18]; ?>">
						</div>
					</div> <p>
					 <!-- FIM LINHA 1 -->
					 
					 <!-- LINHA 2 -->
					 <div class="row-fluid">
						<div class="span10">
							<label>Lattes</label>
							<input type = "text" name = "txtLattes" class = "input-xxlarge" value="<?php echo $row[19]; ?>" placeholder = "Digite aqui o link do seu currículo no Lattes, Ex: lattes.cnpq.br/..." id = "Lattes"/>&nbsp;&nbsp;&nbsp;<a href =http://plsql1.cnpq.br/curriculoweb/pkg_cv_estr.inicio target="_blank">Não tenho Lattes</a>
						</div>
					</div><p>
					<!-- FIM LINHA 2 -->
					
					<!-- LINHA 3 -->
					 <div class="row-fluid">
						<div class="span10"> 
						<label>Linkedin</label>
						<input type = "text" name = "txtLink" class = "input-xxlarge" value="<?php echo $row[20]; ?>" id = "Link" placeholder = "Digite aqui o link do seu perfil no Linkedin, Ex: www.linkedin.com/..." />&nbsp;&nbsp;&nbsp;<a href =https://www.linkedin.com/start/join?trk=hb_join target="_blank">Não tenho Linkedin</a>
						</div>
					</div> <br> <!-- FIM LINHA 3 -->
					
				<!-- OBSERVAÇÕES --------------------------------------------->
						<legend>Observações</legend>
							<div class="row-fluid">
						<div class="row-fluid">
							<div class="span3">
								<textarea rows="3" name = "txtObs" class = "input-xxlarge" placeholder = "Digite aqui qualquer observação a ser feita..." id = "Obs" maxlength = "200"><?php echo $row[21]; ?></textarea>
							</div>
						</div><br>
						</div>
						<br><br>

						<!-- BOTÕES -->
							<input type="submit" value="Alterar alterações" name="btnCadastrar" class = "btn" >
							<input type="reset" value="Limpar" name="btnLimpar"  class = "btn btn-danger">
            
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