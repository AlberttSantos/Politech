<!DOCTYPE html>
<html>
	<head>
		<title>Politech - Login</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- Imagem título -->
		<link rel="shortcut icon" href="img/icon.ico"> 
		 
		<!-- CSS -->
		<link href="css/estilo.css" rel="stylesheet" type="text/css">
		
		<!-- Bootstrap -->
	    <link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
		<link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet" media="screen">
	
		<!-- JQuery -->
		<script src="js/jquery.js" type="text/javascript"></script>
		<script src="js/jquery.maskedinput.js" type="text/javascript"></script>
		
	</head>

<body>
	<!-- INCLUINDO CAMPOS COMUNS -->
	<?php include "Comuns/comum.inc";?>
	
			<!-- FECHA CABEÇALHO -->
		</div>
	</div>
	
	<div class = "areaCadastro">
			
		<!-- SUBCABECALHO DA PAGINA -->
			<div class = areaH1>
				<div class = "h1">Confirmação de Login</div>
				<div class = "h2">Nessa seção você é informado sobre o status do seu Login</div>
			</div>
		<!-- ---------------------- -->
			
		<!-- Informações -->
			<br>
		<div class = "conteudo">
					<div class='alert alert-error'>
						<b>Erro ao Logar!</b><br>
						Não foi possível Logar. Nome de usuário ou senha inválidos.<br>
						
					</div>
				<a href = "loginAdm.php">Clique aqui para voltar a página inicial...</a>
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