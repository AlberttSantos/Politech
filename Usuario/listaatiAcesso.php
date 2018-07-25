
<!-- Teste de nivel de usuario -->
<?php if ($nivel == '5'){ ?>
<html>
<head>

       <script src="../script.js"></script>
</head>
	
<?php
	include "../conexao.php"; // incluindo o arquivo que faz a conexao com o banco
	
    $cont = 0;	
	$resultado = mysql_query("select * from usuario where STATUS = 'A'");
	
	
	if(mysql_num_rows($resultado)<=0)
	{
		echo "<div class='alert alert-error'>";
		echo "<b>Atenção!</b><br>";
		echo "Não existe usuários ativados no momento.";
		echo "</div>";
	}
	
	else
	{
		echo "<table class='table table-striped'>";
		echo "<th>Código</th>";
		echo "<th>Email</th>";
		echo "<th>Nível de Acesso</th>";
		echo "<th>Editar</th>";
		echo "<th>Excluir</th>";
		
		
		while ($linha = mysql_fetch_array($resultado))
		{
							
			
			echo "<tr>";
			echo "<td>$linha[0]</td>";
			echo "<td>$linha[1]</td>";
			echo "<td>$linha[3]</td>";
			echo "<td><a href='editarAcesso.php?cdUsu={$linha[0]}'><i class='icon-edit'></i></a></td>";
			echo "<td><a href='#' class='confirm-delete' data-id='{$linha[0]}'><i class='icon-trash'></i></a></td>";
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
         <h4 class='modal-title' id='modalLabel'>EXCLUIR ACESSO</h4>
    </div>
    <div class="modal-body">
	        <p>Deseja realmente excluir o acesso do usuário?</p>
        
        <p id="debug-url"></p>
    </div>
    <div class="modal-footer">
        <a href="deletarUsuario.php?cdUsu=" class="btn danger">Sim</a>
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

    removeBtn.attr('href', removeBtn.attr('href').replace(/(&|\?)cdUsu=\d*/, '$1cdUsu=' + id));
    
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