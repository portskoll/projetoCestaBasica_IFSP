<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Controller;

/**
 * Description of MarcaControler
 *
 * @author Henrique
 */


require_once '../dao/MarcaDao.php';
use Dao\MarcaDao;
use model\Marca;

class MarcaController {
    
    private $marcaDao = null;
    
    function __construct() {
        $this->marcaDao = new MarcaDao();
    }
    
    public function salvar(Marca $marca){
        return $this->marcaDao->salvar($marca);
    }
    
    public function excluir($id){
        return $this->marcaDao->excluir($id);
    }
    
    public function buscar($id){
        return $this->marcaDao->buscar($id);
    }
    
    public function listar($nome){
        return $this->marcaDao->listar($nome);
    }
}

