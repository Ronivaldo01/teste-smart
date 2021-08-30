<?php 

	require_once "../../classes/conexao.php";
	require_once "../../classes/usuarios.php";

	$obj= new usuarios;

	$dados=array(
			$_POST['idUsuarioU'],  
		    $_POST['nomeU'] , 
		    $_POST['cpfU'],  
		    $_POST['data-nascU'],
			$_POST['enderecoU'],
			$_POST['descricaoU'],
			$_POST['valorU'],
			$_POST['data-vencimentoU']
				);  
				
	echo $obj->atualizar($dados);


 ?>