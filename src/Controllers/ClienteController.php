<?php

namespace Php\Primeiroprojeto\Controllers;

use Php\Primeiroprojeto\Models\DAO\ClienteDAO;
use Php\Primeiroprojeto\Models\Domain\Cliente;

class ClienteController {
    public function inserir($params) {
        require_once("../src/Views/cliente/inserir_cliente.html");
    }

    public function novo($params) {
        $cliente = new Cliente(0, $_POST["nome"], $_POST["cpf"], $_POST["telefone"], $_POST["email"]);
        $clienteDAO = new ClienteDAO();
        if ($clienteDAO->inserir($cliente)) {
            return "Inserido com sucesso!";
        }
        else {
            return "Erro ao inserir!";
        }
    }

}
?>