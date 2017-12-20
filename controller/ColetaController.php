<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Controller;

require_once '../dao/ColetaDao.php';

use Dao\ColetaDao;



/**
 * Description of ColetaController
 *
 * @author Henrique
 */
class ColetaController {
    
    
       private $coletaDao;
    
    function __construct() {
        $this->coletaDao = new ColetaDao();
    }
    
    public function excluir($id){
        return $this->coletaDao->excluir($id);
    }
    
    public function buscar($id){
        return $this->coletaDao->buscar($id);
    }
    
    public function listar($nome){
        return $this->coletaDao->listar($nome);
    }
     
     public function salvar($dados){
        return $this->coletaDao->salvar($dados);
    }
   
}
