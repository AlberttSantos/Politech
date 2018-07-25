
<!-- Teste de nivel de usuario -->
<?php if ($nivel >= '4'){ ?>
<html>
<head>

       <script src="../script.js"></script>
</head>
	
<?php
	include "../conexao.php"; // incluindo o arquivo que faz a conexao com o banco
	
$cont = 0;	
	$resultado = mysql_query("select * from projeto where STATUS = 'D';");
	
	
	if(mysql_num_rows($resultado)<=0)
	{
		echo "<div class='alert alert-error'>";
		echo "<b>Atenção!</b><br>";
		echo "Não existe projetos desativados no momento.";
		echo "</div>";
	}
	
	else
	{
		echo "<table class='table table-striped'>";
		echo "<th>Código</th>";
		echo "<th>Nome</th>";
		echo "<th>Cliente</th>";
		echo "<th>Gerente do Projeto</th>";
		echo "<th>Gerente Comercial</th>";
		echo "<th>Status</th>";
		if ($nivel >= 4) {
		echo "<th>Ativar</th>";
		}
		echo "<th>Visualizar</th>";
		
		
		while ($linha = mysql_fetch_array($resultado))
		{
			//Pesquisa para pergar o nome do cliente
			if ($linha[16] == "pessoaJuridica")
	         {
	          $cdpessoaJ = mysql_query("SELECT pessoaj.NMEMPRESA FROM projeto, pessoaj WHERE CDPROJETO = $linha[0] and projeto.CDCLIENTEPROJ = pessoaj.CDPESSOAJ");
	          $cliente = mysql_fetch_array($cdpessoaJ);
	          }
	         else{
		      $cdpessoaF = mysql_query("SELECT cliente.NMCLIENTE FROM projeto, cliente WHERE CDPROJETO = $linha[0] and projeto.CDCLIENTEPROJ = cliente.CDCLIENTE");
	          $cliente = mysql_fetch_array($cdpessoaF);
	             }
			
			//Pesquisa para pergar o nome do gerente de projeto
			$cdgerente = mysql_query("SELECT funcionario.NMFUNCIONARIO FROM projeto, funcionario WHERE CDPROJETO = $linha[0] and projeto.CDFUNCGERENTE = funcionario.CDFUNCIONARIO");
	        $gerente = mysql_fetch_array($cdgerente);
			
			//Pesquisa para pergar o nome do gerente comercial
			$cdgerenteC = mysql_query("SELECT funcionario.NMFUNCIONARIO FROM projeto, funcionario WHERE CDPROJETO = $linha[0] and projeto.CDFUNCCOMERCIAL = funcionario.CDFUNCIONARIO");
	        $gerenteC = mysql_fetch_array($cdgerenteC);
			  
			  
			echo "<tr>";
			echo "<td>$linha[0]</td>";
			echo "<td>$linha[1]</td>";
			echo "<td>$cliente[0]</td>";
			echo "<td>$gerente[0]</td>";
			echo "<td>$gerenteC[0]</td>";
			echo "<td>$linha[23]</td>";
			if ($nivel >= 4) {
			
			echo "<td><a href='#' class='confirm-delete' data-id='{$linha[0]}'><i class='icon-ok'></i></a></td>";
			}
			echo "<td><a href='visualizarProjD.php?cdProj={$linha[0]}'><i class='icon-search'></i></a></td>";
			
			echo "</tr>";
			$cont++;
		}
		echo "</table>";
		echo "<b>Total de Projetos: </b> $cont";
	}
	mysql_close($conexao);
?>

<body>


<div id="modal-from-dom" class="modal hide fade">
     <div class='modal-dialog' role='document'>
     <div class='modal-content'>
    <div class="modal-header">
       	<button type='button' class='close' data-dismiss='modal' aria-label='Fechar'><span aria-hidden='true'>&times;</span></button>
         <h4 class='modal-title' id='modalLabel'>ATIVAR PROJETO</h4>
    </div>
    <div class="modal-body">
	        <p>Deseja realmente ativar o Projeto?</p>
        
        <p id="debug-url"></p>
    </div>
    <div class="modal-footer">
        <a href="ativarProj.php?cdProj=" class="btn danger">Sim</a>
        <!-- <a href="delete.php?some=param&ref=" class="btn danger">Yes 2</a> -->
        <button type='button' class='btn btn-default' data-dismiss='modal'>N&atilde;o</button>
    </div>
	</div>
	</div>
</div>
				
<script>
    $('#modal-from-dom').on('show', function() {
    var id = $(this).data('id'),
    removeBtn = $(this).find('.danger');

    removeBtn.attr('href', removeBtn.attr('href').replace(/(&|\?)cdProj=\d*/, '$1cdProj=' + id));
    
    //$('#debug-url').html('Delete URL: <strong>' + removeBtn.attr('href') + '</strong>');
});

$('.confirm-delete').on('click', function(e) {
    e.preventDefault();

    var id = $(this).data('id');
    $('#modal-from-dom').data('id', id).modal('show');
});
</script>		

</body>
</html>
<?php }
else
{
	header('location:../Home/cp.php');
}

?>
