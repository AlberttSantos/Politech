<!DOCTYPE html>
<html>
	<head>
		<title>Politech - Clientes</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<!-- Imagem título -->
		<link rel="shortcut icon" href="../img/favicon.ico"> 
		 
		<!-- CSS -->
		<link href="../css/estilo.css" rel="stylesheet" type="text/css">
		
		<!-- Bootstrap -->
	    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
		<link href="../bootstrap/css/bootstrap-responsive.css" rel="stylesheet" media="screen">
	
		<!-- JQuery -->
		<script src="../jquery.js" type="text/javascript"></script>
		<script src="../jquery.maskedinput.js" type="text/javascript"></script>
		
	</head>

<body>
	<!-- INCLUINDO CAMPOS COMUNS -->
	<?php include "../Comuns/comumAdm.inc";?>
	
	
			<!-- FECHA CABEÇALHO -->
			
		<!-- SUBCABECALHO DA PAGINA -->
			<div class = areaH1>
				<div class = "h1">Relação de Clientes</div>
				<div class = "h2">Nessa sessão é possível excluir, editar e listar Pessoas Físicas</div>
			</div>
		<!-- ---------------------- -->
			</br>
		<div class = "conteudo">
				<div class="container-fluid">
				<!-- Listar Clientes -->
				<legend>Relação de Pessoas Físicas</legend>
						
				<?php include "listaCliente2.php";?>
					
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