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

/*$usuario->login("Thiago","123456");

echo $usuario;
*/

/*
$aluno = new Usuario("aluno");

$aluno->setDeslogin("aluno");
$aluno->setDessenha("123456");

$aluno->insert();

echo $aluno;
*/

/*
$cliente = new Cliente();

$cliente->setNome("Ariane");
$cliente->setDocumento("333.333.666-5");

$cliente->insert();

//var_dump($cliente);

echo $cliente;
*/

/*
$usuario = new Usuario();

$usuario->loadById(2);

$usuario->update("Sekiguchi", "445566");

echo $usuario;
*/

$usuario = new Usuario();

$usuario->loadById(2);

$usuario->delete();

echo $usuario;

 ?>