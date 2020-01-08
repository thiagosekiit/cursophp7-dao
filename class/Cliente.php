<?php 

class Cliente{

	private $id;
	private $nome;
	private $documento;
	private $dtCadastro;


	public function getid(){

		return $this->id;

	}

	public function  setid($value){

		$this->id = $value;

	}

	public function getNome(){

		return $this->nome;

	}

	public function setNome($value){

		$this->nome = $value;

	}

	public function getDocumento(){

		return $this->documento;

	}

	public function setDocumento($value){

		$this->documento = $value;

	}

	public function getDtcadastro(){

		return $this->dtCadastro;

	}

	public function setDtcadastro($value){

		$this->dtCadastro = $value;

	}


	public function loadById($id){

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_clientes WHERE id = :ID", array(
			":ID"=>$id

		));

		if(count($results) > 0){

			$this->setData($results[0]);

		}

	}

	public function setData($data){

		$this->setid($data['id']);
		$this->setNome($data['nome']);
		$this->setDocumento($data['documento']);
		$this->setDtcadastro(new DateTime($data['dtCadastro']));

	}


	public function insert(){

		$sql = new Sql();

		$results = $sql->select("CALL sp_clientes_insert(:NOME, :DOCUMENTO)", array(

			':NOME'=>$this->getNome(),
			':DOCUMENTO'=>$this->getDocumento()

		));

		if(count($results) > 0){

			$this->setData($results[0]);
		}


	}


	public function __toString(){

		return json_encode(array(

			"id"=>$this->getid(),
			"nome"=>$this->getNome(),
			"documento"=>$this->getDocumento(),
			"dtCadastro"=>$this->getDtcadastro()->format("d/m/y H:i:s")

		));

	}

}

 ?>