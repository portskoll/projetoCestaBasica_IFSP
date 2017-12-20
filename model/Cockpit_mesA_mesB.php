<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace model;
/**
 * Description of Cockpit_mesA_mesB
 *
 * @author Henrique
 */
class Cockpit_mesA_mesB {
   
    private $produto;
    private $mes_a;
    private $mes_b;
    
    function __construct($produto, $mes_a, $mes_b) {
        $this->produto = $produto;
        $this->mes_a = $mes_a;
        $this->mes_b = $mes_b;
    }
    
    function getProduto() {
        return $this->produto;
    }

    function getMes_a() {
        return $this->mes_a;
    }

    function getMes_b() {
        return $this->mes_b;
    }

    function setProduto($produto) {
        $this->produto = $produto;
    }

    function setMes_a($mes_a) {
        $this->mes_a = $mes_a;
    }

    function setMes_b($mes_b) {
        $this->mes_b = $mes_b;
    }



    
}
