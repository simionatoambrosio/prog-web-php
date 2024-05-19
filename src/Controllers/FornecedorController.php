<?php

namespace Php\Primeiroprojeto\Controllers;

use Php\Primeiroprojeto\Models\DAO\FornecedorDAO;
use Php\Primeiroprojeto\Models\Domain\Fornecedor;

class FornecedorController {

    public function index($params) {
        $fornecedorDAO = new fornecedorDAO;
        $resultado = $fornecedorDAO->consultarTodos();
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

        require_once("../src/Views/fornecedor/fornecedor.php");
    }

    public function inserir($params) {
        require_once("../src/Views/fornecedor/inserir_fornecedor.html");
    }

    public function novo($params) {
        $fornecedor = new Fornecedor(0, $_POST["razaoSocial"], $_POST["cnpj"], $_POST["telefone"], $_POST["email"]);
        $fornecedorDAO = new FornecedorDAO();
        if ($fornecedorDAO->inserir($fornecedor)) {
            header("location: /fornecedor/inserir/true");
        }
        else {
            header("location: /fornecedor/inserir/false");
        }
    }

    public function alterar($params) {
        $fornecedorDAO = new FornecedorDAO();
        $resultado = $fornecedorDAO->consultar($params[1]);
        require_once("../src/Views/fornecedor/alterar_fornecedor.php");
    }

    public function excluir($params) {
        $fornecedorDAO = new FornecedorDAO();
        $resultado = $fornecedorDAO->consultar($params[1]);
        require_once("../src/Views/fornecedor/excluir_fornecedor.php");
    }

    public function editar($params) {
        $fornecedor = new Fornecedor($_POST['id'], $_POST["razao_social"], $_POST['cnpj'], $_POST['telefone'], $_POST['email']);
        $fornecedorDAO = new FornecedorDAO();
        if ($fornecedorDAO->alterar($fornecedor)) {
            header("location: /fornecedor/alterar/true");
        }
        else {
            header("location: /fornecedor/alterar/false");
        }
    }

    public function deletar($params) {
        $fornecedorDAO = new fornecedorDAO();
        if ($fornecedorDAO->excluir($_POST['id'])) {
            header("Location: /fornecedor/excluir/true");
        }
        else {
            header("Location: /fornecedor/excluir/false");
        }
    }

}



?>