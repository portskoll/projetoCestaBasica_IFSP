<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Controller;

/**
 * Description of TipoControler
 *
 * @author Henrique
 */


require_once '../dao/TipoDao.php';
use Dao\TipoDao;
use model\Tipo;

class TipoController {
    
    private $tipoDao = null;
    
    function __construct() {
        $this->tipoDao = new TipoDao();
    }
    
    public function salvar(Tipo $tipo){
        return $this->tipoDao->salvar($tipo);
    }
    
    public function excluir($id){
        return $this->tipoDao->excluir($id);
    }
    
    public function buscar($id){
        return $this->tipoDao->buscar($id);
    }
    
    public function listar($nome){
        return $this->tipoDao->listar($nome);
    }
}

