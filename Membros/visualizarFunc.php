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
<?php if ($nivel >= '1'){ ?>
	</head>
	
	<body>

			<!-- FECHA CABEÇALHO -->
		</div>
	</div>
	
	<div class = "areaCadastro">
			
		<!-- SUBCABECALHO DA PAGINA -->
			<div class = areaH1>
				<div class = "h1">Dados do Membro</div>
				<div class = "h2">Nessa sessão é possível visualizar os dados do Membro</div>
			</div>
		<!-- ---------------------- -->
			</br>
		<!-- FORMULARIO DE VISUALIZAÇÃO DE MEMBROS -->
		<div class = "conteudo">
			
				<div class="container-fluid">
								
		  	<!-- AREA DADOS PESSOAIS ------------------------------------->	
					<legend>Dados Pessoais</legend>
					
					<?php
						include "../conexao.php"; // incluindo o arquivo que faz a conexao com o banco
	
						$cdFunc = $_GET['cdFunc']; // Recebendo o valor enviado pelo link
						
						$busca = mysql_query("SELECT * FROM funcionario WHERE CDFUNCIONARIO = $cdFunc"); 
						$row = mysql_fetch_array($busca);
						
						$cdCargo = mysql_query("SELECT cargo.NMCARGO FROM funcionario, cargo WHERE CDFUNCIONARIO = $cdFunc and funcionario.CDCARGO = cargo.CDCARGO");
						$cargo = mysql_fetch_array($cdCargo);
										
					   
					  // Acertar sql de busca		
					  // $busca2 = mysql_query("SELECT * FROM cadastroProj WHERE CDCLIENTE = $cdCliente");
					  // $row2 = mysql_fetch_array($busca2);
						
					?>
		  								
					<!-- Linha 1 -->
						<div class="row-fluid">
							<div class="span10">
							<div class = "textovisualizacao"><b>Nome do Membro: </b><?php echo $row[1]; ?></div>
								<input type="hidden" value="<?php echo $cdFunc; ?>" name="cdFunc" />
							</div><!-- /Campo 1 -->
						</div><p><!-- fim da Linha 1 -->
						
						<div class="row-fluid">
							<div class="span10">
							<div class = "textovisualizacao"><b>E-mail: </b><?php echo $row[2]; ?></div>
							</div><!-- /Campo 1 -->
						</div><p>
					
					<!-- Linha 2 -->
						<div class="row-fluid">
						<div class="span2">
								<div class = "textovisualizacao"><b>CPF: </b><?php echo $row[3]; ?></div>
								<div id="msg4" class = "msg"></div>
						</div><!-- /Campo 1 -->
						<div class="span3">
								<div class = "textovisualizacao"><b>Data de Nascimento: </b><?php echo $row[4]; ?></div>
								
						</div><!-- /Campo 2 -->
						<div class="span2">
								<div class = "textovisualizacao"><b>Sexo: </b> <?php if($row[5] == 'F') echo "Feminino"; else echo "Masculino";?> </div>
								
								</select>
						</div><!-- /Campo 2 -->
						</div><p> <!--FIM DA LINHA 2-->
						
						<!--LINHA 3-->
					<div class="row-fluid">
					<div class="row-fluid">
							<div class="span5">
								<div class = "textovisualizacao"><b>Como conheceu a Politech? </b> <?php echo $row[25]; ?></div>
								
							</div>
						</div><br>
						</div>
						<!--FIM DA LINHA 3 -->
						
						
				<!-- FIM AREA DADOS PESSOAIS -->
				<!-- AREA DADOS ADICIONAIS -->
				<legend>Informações Adicionais</legend>
				<div class="row-fluid">
					<div class="span3">
						<div class = "textovisualizacao"><b>Data de Admissão: </b><?php echo $row[6]; ?></div>
					</div>
					<div class="span3">
						<div class = "textovisualizacao"><b>Data de Desligamento: </b><?php echo $row[7]; ?></div>
					</div>
					<div class="span3">
						<div class = "textovisualizacao"><b>Período: </b><?php echo $row[8]; ?></div>
					</div>
				</div> <p>
				<div class="row-fluid">
					<div class="span3">
						<div class = "textovisualizacao"><b>Curso: </b><?php echo $row[9]; ?></div>
					</div>
					<div class="span3">
						<div class = "textovisualizacao"><b>Cargo: </b><?php echo $cargo [0]; ?></div>
						

					</div>
			    </div> <br>
				
				<!-- FIM AREA DADOS ADICIONAIS -->
				<!-- CAMPOS ENDEREÇO ------------------>
				<legend>Endereço</legend>
				<div class="row-fluid">
					<div class="span6">
					<div class = "textovisualizacao"><b>Código Postal: </b><?php echo $row[13]; ?></div>
						
						<div id="msg5" class = "msg"></div>
					</div>
				</div><p>
				<!-- FIM LINHA 1 -->
				
				<div class="row-fluid">
					<div class="span12">
					<div class = "textovisualizacao"><b>Logradouro: </b><?php echo $row[14]; ?></div>
						
					</div>
                </div><p> 
				<!-- FIM LINHA 2 -->
		  
				<div class="row-fluid">
					<div class="span2">
					<div class = "textovisualizacao"><b>Número: </b><?php echo $row[15]; ?></div>
				</div>
					<div class="span5">
						<div class = "textovisualizacao"><b>Complemento: </b><?php echo $row[16]; ?></div>
						
					</div><!--/span-->
				</div><p><!--/row-->
				<!-- FIM LINHA 3 -->				
         

				<!-- Linha 4 -->
						<div class="row-fluid">
						<div class="span2">
								<div class = "textovisualizacao"><b>Bairro: </b><?php echo $row[17]; ?></div>
								
						</div><!-- /Campo 1 -->
						<div class="span3">
								<div class = "textovisualizacao"><b>Cidade: </b><?php echo $row[18]; ?></div>
								
						</div><!-- /Campo 2 -->
						<div class="span2">
								<div class = "textovisualizacao"><b>Estado: </b><?php echo $row[19]; ?></div>
								
						</div><!-- /Campo 2 -->
						</div><br> <!--FIM DA LINHA 4-->

						<!-- CONTATO ------------------>
						<legend>Contato</legend>
							<div class="row-fluid">
								<div class="span3">
									<div class = "textovisualizacao"><b>Telefone: </b><?php echo $row[11]; ?></div>
									<div id="msg6" class = "msg"></div>
								</div>
								<div class="span3">
									<div class = "textovisualizacao"><b>Celular: </b><?php echo $row[12]; ?></div>
										<div id="msg7" class = "msg"></div>
								</div>
							</div><br>
							
						<legend>Currículo</legend>
						<div class="row-fluid">
						<div class="span10">
								<div class = "textovisualizacao"><b>Facebook: </b><?php echo $row[21]; ?></div>
								
						</div> </div> <p>
						<div class="row-fluid">
						<div class="span10">
								<div class = "textovisualizacao"><b>Lattes: </b><?php echo $row[22]; ?></div>
								
						</div> </div> <p>
						<div class="row-fluid">
						<div class="span10">
								<div class = "textovisualizacao"><b>Linkedin: </b><?php echo $row[23]; ?></div>
								
						</div> </div> <br>
						
						<!-- FIM LINHA 1 -->
						<legend>Observações</legend>
						<div class="row-fluid">
								<div class="span10">
									<div class = "textovisualizacao"><?php echo $row[24]; ?></div>
									
								</div>
								
							</div>
						
						<br><br>

						<!-- BOTÕES -->
					<input type="button" value="Voltar" name="btnVoltar" class = "btn" onclick="location.href = 'listarFunc.php'">
            
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
<?php }
else
{
	header('location:../Home/cp.php');
}

?>