<?php

namespace Php\Primeiroprojeto\Controllers;

use Php\Primeiroprojeto\Models\DAO\DespesaDAO;
use Php\Primeiroprojeto\Models\Domain\Despesa;

class DespesaController {

    public function index($params) {
        $despesaDAO = new DespesaDAO;
        $resultado = $despesaDAO->consultarTodos();
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

        require_once("../src/Views/despesa/despesa.php");
    }

    public function inserir($params) {
        require_once("../src/Views/despesa/inserir_despesa.html");
    }

    public function novo($params) {
        $despesa = new Despesa(0, $_POST["descricao"], $_POST["valor"], $_POST["data"]);
        $despesaDAO = new DespesaDAO();
        if ($despesaDAO->inserir($despesa)) {
            header("location: /despesa/inserir/true");
        }
        else {
            header("location: /despesa/inserir/false");
        }
    }

    
    public function alterar($params) {
        $despesaDAO = new DespesaDAO();
        $resultado = $despesaDAO->consultar($params[1]);
        require_once("../src/Views/despesa/alterar_despesa.php");
    }

    public function excluir($params) {
        $despesaDAO = new DespesaDAO();
        $resultado = $despesaDAO->consultar($params[1]);
        require_once("../src/Views/despesa/excluir_despesa.php");
    }

    public function editar($params) {
        $despesa = new Despesa($_POST['id'], $_POST["descricao"], $_POST['valor'], $_POST['data']);
        $despesaDAO = new DespesaDAO();
        if ($despesaDAO->alterar($despesa)) {
            header("location: /despesa/alterar/true");
        }
        else {
            header("location: /despesa/alterar/false");
        }
    }

    public function deletar($params) {
        $despesaDAO = new DespesaDAO();
        if ($despesaDAO->excluir($_POST['id'])) {
            header("Location: /despesa/excluir/true");
        }
        else {
            header("Location: /despesa/excluir/false");
        }
    }

}

?>