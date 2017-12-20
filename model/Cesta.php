<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace model;
/**
 * Description of Cesta
 *
 * @author Henrique
 */
class Cesta {
    
    private $id;
    private $produto;
    private $tipo;
    private $cesta;
    private $qtde;
    
    function __construct($id, $produto, $tipo, $cesta, $qtde) {
        $this->id = $id;
        $this->produto = $produto;
        $this->tipo = $tipo;
        $this->cesta = $cesta;
        $this->qtde = $qtde;
    }


    function getId() {
        return $this->id;
    }

    function getProduto() {
        return $this->produto;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getCesta() {
        return $this->cesta;
    }

    function getQtde() {
        return $this->qtde;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setProduto($produto) {
        $this->produto = $produto;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setCesta($cesta) {
        $this->cesta = $cesta;
    }

    function setQtde($qtde) {
        $this->qtde = $qtde;
    }

 
    
   
}
