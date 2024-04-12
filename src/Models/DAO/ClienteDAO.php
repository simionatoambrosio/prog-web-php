<?php

namespace Php\Primeiroprojeto\Models\DAO;
use Php\Primeiroprojeto\Models\Domain\Cliente;

class ClienteDAO {

    private Conexao $conexao;

    public function __construct()
    {
        $this->conexao = new Conexao();
    }

    public function inserir(Cliente $cliente) {
        try {
            $sql = "INSERT INTO cliente (nome, telefone, email) VALUES (:nome, :telefone, :email)";
            // agora a variável PDO tá dentro do objeto conexão
            $p = $this->conexao->getConexao()->prepare($sql); // $p de prepare conexao
            $p->bindValue(":nome", $cliente->getNome());
            $p->bindValue(":telefone", $cliente->getTelefone());
            $p->bindValue(":email", $cliente->getEmail());
            return $p->execute();
        } catch (\Exception $e) {
            echo $e;
        }
    }

}