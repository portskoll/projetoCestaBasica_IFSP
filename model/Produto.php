<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace model;

/**
 * Description of Produto
 *
 * @author Henrique
 */
class Produto {

    private $id;
    private $urlFoto;
    private $produto;
    private $marca;
    private $usuario;

    function __construct($id, $urlFoto, $produto, $marca, $usuario) {
        $this->id = $id;
        $this->urlFoto = $urlFoto;
        $this->produto = $produto;
        $this->marca = $marca;
        $this->usuario = $usuario;
    }
    
    function getId() {
        return $this->id;
    }

    function getUrlFoto() {
        return $this->urlFoto;
    }

    function getProduto() {
        return $this->produto;
    }

    function getMarca() {
        return $this->marca;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setUrlFoto($urlFoto) {
        $this->urlFoto = $urlFoto;
    }

    function setProduto($produto) {
        $this->produto = $produto;
    }

    function setMarca($marca) {
        $this->marca = $marca;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }



}
