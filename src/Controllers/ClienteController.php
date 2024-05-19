<?php

namespace Php\Primeiroprojeto\Controllers;

use Php\Primeiroprojeto\Models\DAO\ClienteDAO;
use Php\Primeiroprojeto\Models\Domain\Cliente;

class ClienteController {

    public function index($params) {
        $clienteDAO = new ClienteDAO;
        $resultado = $clienteDAO->consultarTodos();
        $acao = $params[1] ?? "";
        $status = $params[2] ?? "";

        if ($acao == "inserir" && $status == "true") {
            $mensagem = "Registro inserido com sucesso!";
        }
        else if ($acao == "inserir" && $status == "false") {
            $mensagem = "Erro ao inserir!";
        }
        else if ($acao == "alterar" && $status == "true") {
            $mensagem = "Registro alterado com sucesso!";
        }
        else if ($acao == "alterar" && $status == "false") {
            $mensagem = "Erro ao alterar!";
        }
        else if ($acao == "excluir" && $status == "true") {
            $mensagem = "Registro excluído com sucesso!";
        }
        else if ($acao == "excluir" && $status == "false") {
            $mensagem = "Erro ao excluído!";
        }
        else {
            $mensagem = "";
        }

        require_once("../src/Views/cliente/cliente.php");
    }

    public function inserir($params) {
        require_once("../src/Views/cliente/inserir_cliente.html");
    }

    public function novo($params) {
        $cliente = new Cliente(0, $_POST["nome"], $_POST["cpf"], $_POST["telefone"], $_POST["email"]);
        $clienteDAO = new ClienteDAO();
        if ($clienteDAO->inserir($cliente)) {
            header("location: /cliente/inserir/true");
        }
        else {
            header("location: /cliente/inserir/false");
        }
    }

    public function alterar($params) {
        $clienteDAO = new ClienteDAO();
        $resultado = $clienteDAO->consultar($params[1]);
        require_once("../src/Views/cliente/alterar_cliente.php");
    }

    public function excluir($params) {
        $clienteDAO = new ClienteDAO();
        $resultado = $clienteDAO->consultar($params[1]);
        require_once("../src/Views/cliente/excluir_cliente.php");
    }

    public function editar($params) {
        $cliente = new Cliente($_POST['id'], $_POST["nome"], $_POST['cpf'], $_POST['telefone'], $_POST['email']);
        $clianteDAO = new ClienteDAO;
        if ($clianteDAO->alterar($cliente)) {
            header("location: /cliente/alterar/true");
        }
        else {
            header("location: /cliente/alterar/false");
        }
    }

    public function deletar($params) {
        $clienteDAO = new ClienteDAO;
        if ($clienteDAO->excluir($_POST['id'])) {
            header("Location: /cliente/excluir/true");
        }
        else {
            header("Location: /cliente/excluir/false");
        }
    }

}
?>