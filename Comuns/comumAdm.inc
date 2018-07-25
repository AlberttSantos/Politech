<!-- código de verificação de sessão -->
<?PHP

/* Não permite que usuário acesse páginas que 
exijam autenticação de usuários antes de realizar o login.
O usuario só conseguirá acessa-la se logado.
Caso não esteja logado é redirecionado para a página de LOGIN*/

//inicia a sessão
session_start();

//Caso o usuário não esteja autenticado, limpa os dados e redireciona
if ( !isset($_SESSION['login']) and !isset($_SESSION['senha'])){
    
	//Destrói
    session_destroy();
 
   //Limpa
   unset ($_SESSION['login']);
   unset ($_SESSION['senha']);
   unset ($_SESSION['nivel']);

    //Redireciona para a página de autenticação
    header('location:../loginAdm.html');
}

//Caso contrário exibe o nome do usuario
else
{
	// armazena em variáveis os valores da sessão
	$login   = $_SESSION['login'];
    $senha   = $_SESSION['senha'];
    $nivel   = $_SESSION['nivel'];
	
	echo "<div class = 'areaLogin'>";
   echo "<div style='text-align: right;margin-right: 30px;'>Bem-vindo,<strong> $login</strong> | <a href = '../logout.php' style='text-decoration: none; color: black;'>Logout</a> </div>";
   echo  "</div>";
}
?>

<!------------------------------------------------------------->


	<script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
	<link href="../css/menu.css" rel="stylesheet" type="text/css">
	<link rel='stylesheet' type='text/css' href='../css/styleMenu.css' />
	<link rel='shortcut icon' href='../img/favicon.ico'> 
	<div class = "conteudo">
		<!-- AREA CABEÇALHO -->
		<div class = "area2">
			<!-- LOGO -->
			<a class="logo2" href = "index.php"></a>
			<div id='cssmenu'>
<?php
if ($nivel == 'Membro') {
$nivel = '1';
}
else 
if ($nivel == 'Gerente'){
$nivel = '3';
}
else 
if ($nivel == 'Diretor'){
$nivel = '4';
}
else{
$nivel = '5';
}
?>
	
		
<ul>
   <li><a href='../Home/cp.php'><span>Home</span></a></li>
  <?php if ($nivel == '1'){
  echo "  <li class='has-sub'><a href='#'><span>Clientes</span></a>
         <ul>
	     
		 <li class='has-sub'><a href='../PessoaF/listaCliente.php'><span>Visualizar Pessoa Física </span></a>
         </li>
         
		 <li class='has-sub'><a href='../PessoaJ/listaPJ.php'><span>Visualizar Pessoa Jurídica</span></a>
         </li>
     </ul>";
	 }
	?>
  <?php if ($nivel >= '3'){
  echo "  <li class='has-sub'><a href='#'><span>Clientes</span></a>
         <ul>
	     <li class='has-sub'><a href='../PessoaF/cadastro.php'><span>Cadastrar Pessoa Física</span></a>
         </li>
		 <li class='has-sub'><a href='../PessoaF/listaCliente.php'><span>Gerenciar Pessoa Física </span></a>
         </li>
         <li class='has-sub'><a href='../PessoaJ/cadastroPJ.php'><span>Cadastrar Pessoa Jurídica</span></a>
         </li>
		 <li class='has-sub'><a href='../PessoaJ/listaPJ.php'><span>Gerenciar Pessoa Jurídica</span></a>
         </li>
     </ul>";
	 }
	?>
	
  
	<?php if ($nivel == '1'){

  echo "<li class='has-sub'><a href='#'><span>Membros</span></a>
      <ul>
	     <li class='has-sub'><a href='../Membros/listarFunc.php'><span>Visualizar Membros</span></a> 
         </li>
         <li class='has-sub'><a href='../Cargo/exibirCargo.php'><span>Visualizar Cargos</span></a> 
         </li>
         </ul>
   </li>";
}
   ?>
   
   	<?php if ($nivel == '3' || $nivel == '4'){

  echo "<li class='has-sub'><a href='#'><span>Membros</span></a>
      <ul>
	  <li class='has-sub'><a href='../Membros/cadastroFunc.php'><span>Cadastrar Membros</span></a> 
         </li>
         <li class='has-sub'><a href='../Membros/listarFunc.php'><span>Gerenciar Membros</span></a> 
         </li>
         <li class='has-sub'><a href='../Cargo/cadastroCargo.php'><span>Gerenciar Cargos</span></a> 
         </li>
         </ul>
   </li>";
}
   ?>
   
  <?php if ($nivel == '5'){ 
  
  echo "<li class='has-sub'><a href='#'><span>Membros</span></a>
      <ul>
	  <li class='has-sub'><a href='../Membros/cadastroFunc.php'><span>Cadastrar Membros</span></a> 
         </li>
         <li class='has-sub'><a href='../Membros/listarFunc.php'><span>Gerenciar Membros</span></a> 
         </li>
         <li class='has-sub'><a href='../Cargo/cadastroCargo.php'><span>Gerenciar Cargos</span></a> 
         </li>
         <li class='has-sub'><a href='../Usuario/ativarAcesso.php'><span>Gerenciar Acesso</span></a> 
         </li>
     </ul>
   </li>";
}

