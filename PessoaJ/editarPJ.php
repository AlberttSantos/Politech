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
				<div class = "h1">Editando dados do Cliente</div>
				<div class = "h2">Nessa sessão é possível editar os dados de Pessoa Jurídica</div>
			</div>
		<!-- ---------------------- -->
			</br>
		<!-- FORMULARIO DE CADASTRO DE CLIENTE -->
		<div class = "conteudo">
			<form method = "post" action = "editarPJ2.php" name="CadastroPessoaJ" class = "form-horizontal">
				<div class="container-fluid">
								
		  	<!-- AREA DADOS PESSOAIS ------------------------------------->	
					<legend>Dados da Empresa</legend>
					
					<?php
						include "../conexao.php"; // incluindo o arquivo que faz a conexao com o banco
	
						$cdPessoaJ = $_GET['cdPessoaJ']; // Recebendo o valor enviado pelo link

						$busca = mysql_query("SELECT * FROM pessoaj WHERE CDPESSOAJ = $cdPessoaJ"); 
						$row = mysql_fetch_array($busca);
						
					?>
		  								
					<!-- Linha 1 -->
						<div class="row-fluid">
							<div class="span10">
								<label>Nome da Empresa</label>
								<input type = "text" name = "txtNome" class="input-xxlarge" value="<?php echo $row[1]; ?>" required/>
								<input type="hidden" value="<?php echo $cdPessoaJ; ?>" name="cdPessoaJ" />
							</div><!-- /Campo 1 -->
						</div><p><!-- fim da Linha 1 -->

						<!-- Linha 1 -->
						<div class="row-fluid">
								<div class="span3">
									<label>E-mail da empresa</label>
									<input type = "text" name = "txtEmailE" value="<?php echo $row[17]; ?>" id="inputIcon" class = "input-xxlarge" placeholder = "example@dominio.com.br" onBlur = "verificaEmailPJ()" required/>
									<div id="msg" class = "msg"></div> 
								
							</div>
							<!-- /Campo 1 -->
						</div><p><!-- fim da Linha 1 -->
						
					<!-- Linha 2 -->
						<div class="row-fluid">
						<div class="span2">
								<label>CNPJ</label> <!-- ADICIONAR DENTRO DO INPUT ABAIXO onBlur="ValidarCPF(CadastroFuncionario.cpf);" onKeyPress="MascaraCPF(CadastroFuncionario.cpf);"-->
								<input type = "text" id = "cnpj" value="<?php echo $row[2]; ?>" name = "txtCNPJ"  onBlur="ValidarCNPJ(CadastroPessoaJ.cnpj);"  onkeypress= "MascaraCNPJ(CadastroPessoaJ.cnpj);" maxlength="18" class="span12" placeholder = "00.000.000/0000-00"  required/>
								<div id="msg4" class = "msg"></div> 
						</div>
						<!-- /Campo 1 -->
						<div class="span2">
								<label>Segmento</label>
								<input type = "text" name = "txtSegmento" class = "span12" value="<?php echo $row[4]; ?>" required/>
						</div></br><!-- /Campo 2 -->
						</div><br> <!--FIM DA LINHA 2-->
						<!--LINHA 3-->
						<div class="row-fluid">
							<div class="span3">
								<label>Como conheceu a Politech?</label>
								<textarea rows="2" name = "txtCDesc" class = "input-xxlarge" id = "CDesc" maxlength = "100" ><?php echo $row[5]; ?></textarea>
							</div>
						</div><br>
						<!--FIM DA LINHA 3 -->
						
						
						
				<!-- FIM AREA DADOS PESSOAIS -->
				
				<!-- DADOS DO REPRESENTANTE -->
				<!-- Linha 1 -->
				<legend>Dados do Representante</legend>
						<div class="row-fluid">
							<div class="span10">
								<label>Nome do Representante</label>
								<input type = "text" name = "txtNomeR" class="input-xxlarge" value="<?php echo $row[3]; ?>" required/>
							</div><!-- /Campo 1 -->
						</div><p><!-- fim da Linha 1 -->
						
						<div class="row-fluid">
							
							<div class="span4">
									<label>E-mail do representante</label>
									<input type = "text" name = "txtEmailR" value="<?php echo $row[18]; ?>" id="inputIcon" class = "input-segmento" placeholder = "example@dominio.com.br" onBlur = "verificaEmailPJ()" required/>
									<div id="msg9" class = "msg"></div> 
							</div>
							<!-- /Campo 1 -->
						
						<div class="span2">
								<label>CPF</label>
								<input value="<?php echo $row[19]; ?>" type="text" name="txtCPF" onBlur="ValidarCPF(CadastroPessoaJ.cpf);" onkeypress= "MascaraCPF(CadastroPessoaJ.cpf);"  maxlength="14" class="span11" placeholder = "000.000.000-00" id ="cpf" required/ />
								<div id="msg7" class = "msg"></div> 
						</div>
						</div> <br>
				<!-- FIM DOS DADOS DO REPRESENTANTE -->
				
				<!-- CAMPOS ENDEREÇO ------------------>
				<legend>Endereço</legend>
				<div class="row-fluid">
					<div class="span6">
						<label>Código Postal</label>
						<input type = "text" value="<?php echo $row[9]; ?>" id = "cep" name = "txtCep" onKeyPress="MascaraCep(CadastroPessoaJ.cep);" maxlength="10" placeholder = "00000-000"required/>&nbsp;&nbsp;&nbsp;<a href = http://www.buscacep.correios.com.br/servicos/dnec/menuAction.do?Metodo=menuLogradouro>Não sei meu CEP</a>
						<div id="msg5" class = "msg"></div>
					</div>
				</div><p>
				<!-- FIM LINHA 1 -->
				
				<div class="row-fluid">
					<div class="span12">
						<label>Logradouro</label>
						<input type = "text" name = "txtRua" value="<?php echo $row[10]; ?>" id="rua" class = "input-xxlarge" required/>
					</div>
                </div><p> 
				<!-- FIM LINHA 2 -->
		  
				<div class="row-fluid">
					<div class="span2">
						<label>Número</label>
						<input type = "text" name = "txtNumero" value="<?php echo $row[11]; ?>" onBlur="somenteNumeros(CadastroPessoaJ.num);" maxlength="7" id="num" class = "span10" required/>
					    <div id="msg10" class = "msg"></div>
					</div>
					<div class="span5">
						<label>Complemento</label>
						<input type = "text" name = "txtComplemento" value="<?php echo $row[12]; ?>" class = "span9" id="comp">
					</div><!--/span-->
				</div><p><!--/row-->
				<!-- FIM LINHA 3 -->				
         

				<!-- Linha 4 -->
						<div class="row-fluid">
						<div class="span2">
								<label>Bairro</label>
								<input type = "text" name = "txtBairro" id="bairro" value="<?php echo $row[13]; ?>" class = "span10"/required>
						</div><!-- /Campo 1 -->
						<div class="span2">
								<label>Cidade</label>
								<input type = "text" name = "txtCidade" id="cidade" value="<?php echo $row[14]; ?>" class = "span10"/required>
						</div><!-- /Campo 2 -->
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
						</div><!-- /Campo 2 -->
						</div><br> <!--FIM DA LINHA 4-->

						<!-- CONTATO ------------------>
						<legend>Contato</legend>
							<div class="row-fluid">
								<div class="span3">
									<label>Telefone</label>
									<input type = "text" value="<?php echo $row[7]; ?>" name = "txtTelefone" id = "tel" onBlur="ValidaTelefone(CadastroPessoaJ.tel);" onKeyPress="MascaraTelefone(CadastroPessoaJ.tel);" maxlength = "14" class = "span11" placeholder = "(00)0000-0000" id="campoTelefone" /required>
									<div id="msg6" class = "msg"></div>
								</div>
								<div class="span3">
									<label>Celular</label>
										<input type = "text" value="<?php echo $row[8]; ?>" name = "txtCelular" id = "cel" onBlur="ValidaCelular(CadastroPessoaJ.cel);" onKeyPress="MascaraCelular(CadastroPessoaJ.cel);" maxlength = "15" class = "span11" placeholder = "(00)00000-0000" id="campoCelular" /required>
										<div id="msg7" class = "msg"></div>
								</div>
							</div>
						<!-- FIM LINHA 1 -->
						
						<legend>Observações</legend>
						<div class="row-fluid">
						<div class="row-fluid">
							<div class="span3">
								<textarea rows="3" name = "txtObs" class = "input-xxlarge" id = "Obs" maxlength = "200"><?php echo $row[6]; ?></textarea>
							</div>
						</div><br>
						</div>
						
						<br><br>

						<!-- BOTÕES -->
							<input type="submit" value="Salvar alterações" name="btnCadastrar" class = "btn" >
							<input type="button" value="Cancelar" name="btnVoltar" class = "btn btn-danger" onclick="location.href = 'listaPJ.php'">
            
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