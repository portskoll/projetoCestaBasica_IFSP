<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UsuarioController
 *
 * @author Henrique
 * 
 *  
 */

namespace Controller;

require_once '../dao/UsuarioDao.php';

use Dao\UsuarioDao;

class UsuarioController {
    
    private $usuarioDao;
    
    function __construct() {
        $this->usuarioDao = new UsuarioDao();
    }
    
    
    public function excluir($id){
        return $this->usuarioDao->excluir($id);
    }
    
    public function buscar($id){
        return $this->usuarioDao->buscar($id);
    }
    
    public function listar($nome){
        return $this->usuarioDao->listar($nome);
    }

    public function listarPorTipo($tipo) {
        $lista = array();
        foreach ($this->usuarioDao->listar("") as $usuario){
            if ($usuario->getTipo()->getId()==$tipo)
                $lista[] = $usuario;
        }
        return $lista;
    }

    
    
     public function salvar($dados){
        return $this->usuarioDao->salvar($dados);
    }
    
     public function login($email, $senha) {
        return $this->usuarioDao->login($email, $senha);
    }
   
}
