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

			$row = $results[0];

			$this->setIdusuario($row['idUsuario']);
			$this->setDeslogin($row['deslogin']);
			$this->setDessenha($row['dessenha']);
			$this->setDtcadastro(new DateTime($row['dtcadastro']));

		}

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