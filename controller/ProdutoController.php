<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Controller;

/**
 * Description of ProdutoController
 *
 * @author Henrique
 */

require_once '../dao/ProdutoDao.php';
use dao\ProdutoDao;
use model\Produto;


class ProdutoController {
    
    private $produtoDao = null;
    
    function __construct() {
        $this->produtoDao = new ProdutoDao();
    }
    
    public function excluir($id) {
        return $this->produtoDao->excluir($id);
        
    }
    
    public function listar($nome) {
        return $this->produtoDao->listar($nome);
    }

   
}
