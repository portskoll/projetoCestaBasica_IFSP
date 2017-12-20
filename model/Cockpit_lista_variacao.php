<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace model;

/**
 * Description of Cockpit_lista_variacao
 *
 * @author Henrique
 */
class Cockpit_lista_variacao {
   
    private $produto;
    private $media;
    private $valorMinimo;
    private $valorMaximo;
    private $variacao;
    
    function __construct($produto, $media, $valorMinimo, $valorMaximo, $variacao) {
        $this->produto = $produto;
        $this->media = $media;
        $this->valorMinimo = $valorMinimo;
        $this->valorMaximo = $valorMaximo;
        $this->variacao = $variacao;
    }
    
    function getProduto() {
        return $this->produto;
    }

    function getMedia() {
        return $this->media;
    }

    function getValorMinimo() {
        return $this->valorMinimo;
    }

    function getValorMaximo() {
        return $this->valorMaximo;
    }

    function getVariacao() {
        return $this->variacao;
    }

    function setProduto($produto) {
        $this->produto = $produto;
    }

    function setMedia($media) {
        $this->media = $media;
    }

    function setValorMinimo($valorMinimo) {
        $this->valorMinimo = $valorMinimo;
    }

    function setValorMaximo($valorMaximo) {
        $this->valorMaximo = $valorMaximo;
    }

    function setVariacao($variacao) {
        $this->variacao = $variacao;
    }





    
    
    
}
