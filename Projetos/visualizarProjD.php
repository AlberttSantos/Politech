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
				<div class = "h1">Dados do Projeto</div>
				<div class = "h2">Nessa sessão é possível visualizar os dados do Projeto</div>
			</div>
		<!-- ---------------------- -->
			</br>
		<!-- FORMULARIO DE VISUALIZAÇÃO DE MEMBROS -->
		<div class = "conteudo">
			
				<div class="container-fluid">
								
		  	<!-- AREA DADOS PESSOAIS ------------------------------------->	
					<legend>Dados do Projeto</legend>
					
					<?php
						include "../conexao.php"; // incluindo o arquivo que faz a conexao com o banco
	
						$cdProj = $_GET['cdProj']; // Recebendo o valor enviado pelo link
						
						$busca = mysql_query("SELECT * FROM projeto WHERE CDPROJETO = $cdProj"); 
						$row = mysql_fetch_array($busca);
						
						if ($row[16] == "pessoaJuridica")
	                     {
	                     $cdpessoaJ = mysql_query("SELECT pessoaj.NMEMPRESA FROM projeto, pessoaj WHERE CDPROJETO = $row[0] and projeto.CDCLIENTEPROJ = pessoaj.CDPESSOAJ");
	                     $cliente = mysql_fetch_array($cdpessoaJ);
	                      }
	                   else{
		               $cdpessoaF = mysql_query("SELECT cliente.NMCLIENTE FROM projeto, cliente WHERE CDPROJETO = $row[0] and projeto.CDCLIENTEPROJ = cliente.CDCLIENTE");
	                   $cliente = mysql_fetch_array($cdpessoaF);
	                       }
					    
					   $cdgerente = mysql_query("SELECT funcionario.NMFUNCIONARIO FROM projeto, funcionario WHERE CDPROJETO = $row[0] and projeto.CDFUNCGERENTE = funcionario.CDFUNCIONARIO");
	                   $gerente = mysql_fetch_array($cdgerente);
					
					   $cdgerenteC = mysql_query("SELECT funcionario.NMFUNCIONARIO FROM projeto, funcionario WHERE CDPROJETO = $row[0] and projeto.CDFUNCCOMERCIAL = funcionario.CDFUNCIONARIO");
	                   $gerenteC = mysql_fetch_array($cdgerenteC);
					   
					   $cdmembroR = mysql_query("SELECT funcionario.NMFUNCIONARIO FROM projeto, funcionario WHERE CDPROJETO = $row[0] and projeto.CDFUNCRESPONSAVEL = funcionario.CDFUNCIONARIO");
	                   $membroR = mysql_fetch_array($cdmembroR);
					   
						   
					  // $cdmembroParticipantes = mysql_query("SELECT funcionario.NMFUNCIONARIO FROM projeto, funcionario WHERE CDPROJETO = $row[0] and projeto.CDFUNCPARTICIPANTE = funcionario.CDFUNCIONARIO");
	                  // $membros = mysql_fetch_array($cdmembroParticipantes);
					   
					   $cdmembro0 = mysql_query("SELECT CDFUNCPARTICIPANTE FROM projeto WHERE CDPROJETO = $row[0]");
	                   $teste = mysql_fetch_array($cdmembro0);
					
					
					   //tirar virgula do array
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
					
					
					//echo $teste[0];
					  //$cdprofessor = mysql_query("SELECT professor.NMPROFESSOR FROM projeto, professor WHERE CDPROJETO = $row[0] and projeto.CDPROFESSOR = professor.CDPROFESSOR");
	                 //$professor = mysql_fetch_array($cdprofessor);
					  
					  // Acertar sql de busca		
					  // $busca2 = mysql_query("SELECT * FROM cadastroProj WHERE CDCLIENTE = $cdCliente");
					  // $row2 = mysql_fetch_array($busca2);
						
					?>
		  								
					<!-- Linha 1 -->
						<div class="row-fluid">
							<div class="span10">
							<div class = "textovisualizacao"><b>Nome do Proheto: </b><?php echo $row[1]; ?></div>
								<input type="hidden" value="<?php echo $cdProj; ?>" name="cdProj" />
							</div><!-- /Campo 1 -->
						</div><p><!-- fim da Linha 1 -->
						
					<div class="row-fluid">
					<div class="span3">
						<div class = "textovisualizacao"><b>Data de Entrada: </b><?php echo $row[2]; ?></div>
					</div>
					</div> <p>
					<div class="row-fluid">
					<div class="span3">
						<div class = "textovisualizacao"><b>Data de início Planejado: </b><?php echo $row[3]; ?></div>
					</div>
						<div class="span3">
						<div class = "textovisualizacao"><b>Data de início Real: </b><?php echo $row[4]; ?></div>
					</div>
					
				    </div> <p>
					
					<div class="row-fluid">
					<div class="span3">
						<div class = "textovisualizacao"><b>Data Final Planejado: </b><?php echo $row[33]; ?></div>
					</div>
					<div class="span3">
						<div class = "textovisualizacao"><b>Data Final: </b><?php echo $row[5]; ?></div>
					</div>
					</div> <p>
					<div class="row-fluid">
					<div class="span3">
						<div class = "textovisualizacao"><b>Preço Real: </b><?php echo $row[6]; ?></div>
					</div>
						<div class="span3">
						<div class = "textovisualizacao"><b>Preço com Desconto: </b><?php echo $row[7]; ?></div>
					</div>
					
				    </div> <p>
					
										
					<div class="row-fluid">
					<div class="span10">
						<div class = "textovisualizacao"><b>Área de atuação do Projeto: </b><?php echo $row[10]; ?></div>
					</div>
					</div> <p>
					<div class="row-fluid">
					<div class="span10">
						<div class = "textovisualizacao"><b>Membros Participantes: </b><?php $cont++; for ($i=1;$i<$cont;$i++){echo($teste[$i].', '); }?></div>
					</div>
				
				    </div> <p>
					
					<div class="row-fluid">
					<div class="span6">
						<div class = "textovisualizacao"><b>Gerente do Projeto: </b><?php echo $gerente[0]; ?></div>
					</div>
					 </div> <p>
					<div class="row-fluid">
					<div class="span6">
						<div class = "textovisualizacao"><b>Professor Orientador: </b><?php echo $professor[0]; ?></div>
					</div>
				
				    </div> <p>
					
					<div class="row-fluid">
					<div class="span6">
						<div class = "textovisualizacao"><b>Membro responsavel pela precificação: </b><?php echo $membroR[0]; ?></div>
					</div>
					</div> <p>
					<div class="row-fluid">
					<div class="span6">
						<div class = "textovisualizacao"><b>Gerente comercial responsável: </b><?php echo $gerenteC[0]; ?></div>
					</div>
				
				    </div> <p>
					
					<div class="row-fluid">
						<div class="span3">
						<div class = "textovisualizacao"><b>Houve atraso? </b><?php echo $row[14]; ?></div>
					    </div>
					</div><p>
					<?php if ($row[14] == "Sim") {?>
					<div class="row-fluid">
						<div class="span3">
						<div class = "textovisualizacao"><b>Número de dias: </b><?php echo $row[15]; ?></div>
					    </div>
						
					</div><p>
					<?php }?>
						<!--LINHA 3-->
					
					<div class="row-fluid">
						<div class="span5">
						<div class = "textovisualizacao"><b>Cliente do Projeto: </b><?php echo $cliente[0]; ?></div>
					    </div>
					</div><br>
						
						<!--FIM DA LINHA 3 -->
						
						
				<!-- FIM AREA DADOS PESSOAIS -->
				<!-- AREA DADOS ADICIONAIS -->
				<legend>Informações Adicionais</legend>
				<div class="row-fluid">
					<div class="span4">
						<div class = "textovisualizacao"><b>Data de Assinatura do Contrato: </b><?php echo $row[18]; ?></div>
					</div>
					<div class="span3">
						<div class = "textovisualizacao"><b>Status do Projeto: </b><?php echo $row [23]; ?></div>
				
					</div>
				</div> <p>
				
				<div class="row-fluid">
				<div class="span3">
						<div class = "textovisualizacao"><b>Houve contra proposta? </b><?php echo $row[20]; ?></div>
					</div>
				</div> <p>

				<div class="row-fluid">
					<div class="span6">
						<div class = "textovisualizacao"><b>Forma de Pagamento: </b><?php echo $row[22]; ?></div>
					</div>
					</div> <p>
					<div class="row-fluid">
					<div class="span3">
						<div class = "textovisualizacao"><b>Número de Visitas técnicas: </b><?php echo $row[19]; ?></div>
					</div>
					
			    </div> <p>
				<div class="row-fluid">
					<div class="span10">
						<div class = "textovisualizacao"><b>Data e descrição Visitas Técnicas: </b><?php echo $row[21]; ?></div>
					</div>
					
			    </div> <br>
				
				
				<!-- FIM AREA DADOS ADICIONAIS -->
				<!-- CAMPOS ENDEREÇO ------------------>
				<legend>Endereço</legend>
				<div class="row-fluid">
					<div class="span6">
					<div class = "textovisualizacao"><b>Código Postal: </b><?php echo $row[24]; ?></div>
						
						<div id="msg5" class = "msg"></div>
					</div>
				</div><p>
				<!-- FIM LINHA 1 -->
				
				<div class="row-fluid">
					<div class="span12">
					<div class = "textovisualizacao"><b>Logradouro: </b><?php echo $row[25]; ?></div>
						
					</div>
                </div><p> 
				<!-- FIM LINHA 2 -->
		  
				<div class="row-fluid">
					<div class="span2">
					<div class = "textovisualizacao"><b>Número: </b><?php echo $row[26]; ?></div>
				</div>
					<div class="span5">
						<div class = "textovisualizacao"><b>Complemento: </b><?php echo $row[27]; ?></div>
						
					</div><!--/span-->
				</div><p><!--/row-->
				<!-- FIM LINHA 3 -->				
         

				<!-- Linha 4 -->
						<div class="row-fluid">
						<div class="span2">
								<div class = "textovisualizacao"><b>Bairro: </b><?php echo $row[28]; ?></div>
								
						</div><!-- /Campo 1 -->
						<div class="span3">
								<div class = "textovisualizacao"><b>Cidade: </b><?php echo $row[29]; ?></div>
								
						</div><!-- /Campo 2 -->
						<div class="span2">
								<div class = "textovisualizacao"><b>Estado: </b><?php echo $row[30]; ?></div>
								
						</div><!-- /Campo 2 -->
						</div><br> <!--FIM DA LINHA 4-->
				
						<!-- FIM LINHA 1 -->
						<legend>Observações</legend>
						<div class="row-fluid">
								<div class="span10">
									<div class = "textovisualizacao"><?php echo $row[32]; ?></div>
									
								</div>
								
							</div>
						
						<br><br>

						<!-- BOTÕES -->
					<input type="button" value="Voltar" name="btnVoltar" class = "btn" onclick="location.href = 'listarProjD.php'">
            
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