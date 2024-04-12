<?php

namespace Php\Primeiroprojeto\Models\Domain;

class Produto {

    private $id;
    private $nome;
    private $valor;
    private $id_categoria;

    public function __construct($id, $nome, $valor, $id_categoria)
    {
        $this->setId($id);
        $this->setNome($nome);
        $this->setValor($valor);
        $this->setIdCategoria($id_categoria);
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

    public function getValor() {
        return $this->valor;
    }

    public function setValor($valor) {
        $this->valor = $valor;
    }

    public function getIdCategoria() {
        return $this->id_categoria;
    }

    public function SetIdCategoria($id_categoria) {
        $this->id_categoria = $id_categoria;
    }

}