<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Coleta
 *
 * @author Henrique
 */

namespace model;


class Coleta {
   
    private $id;
    private $nome;
    private $cidade;
    private $status;
    private $dataInicial;
    private $dataFinal;
    
    function __construct($id, $nome, $cidade, $status, $dataInicial, $dataFinal) {
        $this->id = $id;
        $this->nome = $nome;
        $this->cidade = $cidade;
        $this->status = $status;
        $this->dataInicial = $dataInicial;
        $this->dataFinal = $dataFinal;
    }

    
    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getCidade() {
        return $this->cidade;
    }

    function getStatus() {
        return $this->status;
    }

    function getDataInicial() {
        return $this->dataInicial;
    }

    function getDataFinal() {
        return $this->dataFinal;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    function setDataInicial($dataInicial) {
        $this->dataInicial = $dataInicial;
    }

    function setDataFinal($dataFinal) {
        $this->dataFinal = $dataFinal;
    }


    
}
