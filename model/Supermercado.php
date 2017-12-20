<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace model;

/**
 * Description of Supermercado
 *
 * @author Henrique
 */
class Supermercado {
    
    private $id;
    private $nome;
    private $endereco;
    private $url_foto_smercado;
    
    function __construct($id, $nome, $endereco, $url_foto_smercado) {
        $this->id = $id;
        $this->nome = $nome;
        $this->endereco = $endereco;
        $this->url_foto_smercado = $url_foto_smercado;
    }

    
    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getEndereco() {
        return $this->endereco;
    }

    function getUrl_foto_smercado() {
        return $this->url_foto_smercado;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    function setUrl_foto_smercado($url_foto_smercado) {
        $this->url_foto_smercado = $url_foto_smercado;
    }


    

}
