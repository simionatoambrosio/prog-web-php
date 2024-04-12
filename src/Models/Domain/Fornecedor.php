<?php

namespace Php\Primeiroprojeto\Models\Domain;

class Fornecedor {

    private $id;
    private $razaoSocial;
    private $cnpj;
    private $telefone;
    private $email;

    public function __construct($id, $razaoSocial, $cnpj, $telefone, $email)
    {
        $this->setId($id);
        $this->setRazaoSocial($razaoSocial);
        $this->setCnpj($cnpj);
        $this->setTelefone($telefone);
        $this->setEmail($email);
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getRazaoSocial() {
        return $this->razaoSocial;
    }

    public function setRazaoSocial($razaoSocial) {
        $this->razaoSocial = $razaoSocial;
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

    public function getCnpj() {
        return $this->cnpj;
    }

    public function setCnpj($cnpj) {
        $this->cnpj = $cnpj;
    }

}