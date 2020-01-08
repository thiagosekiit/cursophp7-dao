<?php 

class Usuario {

	private $idUsuario;
	private $deslogin;
	private $dessenha;
	private $dtcadastro;

	public function getIdusuario(){

		return $this->idUsuario;

	}

	public function setIdusuario($value){

		$this->idUsuario = $value;

	}

	public function getDeslogin(){

		return $this->deslogin;

	} 

	public function setDeslogin($value){

		$this->deslogin = $value;

	}

	public function getDessenha(){

		return $this->dessenha;

	}

	public function setDessenha($value){

		$this->dessenha = $value;

	}

	public function getDtcadastro(){

		return $this->dtcadastro;

	}

	public function setDtcadastro($value){

		$this->dtcadastro = $value;

	}

	public function loadById($id){

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_usuarios WHERE idUsuario = :ID", array(
			":ID"=>$id
		));

//validação para ver se tem algum registro
		if(count($results) > 0){

			$this->setData($results[0]);

		}
	}

	public static  function getList(){

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin");

	}


	public static function search($login){

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :SEARCH ORDER BY deslogin",array(

			':SEARCH'=>"%" .$login. "%"
		));
	}


	public function login($login, $password){

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :LOGIN AND dessenha = :PASSWORD", array(
			":LOGIN"=>$login,
			":PASSWORD"=>$password
		));

//validação para ver se tem algum registro
		if(count($results) > 0){

			$row = $results[0];

			$this->setData($results[0]);

		}else{

			throw new Exception("Login ou senha invalidos");

		}

	}


	public function setData($data){

		$this->setIdusuario($data['idUsuario']);
		$this->setDeslogin($data['deslogin']);
		$this->setDessenha($data['dessenha']);
		$this->setDtcadastro(new DateTime($data['dtcadastro']));

		//var_dump($data);

	}

	public function insert(){

		$sql = new Sql();

		$results = $sql->select("CALL sp_usuarios_insert(:LOGIN, :PASSWORD)", array(
			':LOGIN'=>$this->getDeslogin(),
			':PASSWORD'=>$this->getDessenha()

		));

		if(count($results) > 0){
			$this->setData($results[0]);
		}

	}

	public function update($login, $password){

		$this->setDeslogin($login);
		$this->setDessenha($password);

		$sql = new Sql();

		$sql->query("UPDATE tb_usuarios SET deslogin = :LOGIN, dessenha = :PASSWORD WHERE idUsuario = :ID", array(

			':LOGIN'=>$this->getDeslogin(),
			':PASSWORD'=>$this->getDessenha(),
			':ID'=>$this->getIdusuario()

		));

	}

	public function __construct($login = "", $password = ""){
		$this->setDeslogin($login);
		$this->setDessenha($password);
	}


	public function __toString(){

		return json_encode(array(
			"idUsuario"=>$this->getIdusuario(),
			"deslogin"=>$this->getDeslogin(),
			"dessenha"=>$this->getDessenha(),
			"dtcadastro"=>$this->getDtcadastro()->format("d/m/y H:i:s")

		));

	}

}


?>