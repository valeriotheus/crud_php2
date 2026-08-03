<?php

class Conexao{

    private $host="localhost";
    private $banco="crudphp";
    private $usuario="root";
    private $senha="";

    public function conectar(){

        try{

            $pdo = new PDO(
                "mysql:host=".$this->host.";dbname=".$this->banco,
                $this->usuario,
                $this->senha
            );

            $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            return $pdo;

        }catch(PDOException $e){

            die($e->getMessage());

        }

    }

}

?>