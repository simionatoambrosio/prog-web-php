<?php

namespace Php\Primeiroprojeto\Controllers;

use Php\Primeiroprojeto\Models\DAO\ProdutoDAO;
use Php\Primeiroprojeto\Models\Domain\Produto;

class ProdutoController {

    public function index($params) {
        $produtoDAO = new produtoDAO;
        $resultado = $produtoDAO->consultarTodos();
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

        require_once("../src/Views/produto/produto.php");
    }

    public function inserir($params) {
        require_once("../src/Views/produto/inserir_produto.html");
    }

    public function novo($params) {
        $produto = new Produto(0, $_POST["nome"], $_POST["valor"], $_POST["categoria"]);
        $produtoDAO = new ProdutoDAO();
        if ($produtoDAO->inserir($produto)) {
            header("location: /produto/inserir/true");
        }
        else {
            header("location: /produto/inserir/false");
        }
    }

    public function alterar($params) {
        $produtoDAO = new ProdutoDAO();
        $resultado = $produtoDAO->consultar($params[1]);
        require_once("../src/Views/produto/alterar_produto.php");
    }

    public function excluir($params) {
        $produtoDAO = new ProdutoDAO();
        $resultado = $produtoDAO->consultar($params[1]);
        require_once("../src/Views/produto/excluir_produto.php");
    }

    public function editar($params) {
        $produto = new Produto($_POST['id'], $_POST["nome"], $_POST['valor'], $_POST['categoria']);
        $produtoDAO = new ProdutoDAO();
        if ($produtoDAO->alterar($produto)) {
            header("location: /produto/alterar/true");
        }
        else {
            header("location: /produto/alterar/false");
        }
    }

    public function deletar($params) {
        $produtoDAO = new ProdutoDAO();
        if ($produtoDAO->excluir($_POST['id'])) {
            header("Location: /produto/excluir/true");
        }
        else {
            header("Location: /produto/excluir/false");
        }
    }

}



?>