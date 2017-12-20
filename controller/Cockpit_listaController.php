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

require_once '../dao/Cockpit_listaDao.php';
use dao\Cockpit_listaDao;



class Cockpit_listaController {
    
    private $cockpit_listaDao = null;
    
    
   
    
    function __construct() {
        $this->cockpit_listaDao = new Cockpit_listaDao();
    }
    
       
    public function listarItens($item) {
        return $this->cockpit_listaDao->listarItens($item);
    }

   
    public function listarGeral($Produto, $TipoProduto, $Org,$Marca, $DataPesquisa, $Supermercado, $Referencia, $Cidade, $StatusColeta, $Usuario) {
        return $this->cockpit_listaDao->listarGeral($Produto, $TipoProduto, $Org,$Marca, $DataPesquisa, $Supermercado, $Referencia, $Cidade, $StatusColeta, $Usuario);
    }
    
    public function listarVariacao($supermercado,$org,$referencia,$cidade,$marca){
        return $this->cockpit_listaDao->listarVariacao($supermercado, $org, $referencia, $cidade, $marca);
    }
    
     public function listarInflacao($supermercado,$org,$cidade,$ano,$m_a,$m_b){
        return $this->cockpit_listaDao->listarInflacao($supermercado, $org, $cidade, $ano,$m_a,$m_b);
    }
}



