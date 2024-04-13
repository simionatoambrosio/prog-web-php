<?php

namespace Php\Primeiroprojeto\Models\DAO;
use Php\Primeiroprojeto\Models\Domain\Despesa;

class DespesaDAO {

    private Conexao $conexao;

    public function __construct()
    {
        $this->conexao = new Conexao();
    }

    public function inserir(Despesa $despesa) {
        try {
            $sql = "INSERT INTO despesa (descricao, valor, data) VALUES (:descricao, :valor, :data)";
            // agora a variável PDO tá dentro do objeto conexão
            $p = $this->conexao->getConexao()->prepare($sql); // $p de prepare conexao
            $p->bindValue(":descricao", $despesa->getDescricao());
            $p->bindValue(":valor", $despesa->getValor());
            $p->bindValue(":data", $despesa->getData());
            return $p->execute();
        } catch (\Exception $e) {
            return 0;
        }
    }

}