<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mensagem
 *
 * @author Henrique
 */
namespace Model;

class Mensagem {
    
    private $id;
    private $mensagemTexto;
    private $supermercado;
    private $coleta;
    private $usuarioC;
   
    function __construct($id, $mensagemTexto, $supermercado, $coleta, $usuarioC) {
        $this->id = $id;
        $this->mensagemTexto = $mensagemTexto;
        $this->supermercado = $supermercado;
        $this->coleta = $coleta;
        $this->usuarioC = $usuarioC;
    }

    
    function getId() {
        return $this->id;
    }

    function getMensagemTexto() {
        return $this->mensagemTexto;
    }

    function getSupermercado() {
        return $this->supermercado;
    }

    function getColeta() {
        return $this->coleta;
    }

    function getUsuarioC() {
        return $this->usuarioC;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setMensagemTexto($mensagemTexto) {
        $this->mensagemTexto = $mensagemTexto;
    }

    function setSupermercado($supermercado) {
        $this->supermercado = $supermercado;
    }

    function setColeta($coleta) {
        $this->coleta = $coleta;
    }

    function setUsuarioC($usuarioC) {
        $this->usuarioC = $usuarioC;
    }


    
    
    
}
