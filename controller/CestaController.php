<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Controller;

/**
 * Description of CestaControler
 *
 * @author Henrique
 */


require_once '../dao/CestaDao.php';
use Dao\CestaDao;
use model\Cesta;

class CestaController {
    
    private $cestaDao = null;
    
    function __construct() {
        $this->cestaDao = new CestaDao();
    }
    
    public function salvar(Cesta $cesta){
        return $this->cestaDao->salvar($cesta);
    }
    
    public function excluir($id){
        return $this->cestaDao->excluir($id);
    }
    
    public function buscar($id){
        return $this->cestaDao->buscar($id);
    }
    
    public function listar($nome){
        return $this->cestaDao->listar($nome);
    }
    
     public function listarPorTipo($nome){
        return $this->cestaDao->listarPorTipo($nome);
    }
    
  
}

