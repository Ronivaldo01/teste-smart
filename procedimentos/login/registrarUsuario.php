<?php 

require_once "../../classes/conexao.php";
require_once "../../classes/usuarios.php";


$obj = new usuarios();

//var_dump($_POST);
//die;

$dados=array(
	$_POST['nome'],
	(int)$_POST['cpf'],
	$_POST['data-nasc'],
	$_POST['endereco'],
	$_POST['descricao'],
	$_POST['valor'],
	$_POST['data-vencimento']
	

);


echo $obj->registroUsuario($dados);

 ?>