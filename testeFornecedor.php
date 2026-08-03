<?php

require_once "Fornecedor.php";

$fornecedor = new Fornecedor();


if($fornecedor->excluir(1)){

echo "Excluído";

}else{

echo "Erro";

}

?>