?>

  <?php  if ($nivel == '1'){
   echo" <li class='has-sub'><a href='#'><span>Professores</span></a>
      <ul>
	  
         <li class='has-sub'><a href='../Professor/listaProfessor.php'><span>Visualizar Professores</span></a> 
         </li>
      </ul>
   </li>";
   }
     ?>

<?php if ($nivel >= '3'){
  echo "<li class='has-sub'><a href='#'><span>Professores</span></a>
  <ul>
	<li class='has-sub'><a href='../Professor/cadastro.php'><span>Cadastrar Professor</span></a> 
    </li>
	<li class='has-sub'><a href='../Professor/listaProfessor.php'><span>Gerenciar Professor</span></a> 
    </li>
  </ul>
  </li>"; }?>
   
   
    <?php  if ($nivel == '1'){
   echo" <li class='has-sub'><a href='#'><span>Projetos</span></a>
      <ul>
         <li class='has-sub'><a href='../Projetos/listarProj.php'><span>Visualizar Projetos</span></a> 
         </li>
      </ul>
   </li>";
   }
?>

   
 <?php  if ($nivel >= '3'){
   echo" <li class='has-sub'><a href='#'><span>Projetos</span></a>
      <ul>
	  <li class='has-sub'><a href='../Projetos/cadastroProj.php'><span>Cadastrar Projeto</span></a> 
         </li>
         <li class='has-sub'><a href='../Projetos/listarProj.php'><span>Gerenciar Projetos</span></a> 
         </li>
      </ul>
   </li>";
   }
     ?>
	 
	 <?php if ($nivel == '4' || $nivel == '5'){
   
  echo "<li class='has-sub'><a href='#'><span>Desativados</span></a>
      <ul>
	  <li class='has-sub'><a href='../PessoaF/listaclienteD.php'><span>Pessoas Fisícas</span></a> 
         </li>
         <li class='has-sub'><a href='../PessoaJ/listaPJD.php'><span>Pessoas Jurídicas</span></a> 
         </li>
		 <li class='has-sub'><a href='../Membros/listaFuncD.php'><span>Membros</span></a>
		 </li>
		 <li class='has-sub'><a href='../Professor/listaProfessorD.php'><span>Professores</span></a> 
         </li>
		 <li class='has-sub'><a href='../Projetos/listarProjD.php'><span>Projetos</span></a> 
         </li>
      </ul>
   </li>";
   }?>
<?php 

echo "</ul>";
?>
</div>
		</div>
	</div>