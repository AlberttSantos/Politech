<!DOCTYPE html>
<html>
	<head>
		<title>Politech - Cliente</title>
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
		<script src="../jquery.js" type="text/javascript"></script>
		
		<!-- Para funcionar a busca automatica do CEP -->
	    <script src="//code.jquery.com/jquery-2.2.2.min.js"></script>
		
				<!-- INCLUINDO CAMPOS COMUNS -->
<?php include "../Comuns/comumAdm.inc";?>
<!-- Teste de nivel de usuario -->
<?php if ($nivel >= '3'){ ?>
   
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
	
	 
	<div class = "areaCadastro">
			
		<!-- SUBCABECALHO DA PAGINA -->
			<div class = areaH1>
				<div class = "h1">Cadastro de Cliente</div>
			<div class = "h2">Nessa sessão é possível cadastrar Pessoa Física</div>
			</div>
		<!-- ---------------------- -->
			
		<!-- FORMULARIO DE CADASTRO DE CLIENTE -->
		    	  <br/>  
		<div class = "conteudo">
		
			<form method = "post" action = "salvarCadastro.php" name="CadastroCliente" class = "form-horizontal" id="form1">
				<div class="container-fluid">
						  
		  			<!-- AREA DADOS PESSOAIS ------------------------------------->	
					
					<legend>Dados Pessoais</legend>
					
					<!-- Linha 1 -->
						<div class="row-fluid">
							<div class="span10">
								<label>Nome</label>
								<input type = "text" name = "txtNome" class="input-xxlarge" required/>
							</div><!-- /Campo 1 -->
						</div><p>
						<!-- fim da Linha 1 -->
						<!-- Linha 1.1 -->
						<div class="row-fluid">
						<div class="span3">
								
								<label>E-mail</label>
									<input type = "text" name = "txtEmail" id="inputIcon" class = "input-xxlarge" placeholder = "example@dominio.com.br" onBlur = "verificaEmailPF()" required/>
									<div id="msg" class = "msg"></div> 
								
							</div> </div><p>
						<!-- fim da Linha 1.1 -->
					<!-- Linha 2 -->
						<div class="row-fluid">
						<div class="span2">
								<label>CPF</label>
								<!--<input type = "text" name = "txtCPF" onBlur="ValidarCPF(CadastroCliente.cpf);" onKeyPress="MascaraCPF(CadastroCliente.cpf);" maxlength="12" class="span11" placeholder = "000.000.000-00" id = "cpf" required/>-->
								<input type="text" name="txtCPF" onBlur="ValidarCPF(CadastroCliente.cpf);" onkeypress= "MascaraCPF(CadastroCliente.cpf);"  maxlength="14" class="span11" placeholder = "000.000.000-00" id ="cpf" required/ />
								<div id="msg7" class = "msg"></div> 
						</div><!-- /Campo 1 -->
						<div class="span2">
								<label>Profissão</label>
								<input type = "text" name = "txtProfissao" class = "span12" required>
						</div><!-- /Campo 2 -->
						<div class="span2">
								<label>Sexo</label>
								<select required name = "cbSexo" style = "width: 142px;">
											<option selected></option>
											<option value = "M">Masculino</option>
											<option value = "F">Feminino</option>
								</select>
						</div><!-- /Campo 2 -->
						</div><br> <!--FIM DA LINHA 2-->
						
						<!--LINHA 3-->
					<div class="row-fluid">
					<div class="row-fluid">
							<div class="span3">
								<label>Como conheceu a Politech?</label>
								<textarea rows="2" name = "txtCDesc" class = "input-xxlarge" placeholder = "Digite aqui como conheceu a empresa..." id = "CDesc" maxlength = "100"></textarea>
							</div>
						</div><br>
						</div>
						<!--FIM DA LINHA 3 -->
						
						
				<!-- FIM AREA DADOS PESSOAIS -->
				
				<!-- CAMPOS ENDEREÇO ------------------>
				<legend>Endereço</legend>
				<div class="row-fluid">
					<div class="span6">
						<label>Código Postal</label> 
						<input type = "text" id = "cep" name ="txtCep" onkeypress= "MascaraCep(CadastroCliente.cep);" maxlength="10" placeholder = "00000-000"required/>&nbsp;&nbsp;&nbsp;<a href =http://www.buscacep.correios.com.br/sistemas/buscacep/ target="_blank">Não sei meu CEP</a>
					<div id="msg5" class = "msg"></div>
					</div>
				</div><p>
				<!-- FIM LINHA 1 -->
				
				<div class="row-fluid">
					<div class="span12">
						<label>Logradouro</label>
						<input type = "text" name = "txtRua" id= "rua" class = "input-xxlarge" required/>
					</div>
                </div><p> 
				<!-- FIM LINHA 2 -->
		  
				<div class="row-fluid">
					<div class="span2">
						<label>Número</label>
						<input type = "text" name = "txtNumero" onBlur="somenteNumeros(CadastroCliente.num);" maxlength="7" id="num" class = "span10" required/>
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
									<select required name="txtEstado" id="uf" style="width: 70px;" >
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

						<!-- CONTATO ------------------>
						<legend>Contato</legend>
							<div class="row-fluid">
								<div class="span3">
									<label>Telefone</label>
									<input type = "text" name = "txtTelefone" id = "tel" onBlur="ValidaTelefone(CadastroCliente.tel);" onKeyPress="MascaraTelefone(CadastroCliente.tel);" maxlength = "14" class = "span11" placeholder = "(00)0000-0000" id="campoTelefone" required/>
									<div id="msg6" class = "msg"></div>								
								</div>
								<div class="span3">
									<label>Celular</label>
										<input type = "text" name = "txtCelular" id = "cel" onBlur="ValidaCelular(CadastroCliente.cel);" onKeyPress="MascaraCelular(CadastroCliente.cel);" maxlength = "15" class = "span11" placeholder = "(00)00000-0000" id="campoCelular" required/>
								     <div id="msg8" class = "msg"></div>
								</div>
							</div><br>
					<!-- FIM LINHA 1 -->
						<legend>Observações</legend>
							<div class="row-fluid">
						<div class="row-fluid">
							<div class="span3">
								<textarea rows="3" name = "txtObs" class = "input-xxlarge" placeholder = "Digite aqui qualquer observação a ser feita..." id = "Obs" maxlength = "200"></textarea>
							</div>
						</div><br>
						</div>
						
						<br><br>

						<!-- BOTÕES -->
							<input type="submit" value="Cadastrar" name="btnCadastrar" class = "btn" >
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