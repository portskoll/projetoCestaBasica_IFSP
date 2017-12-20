<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Controller;

/**
 * Description of SupermercadoController
 *
 * @author Henrique
 */
require_once '../dao/SupermercadoDao.php';
use Dao\SupermercadoDao;
use model\Supermercado;

class SupermercadoController {
    
    private $supermercadoDao = null;
    
    function __construct() {
        $this->supermercadoDao = new SupermercadoDao();
    }
    
    public function salvar(Supermercado $supermercado){
        return $this->supermercadoDao->salvar($supermercado);
    }
    
    public function excluir($id){
        return $this->supermercadoDao->excluir($id);
    }
    
    public function buscar($id){
        return $this->supermercadoDao->buscar($id);
    }
    
    public function listar($nome){
        return $this->supermercadoDao->listar($nome);
    }
}