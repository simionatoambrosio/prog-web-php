<?php

namespace Php\Primeiroprojeto\Models\Domain;

class Produto {

    private $id;
    private $nome;
    private $valor;
    private $categoria;

    public function __construct($id, $nome, $valor, $categoria)
    {
        $this->setId($id);
        $this->setNome($nome);
        $this->setValor($valor);
        $this->setCategoria($categoria);
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

    public function getCategoria() {
        return $this->categoria;
    }

    public function SetCategoria($categoria) {
        $this->categoria = $categoria;
    }

}