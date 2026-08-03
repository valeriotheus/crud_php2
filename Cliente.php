<?php

require_once "conexao.php";

class Cliente{

    private $conexao;

    public function __construct(){

        $db = new Conexao();

        $this->conexao = $db->conectar();

    }

    public function inserir($dados){

$sql="INSERT INTO cliente(nome,email,telefone)

VALUES(:nome,:email,:telefone)";

$stmt=$this->conexao->prepare($sql);

$stmt->bindValue(":nome",$dados["nome"]);

$stmt->bindValue(":email",$dados["email"]);

$stmt->bindValue(":telefone",$dados["telefone"]);

return $stmt->execute();

}

public function alterar($dados){

$sql="UPDATE cliente

SET

nome=:nome,

email=:email,

telefone=:telefone

WHERE id=:id";

$stmt=$this->conexao->prepare($sql);

$stmt->bindValue(":id",$dados["id"]);

$stmt->bindValue(":nome",$dados["nome"]);

$stmt->bindValue(":email",$dados["email"]);

$stmt->bindValue(":telefone",$dados["telefone"]);

return $stmt->execute();

}

public function excluir($id){

$sql="DELETE FROM cliente

WHERE id=:id";

$stmt=$this->conexao->prepare($sql);

$stmt->bindValue(":id",$id);

return $stmt->execute();

}

public function listarSemProcedure(){

$sql="SELECT * FROM cliente";

$stmt=$this->conexao->prepare($sql);

$stmt->execute();

return $stmt->fetchAll(PDO::FETCH_ASSOC);

}

public function consultarPorID($id){

$sql="SELECT * FROM cliente

WHERE id=:id";

$stmt=$this->conexao->prepare($sql);

$stmt->bindValue(":id",$id);

$stmt->execute();

return $stmt->fetch(PDO::FETCH_ASSOC);

}

public function crudPHP($acao,$dados){

switch($acao){

case "inserir":

return $this->inserir($dados);

break;

case "alterar":

return $this->alterar($dados);

break;

case "excluir":

return $this->excluir($dados["id"]);

break;

}

}

}

?>