<?php

namespace Php\Primeiroprojeto\Controllers;

use Php\Primeiroprojeto\Models\DAO\ProdutoDAO;
use Php\Primeiroprojeto\Models\Domain\Produto;

class ProdutoController {
    public function inserir($params) {
        require_once("../src/Views/produto/inserir_produto.html");
    }

    public function novo($params) {
        $produto = new Produto(0, $_POST["nome"], $_POST["valor"], $_POST["categoria"]);
        $produtoDAO = new ProdutoDAO();
        if ($produtoDAO->inserir($produto)) {
            return "Inserido com sucesso!";
        }
        else {
            return "Erro ao inserir!";
        }
    }

}



?>