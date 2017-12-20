<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Controller;

/**
 * Description of MensagemController
 *
 * @author Henrique
 */

require_once '../dao/MensagemDao.php';
use Dao\MensagemDao;

class MensagemController {
   
    private $mensagemDao;
    
    function __construct() {
        $this->mensagemDao = new MensagemDao();
    }
    
    public function excluir($id){
        return $this->mensagemDao->excluir($id);
    }
    
    public function buscar($id){
        return $this->mensagemDao->buscar($id);
    }
    
    public function listar($mensagem){
        return $this->mensagemDao->listar($mensagem);
    }
    
       
    public function salvar($dados){
        return $this->mensagemDao->salvar($dados);
    }
  
}
