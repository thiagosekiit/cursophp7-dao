<?php 

require_once("config.php");

/*$sql = new Sql();

$usuarios = $sql->select("SELECT * FROM tb_usuarios");

echo json_encode($usuarios);*/

/*$root = new Usuario();

$root->loadById(1);

echo $root;*/

/*$cliente = new Cliente();

$cliente->loadById(1);

echo $cliente;
*/

//$lista = Usuario::getList();

//echo json_encode($lista);

//Carrega uma lista de usuarios buscando pelo login
//$search = Usuario::search("r");

//echo json_encode($search);

//Carrega um usuario usando login e senha

$usuario = new Usuario();
$usuario->login("Thiago","123456");

echo $usuario;

 ?>