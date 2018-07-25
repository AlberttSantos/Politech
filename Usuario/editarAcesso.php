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
<?php if ($nivel == '5'){ ?>
	</head>
	
	

<body>
	
			<!-- FECHA CABEÇALHO -->
		</div>
	</div>
	 
	<div class = "areaCadastro">
			
		<!-- SUBCABECALHO DA PAGINA -->
			<div class = areaH1>
				<div class = "h1">Editando Nível de Acesso</div>
				<div class = "h2">Nessa sessão é possível editar o nível de acesso dos Usuários</div>
			</div>
		<!-- ---------------------- -->
			
		<!-- FORMULARIO DE CADASTRO -->
		<div class = "conteudo">
			<form method = "post" action = "editarAcesso2.php" name="editarAcesso" class = "form-horizontal">
				<div class="container-fluid">
		  <br/> 
		  			
					
					<?php
						include "../conexao.php"; // incluindo o arquivo que faz a conexao com o banco
	
						$cdUsu = $_GET['cdUsu']; // Recebendo o valor enviado pelo link

						$busca = mysql_query("SELECT * FROM usuario WHERE CDUSUARIO = $cdUsu"); 
						$row = mysql_fetch_array($busca);
						
						
					?>
					
										
					<legend>Dados para acesso</legend>

					<!-- Contéudo da linha 1 -->
						<div class="row-fluid">
						<!-- CAMPO 1 -->
							<div class="span10">
								<div class = "textovisualizacao"><b>Usuario:</b> <?php echo $row[1]; ?></div>
								<input type="hidden" value="<?php echo $cdUsu ?>" name = "cdUsu" />

								</div> 
							</div><p> 
					<!-- Fim da linha 1 -->
					
											
						<div class="row-fluid">
							<div class="span2">
								<label>Nível de Acesso</label>
									<select required name="txtNivelAcesso" id="acesso" style="width: 250px;" >
									
									<option value="Administrador" <?php if($row[3] == 'Administrador') echo 'selected="selected"'; ?>>Administrador</option>
									<option value="Gerente" <?php if($row[3] == 'Gerente') echo 'selected="selected"'; ?>>Gerente</option>
									<option value="Diretor" <?php if($row[3] == 'Diretor') echo 'selected="selected"'; ?>>Diretor</option>
									<option value="Membro" <?php if($row[3] == 'Membro') echo 'selected="selected"'; ?>>Membro</option>
								</select>
						</div>
						</div> <br> 
			
						<!-- BOTÕES -->
							<input type="submit" value="Salvar Alteração" name="btnSalvar" class = "btn " >
							
							<input type="button" value="Cancelar" name="btnVoltar" class = "btn btn-danger" onclick="location.href = 'atiVarAcesso.php'">
            
      </div><!--/row-->
      </form>
	</div> <!-- FECHA CONTEUDO -->
	
	<div class = "conteudo">
				<div class="container-fluid">
				<!-- Listar Clientes -->
				<br>
				<legend>Relação de Usuários</legend>
				
				<?php include "listaatiAcesso.php";?>
					
				</div>
				<!-- Fim listar Cargos -->
			
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