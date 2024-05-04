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
            $sql = "INSERT INTO cliente (nome, cpf, telefone, email) VALUES (:nome, :cpf, :telefone, :email)";
            // agora a variável PDO tá dentro do objeto conexão
            $p = $this->conexao->getConexao()->prepare($sql); // $p de prepare conexao
            $p->bindValue(":nome", $cliente->getNome());
            $p->bindValue(":cpf", $cliente->getCpf());
            $p->bindValue(":telefone", $cliente->getTelefone());
            $p->bindValue(":email", $cliente->getEmail());
            return $p->execute();
        } catch (\Exception $e) {
            echo $e;
        }
    }

    
    public function alterar(Cliente $cliente) {
        try {
            $sql = "UPDATE cliente
                    SET nome = :nome,
                    cpf = :cpf,
                    telefone = :telefone,
                    email = :email 
                    WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":nome", $cliente->getNome());
            $p->bindValue(":cpf", $cliente->getCpf());
            $p->bindValue(":telefone", $cliente->getTelefone());
            $p->bindValue(":email", $cliente->getEmail());
            $p->bindValue(":id", $cliente->getId());
            return $p->execute();
        } catch (\Exception $e) {
            return 0;
        }
    }

    public function excluir($id) {
        try {
            $sql = "DELETE FROM cliente
                    WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            return $p->execute();
        } catch (\Exception $e) {
            return 0;
        }
    }

    public function consultarTodos() {
        try {
            $sql = "SELECT * FROM cliente";
            return $this->conexao->getConexao()->query($sql); // para retornar vários resultados
        } catch (\Exception $e) {
            return 0;
        }
    }

    public function consultar($id) {
        try {
            $sql = "SELECT * FROM cliente WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            $p->execute();
            return $p->fetch();
        } catch (\Exception $e) {
            return 0;
        }
    }

}