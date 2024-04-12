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

}