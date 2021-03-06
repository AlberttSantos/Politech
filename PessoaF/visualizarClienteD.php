<!DOCTYPE html>

<html>
	<head>
		<title>Politech - Visualização</title>
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
		
		<!-- INCLUINDO CAMPOS COMUNS -->
<?php include "../Comuns/comumAdm.inc";?>
<!-- Teste de nivel de usuario -->
<?php if ($nivel >= '4'){ ?>
	</head>
	
	<body>
		
			<!-- FECHA CABEÇALHO -->
		</div>
	</div>
	
	<div class = "areaCadastro">
			
		<!-- SUBCABECALHO DA PAGINA -->
			<div class = areaH1>
				<div class = "h1">Dados do Cliente Desativado</div>
				<div class = "h2">Nessa sessão é possível visualizar os dados de Pessoa Física</div>
			</div>
		<!-- ---------------------- -->
			</br>
		<!-- FORMULARIO DE CADASTRO DE CLIENTE -->
		<div class = "conteudo">
			<form method = "post" action = "editarCliente2.php" name="CadastroCliente" class = "form-horizontal">
				<div class="container-fluid">
								
		  	<!-- AREA DADOS PESSOAIS ------------------------------------->	
					<legend>Dados Pessoais</legend>
					
					<?php
						include "../conexao.php"; // incluindo o arquivo que faz a conexao com o banco
	
						$cdCliente = $_GET['cdCliente']; // Recebendo o valor enviado pelo link

						$busca = mysql_query("SELECT * FROM cliente WHERE CDCLIENTE = $cdCliente"); 
						$row = mysql_fetch_array($busca);
					   
					  // Acertar sql de busca		
					  // $busca2 = mysql_query("SELECT * FROM cadastroProj WHERE CDCLIENTE = $cdCliente");
					  // $row2 = mysql_fetch_array($busca2);
						
					?>
		  								
					<!-- Linha 1 -->
						<div class="row-fluid">
							<div class="span10">
							<div class = "textovisualizacao"><b>Nome do Cliente: </b><?php echo $row[1]; ?></div>
								<input type="hidden" value="<?php echo $cdCliente; ?>" name="cdCliente" />
							</div><!-- /Campo 1 -->
						</div><p><!-- fim da Linha 1 -->
						
						<div class="row-fluid">
							<div class="span10">
							<div class = "textovisualizacao"><b>E-mail do Cliente: </b><?php echo $row[17]; ?></div>
							</div><!-- /Campo 1 -->
						</div><p>
						
					<!-- Linha 2 -->
						<div class="row-fluid">
						<div class="span2">
								<div class = "textovisualizacao"><b>CPF: </b><?php echo $row[2]; ?></div>
								<div id="msg4" class = "msg"></div>
						</div><!-- /Campo 1 -->
						<div class="span5">
								<div class = "textovisualizacao"><b>Profissão: </b><?php echo $row[3]; ?></div>
								
						</div><!-- /Campo 2 -->
						<div class="span2">
								<div class = "textovisualizacao"><b>Sexo: </b> <?php if($row[6] == 'F') echo "Feminino"; else echo "Masculino";?> </div>
								
								</select>
						</div><!-- /Campo 2 -->
						</div><p> <!--FIM DA LINHA 2-->
						
						<!--LINHA 3-->
					<div class="row-fluid">
					<div class="row-fluid">
							<div class="span5">
								<div class = "textovisualizacao"><b>Como conheceu a Politech? </b> <?php echo $row[4]; ?></div>
								
							</div>
						</div><br>
						</div>
						<!--FIM DA LINHA 3 -->
						
						
				<!-- FIM AREA DADOS PESSOAIS -->
				
				<!-- CAMPOS ENDEREÇO ------------------>
				<legend>Endereço</legend>
				<div class="row-fluid">
					<div class="span6">
					<div class = "textovisualizacao"><b>Código Postal: </b><?php echo $row[9]; ?></div>
						
						<div id="msg5" class = "msg"></div>
					</div>
				</div><p>
				<!-- FIM LINHA 1 -->
				
				<div class="row-fluid">
					<div class="span12">
					<div class = "textovisualizacao"><b>Logradouro: </b><?php echo $row[10]; ?></div>
						
					</div>
                </div><p> 
				<!-- FIM LINHA 2 -->
		  
				<div class="row-fluid">
					<div class="span2">
					<div class = "textovisualizacao"><b>Número: </b><?php echo $row[11]; ?></div>
				</div>
					<div class="span5">
						<div class = "textovisualizacao"><b>Complemento: </b><?php echo $row[12]; ?></div>
						
					</div><!--/span-->
				</div><p><!--/row-->
				<!-- FIM LINHA 3 -->				
         

				<!-- Linha 4 -->
						<div class="row-fluid">
						<div class="span2">
								<div class = "textovisualizacao"><b>Bairro: </b><?php echo $row[13]; ?></div>
								
						</div><!-- /Campo 1 -->
						<div class="span3">
								<div class = "textovisualizacao"><b>Cidade: </b><?php echo $row[14]; ?></div>
								
						</div><!-- /Campo 2 -->
						<div class="span2">
								<div class = "textovisualizacao"><b>Estado: </b><?php echo $row[15]; ?></div>
								
						</div><!-- /Campo 2 -->
						</div><br> <!--FIM DA LINHA 4-->

						<!-- CONTATO ------------------>
						<legend>Contato</legend>
							<div class="row-fluid">
								<div class="span3">
									<div class = "textovisualizacao"><b>Telefone: </b><?php echo $row[7]; ?></div>
									<div id="msg6" class = "msg"></div>
								</div>
								<div class="span3">
									<div class = "textovisualizacao"><b>Celular: </b><?php echo $row[8]; ?></div>
										<div id="msg7" class = "msg"></div>
								</div>
							</div><br>
							
						<!-- FIM LINHA 1 -->
						<legend>Observações</legend>
						<div class="row-fluid">
								<div class="span10">
									<div class = "textovisualizacao"><?php echo $row[5]; ?></div>
									
								</div>
								
							</div>
						
						<br><br>

						<!-- BOTÕES -->
					<input type="button" value="Voltar" name="btnVoltar" class = "btn" onclick="location.href = 'listaClienteD.php'">
            
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