<?php if ($nivel >= '4'){ ?>
<html>
<head>

       <script src="../script.js"></script>
</head>
	
<?php
	include "../conexao.php"; // incluindo o arquivo que faz a conexao com o banco
	
$cont = 0;	
	$resultado = mysql_query("select * from funcionario f, cargo c where f.cdcargo = c.cdcargo and f.STATUS = 'D'");
	
	
	if(mysql_num_rows($resultado)<=0)
	{
		echo "<div class='alert alert-error'>";
		echo "<b>Atenção!</b><br>";
		echo "Não existe membros desativados no momento.";
		echo "</div>";
	}
	
	else
	{
		echo "<table class='table table-striped'>";
		echo "<th>Código</th>";
		echo "<th>Nome</th>";
		echo "<th>Email</th>";
		echo "<th>Cargo</th>";
		echo "<th>Telefone</th>";
		echo "<th>Celular</th>";
		
		echo "<th>Ativar</th>";
		echo "<th>Visualizar</th>";
		
		while ($linha = mysql_fetch_array($resultado))
		{
			//Pesquisa para pergar o nome do cargo
			$cdCargo = mysql_query("SELECT cargo.NMCARGO FROM funcionario, cargo WHERE CDFUNCIONARIO = $linha[0] and funcionario.CDCARGO = cargo.CDCARGO");
	        $cargo = mysql_fetch_array($cdCargo);
			
			echo "<tr>";
			echo "<td>$linha[0]</td>";
			echo "<td>$linha[1]</td>";
			echo "<td>$linha[2]</td>";
			echo "<td>$cargo[0]</td>";
			echo "<td>$linha[11]</td>";
			echo "<td>$linha[12]</td>";
			echo "<td><a href='#' class='confirm-delete' data-id='{$linha[0]}'><i class='icon-ok'></i></a></td>";

			echo "<td><a href='visualizarFuncD.php?cdFunc={$linha[0]}'><i class='icon-search'></i></a></td>";
			echo "</tr>";
			$cont++;
		}
		echo "</table>";
		echo "<b>Total de Membros: </b> $cont";
	}
	mysql_close($conexao);
?>

<body>


<div id="modal-from-dom" class="modal hide fade">
     <div class='modal-dialog' role='document'>
     <div class='modal-content'>
    <div class="modal-header">
       	<button type='button' class='close' data-dismiss='modal' aria-label='Fechar'><span aria-hidden='true'>&times;</span></button>
         <h4 class='modal-title' id='modalLabel'>ATIVAR MEMBRO</h4>
    </div>
    <div class="modal-body">
	        <p>Deseja realmente ativar o Membro?</p>
        
        <p id="debug-url"></p>
    </div>
    <div class="modal-footer">
        <a href="ativarFunc.php?cdFunc=" class="btn danger">Sim</a>
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

    removeBtn.attr('href', removeBtn.attr('href').replace(/(&|\?)cdFunc=\d*/, '$1cdFunc=' + id));
    
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