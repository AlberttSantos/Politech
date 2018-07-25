<!DOCTYPE html>
<html>
	<head>
		<title>Politech - Cargos</title>
		<?php include "../Comuns/imports.inc";?>
	</head>
<body>
	<!-- INCLUINDO CAMPOS COMUNS -->
	<?php include "../Comuns/comumAdm.inc";?>
	<?php if ($nivel >= '4'){ ?>
	
			<!-- FECHA CABEÇALHO -->
			
		<!-- SUBCABECALHO DA PAGINA -->
			<div class = areaH1>
				<div class = "h1">Gerenciamento de Cargos</div>
				<div class = "h2">Nessa sessão é possível cadastrar, excluir, editar e listar os cargos dos Funcionários</div>
			</div>
		<!-- ---------------------- -->
			</br>
		<!-- FORMULARIO DE CADASTRO DE CLIENTE -->
		<div class = "conteudo">
			<form method = "get" action = "editarCargo2.php" name="CadastroCargo" class = "form-horizontal">
				<div class="container-fluid">
					<!-- CADASTRO DE CARGOS----------------------------------------->	
					<legend>Editando o Cargo</legend>

					<?php
						include "../conexao.php"; // incluindo o arquivo que faz a conexao com o banco
	
						$cdCargo = $_GET['cdCargo']; // Recebendo o valor enviado pelo link

						$busca = mysql_query("SELECT * FROM cargo WHERE CDCARGO = $cdCargo"); 
						$row = mysql_fetch_array($busca);
						?>

					<!-- Contéudo da linha 1 -->
						<div class="row-fluid">
							<div class="span10">
								<label>Nome do Cargo</label>
									<input type = "text" name = "txtCargo" class = "input-xxlarge" value="<?php echo $row[1]; ?>" required />
									<input type="hidden" value="<?php echo $cdCargo; ?>" name="cdCargo" />
							</div>
						</div><p>
					<!-- FIM DA LINHA 1 -->
					
					<!-- Contéudo da linha 1 -->
						<div class="row-fluid">
							<div class="span3">
								<label>Descrição do Cargo</label>
								<textarea rows="8" name = "txtCDesc" class = "input-xxlarge" placeholder = "Digite aqui uma prévia descrição de quais são as atribuições e responsabilidades do cargo..." maxlength = "450"><?php echo $row[2]; ?></textarea>
							</div>
						</div><br>
					<!-- FIM DA LINHA 1 -->
					
					<!-- BOTÕES -->
							<button type="submit" class="btn" name = 'btnSalvar'>Salvar alterações</button>
							<input type="button" value="Cancelar" name="btnVoltar" class = "btn btn-danger" onclick="location.href = 'cadastroCargo.php'">
							
					</div><!--/row-->
				</form><br>
				
				<!-- Fim Cadastro de Cargos ----------------------------------------->
				
				<div class="container-fluid">
				<!-- Listar Cargos -->
				<legend>Relação de Cargos</legend>
				<!-- Para exibir o arquivo listaCargos.php dentro desta página -->
				<?php include "listaCargos.php";?>
					
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