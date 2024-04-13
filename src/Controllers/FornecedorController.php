<?php

namespace Php\Primeiroprojeto\Controllers;

use Php\Primeiroprojeto\Models\DAO\FornecedorDAO;
use Php\Primeiroprojeto\Models\Domain\Fornecedor;

class FornecedorController {
    public function inserir($params) {
        require_once("../src/Views/fornecedor/inserir_fornecedor.html");
    }

    public function novo($params) {
        $fornecedor = new Fornecedor(0, $_POST["razaoSocial"], $_POST["cnpj"], $_POST["telefone"], $_POST["email"]);
        $fornecedorDAO = new FornecedorDAO();
        if ($fornecedorDAO->inserir($fornecedor)) {
            return "Inserido com sucesso!";
        }
        else {
            return "Erro ao inserir!";
        }
    }

}



?>