<?php

namespace Php\Primeiroprojeto\Models\Domain;

class Despesa {

    private $id;
    private $descricao;
    private $valor;
    private $data;

    public function __construct($id, $descricao, $valor, $data)
    {
        $this->setId($id);
        $this->setDescricao($descricao);
        $this->setValor($valor);
        $this->setData($data);
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function getValor() {
        return $this->valor;
    }

    public function setValor($valor) {
        $this->valor = $valor;
    }

    public function getData() {
        return $this->data;
    }

    public function setData($data) {
        $this->data = $data;
    }

}