<?php

require_once "Cliente.php";

$cliente = new Cliente();


$dados = [

    "id" => 9

];


$resultado = $cliente->crudPHP("excluir",$dados);


if($resultado){

    echo "Excluído pelo crudPHP";

}else{

    echo "Erro ao excluir";

}

?>