<?php

namespace Php\Primeiroprojeto\Models\Domain;

class Cliente {

    private $id;
    private $nome;
    private $telefone;
    private $email;

    public function __construct($id, $nome, $telefone, $email)
    {
        $this->setId($id);
        $this->setNome($nome);
        $this->setTelefone($telefone);
        $this->setEmail($email);
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

}