<?php

namespace Php\Primeiroprojeto\Models\DAO;
use Php\Primeiroprojeto\Models\Domain\Produto;

class ProdutoDAO {

    private Conexao $conexao;

    public function __construct()
    {
        $this->conexao = new Conexao();
    }

    public function inserir(Produto $produto) {
        try {
            $sql = "INSERT INTO produto (nome, valor, categoria) VALUES (:nome, :valor, :categoria)";
            // agora a variável PDO tá dentro do objeto conexão
            $p = $this->conexao->getConexao()->prepare($sql); // $p de prepare conexao
            $p->bindValue(":nome", $produto->getNome());
            $p->bindValue(":valor", $produto->getValor());
            $p->bindValue(":categoria", $produto->getCategoria());
            return $p->execute();
        } catch (\Exception $e) {
            echo $e;
        }
    }

}