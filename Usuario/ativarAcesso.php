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
				<div class = "h1">Gerenciamento de Usuários</div>
				<div class = "h2">Nessa sessão é possível cadastrar, editar e desativar os acessos dos Usuários</div>
			</div>
		<!-- ---------------------- -->
			
		<!-- FORMULARIO DE CADASTRO -->
		<div class = "conteudo">
			<form method = "post" action = "salvaUsu.php" name="AtivarFuncionario" class = "form-horizontal">
				<div class="container-fluid">
		  <br/> 
		  			
							
					<legend>Dados para acesso</legend>

					<!-- Contéudo da linha 1 -->
						<div class="row-fluid">
						<!-- CAMPO 1 -->
							<div class="span3">
								<div class="input-prepend">
								<label>Seu e-mail</label>
									<span class="add-on"><i class="icon-envelope"></i></span>
										<input type = "text" name = "txtEmail" id="inputIcon" class = "input-large" placeholder = "example@dominio.com.br" onBlur = "verificaEmailAA()" required/>
										<div id="msg" class = "msg"></div> 
								</div>
							</div>
						<!-- FIM CAMPO 1 -->
						
						<!-- CAMPO 2 -->
							<div class="span3">
								<label>Redigite seu e-mail</label>
								<input type = "text" name = "txtEmailR" class = "span11" onBlur="validarEmail()" required/>
								<div id="msg1" class = "msg"></div> 
							</div>
						<!-- FIM CAMPO 2 -->
						</div><p>
					<!-- Fim da linha 1 -->
					
					<!-- Contéudo da linha 2 -->
						<div class="row-fluid">
						<!-- CAMPO 1 -->
							<div class="span3">
							<div class="input-prepend">
								<label>Senha</label>
									<span class="add-on"><i class="icon-lock"></i></span>
									<input type = "password" name = "txtSenha" class = "input-large" onBlur="verificaSenha()" required/>
									<div id="msg2" class = "msg"></div>
							</div>
							</div>
						<!-- FIM CAMPO 1 -->
						
						<!-- CAMPO 2 -->
							<div class="span3">
								<label>Redigite sua senha</label>
								<input type = "password" name = "txtSenhaR" class = "span11" onBlur="validarConfirmacao()" required/>
								<div id="msg3" class = "msg"></div> 
								
							</div> 
							
						<!-- FIM CAMPO 2 -->
						</div><p>
						<div class="row-fluid">
							<div class="span2">
								<label>Nível de Acesso</label>
									<select required name="txtNivelAcesso" id="acesso" style="width: 250px;" >
									<option selected></option>
									<option value="Administrador">Administrador</option>
									<option value="Gerente">Gerente</option>
									<option value="Diretor">Diretor</option>
									<option value="Membro">Membro</option>
								</select>
						</div>
						</div> <br>

						<!-- BOTÕES -->
							<input type="submit" value="Ativar" name="btnSalvar" class = "btn " >
							<input type="reset" value="Limpar" name="btnLimpar"  class = "btn btn-danger">
							
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