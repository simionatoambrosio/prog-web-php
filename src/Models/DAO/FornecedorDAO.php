<?php

namespace Php\Primeiroprojeto\Models\DAO;
use Php\Primeiroprojeto\Models\Domain\Fornecedor;

class FornecedorDAO {

    private Conexao $conexao;

    public function __construct()
    {
        $this->conexao = new Conexao();
    }

    public function inserir(Fornecedor $fornecedor) {
        try {
            $sql = "INSERT INTO fornecedor (razao_social, cnpj, telefone, email) VALUES (:razaoSocial, :cnpj, :telefone, :email)";
            // agora a variável PDO tá dentro do objeto conexão
            $p = $this->conexao->getConexao()->prepare($sql); // $p de prepare conexao
            $p->bindValue(":razaoSocial", $fornecedor->getRazaoSocial());
            $p->bindValue(":cnpj", $fornecedor->getCnpj());
            $p->bindValue(":telefone", $fornecedor->getTelefone());
            $p->bindValue(":email", $fornecedor->getEmail());
            return $p->execute();
        } catch (\Exception $e) {
            echo $e;
        }
    }

    public function alterar(Fornecedor $fornecedor) {
        try {
            $sql = "UPDATE fornecedor
                    SET razao_social = :razao_social,
                    cnpj = :cnpj,
                    telefone = :telefone,
                    email = :email
                    WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":razao_social", $fornecedor->getRazaoSocial());
            $p->bindValue(":cnpj", $fornecedor->getCnpj());
            $p->bindValue(":telefone", $fornecedor->getTelefone());
            $p->bindValue(":email", $fornecedor->getEmail());
            $p->bindValue(":id", $fornecedor->getId());
            return $p->execute();
        } catch (\Exception $e) {
            return 0;
        }
    }

    public function excluir($id) {
        try {
            $sql = "DELETE FROM fornecedor
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
            $sql = "SELECT * FROM fornecedor";
            return $this->conexao->getConexao()->query($sql); // para retornar vários resultados
        } catch (\Exception $e) {
            return 0;
        }
    }

    public function consultar($id) {
        try {
            $sql = "SELECT * FROM fornecedor WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            $p->execute();
            return $p->fetch();
        } catch (\Exception $e) {
            return 0;
        }
    }

}