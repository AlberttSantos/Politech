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
		
	</head>
	
	<body>
	<!-- INCLUINDO CAMPOS COMUNS-->
	<?php include "../Comuns/comumAdm.inc";?> 
	
			<!-- FECHA CABEÇALHO -->
		</div>
	</div>
	
	<div class = "areaCadastro">
			
		<!-- SUBCABECALHO DA PAGINA -->
			<div class = areaH1>
				<div class = "h1">Dados do Professor</div>
				<div class = "h2">Nessa sessão é possível visualizar os dados de Professor Orientador</div>
			</div>
		<!-- ---------------------- -->
			</br>
		<!-- FORMULARIO DE CADASTRO DE PROFESSOR -->
		<div class = "conteudo">
			
				<div class="container-fluid">
								
		  	<!-- AREA DADOS PESSOAIS ------------------------------------->	
					<legend>Dados Pessoais</legend>
					
					<?php
						include "../conexao.php"; // incluindo o arquivo que faz a conexao com o banco
	
						$cdProfessor = $_GET['cdProfessor']; // Recebendo o valor enviado pelo link

						$busca = mysql_query("SELECT * FROM Professor WHERE CDProf = $cdProfessor"); 
						$row = mysql_fetch_array($busca);
					   
					  // Acertar sql de busca		
					  // $busca2 = mysql_query("SELECT * FROM cadastroProj WHERE CDPROFESSOR = $cdProfessor");
					  // $row2 = mysql_fetch_array($busca2);
						
					?>
		  								
					<!-- Linha 1 -->
						<div class="row-fluid">
							<div class="span5">
								<div class = "textovisualizacao"><b>Nome do Professor: </b><?php echo $row[1]; ?>
								<input type="hidden" value="<?php echo $cdProfessor; ?>" name="cdProfessor" /></div>
							<!-- /Campo 1 -->
							</div>
			
							<!-- /Campo 2 -->
							<div class="span5">
								<div class = "textovisualizacao"><b>E-mail do Professor: </b><?php echo $row[2]; ?></div>
							</div><!-- /Campo 1 -->
						</div><p><!-- fim da Linha 1 -->
					
					<!-- Linha 2 -->
						<div class="row-fluid"><!-- /Campo 1 -->
							<div class="span5">
								<div class = "textovisualizacao"><b>Data de Nascimento: </b><?php echo $row[3]; ?></div>
							</div><!-- /Campo 2 -->
							<div class="span2">
								<div class = "textovisualizacao"><b>Sexo: </b> <?php if($row[4] == 'F') echo "Feminino"; else echo "Masculino";?> </div>
							</div><!-- /Campo 2 -->
						</div><p><br><!--FIM DA LINHA 2-->
						
						<!--LINHA 3-->
					<legend>Informações Adicionais</legend>
					<div class="row-fluid">
					<div class="row-fluid">
							<div class="span10">
								<div class = "textovisualizacao"><b>Formação Acadêmica: </b> <?php echo $row[5]; ?></div>
								
							</div>
						</div><p>
						
					<div class="row-fluid">
					<div class="row-fluid">
							<div class="span10">
								<div class = "textovisualizacao"><b>Disciplinas que leciona: </b> <?php echo $row[6]; ?></div>
								
							</div>
						</div><p>
						
					<div class="row-fluid">
					<div class="row-fluid">
							<div class="span10">
								<div class = "textovisualizacao"><b>Forma de orientar: </b> <?php echo $row[7]; ?></div>
								
							</div>
						</div><p>
						
					<div class="row-fluid">
							<div class="span5">
								<div class = "textovisualizacao"><b>Como conheceu a Politech: </b> <?php echo $row[8]; ?></div>
								
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
									<div class = "textovisualizacao"><b>Telefone: </b><?php echo $row[16]; ?></div>
									<div id="msg6" class = "msg"></div>
								</div>
								<div class="span3">
									<div class = "textovisualizacao"><b>Celular: </b><?php echo $row[17]; ?></div>
										<div id="msg7" class = "msg"></div>
								</div>
							</div><br>
							
						<!-- FIM LINHA 1 -->
						
						<legend>Currículo</legend>
						<!-- CURICULO ------------------>
						
						<div class="row-fluid">
						<div class="span10">
								<div class = "textovisualizacao"><b>Facebook: </b><?php echo $row[18]; ?></div>
								
						</div></div><!-- /Campo 1 -->
						
						<div class="row-fluid">
						<div class="span10">
								<div class = "textovisualizacao"><b>Lattes: </b><?php echo $row[19]; ?></div>
								
						</div></div><!-- /Campo 2 -->
						<div class="row-fluid">
						<div class="span10">
								<div class = "textovisualizacao"><b>Linkedin: </b><?php echo $row[20]; ?></div>
								
						</div></div><!-- /Campo 2 -->
						</div><br> <!--FIM DA LINHA -->
						
						<legend>Observações</legend>
						<div class="row-fluid">
								<div class="span10">
									<div class = "textovisualizacao"><?php echo $row[21]; ?></div>
									
								</div>
								
							</div>
						
						<br><br>

						<!-- BOTÕES -->
					<input type="button" value="Voltar" name="btnVoltar" class = "btn" onclick="location.href = 'listaProfessor.php'">
            
      </div><!--/row-->
      
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