<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace dao;

/**
 * Description of ProdutoDao
 *
 * @author Henrique
 */
require_once 'Conexao.php';

use model\Cockpit_lista;
use model\Cockpit_listaGeral;
use model\Cockpit_lista_variacao;
use model\Cockpit_mesA_mesB;

class Cockpit_listaDao extends Conexao{
    
    
   
    //busca a lista de filtros
    public function listarItens($item){
        parent::__construct();
        
        $lista = array();
       
        try {
            // prepare sql and bind parameters
            $sql = "SELECT $item FROM cockpit GROUP BY $item  ASC";
            $result = $this->conn->query($sql);
            
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $lista[] = new Cockpit_lista($row[$item]);
                    
                }
            }
        }
        catch(PDOException $e){
            echo "<br />Erro: " . $e->getMessage();
        }

        $this->conn->close();    
        return $lista; 
    }
    
    
    //busca a lista geral com filtros
    public function listarGeral($Produto, $TipoProduto, $Org,$Marca, $DataPesquisa, $Supermercado, $Referencia, $Cidade, $StatusColeta, $Usuario){
        parent::__construct();
        
        $lista = array();
       
        try {
            // prepare sql and bind parameters
            $sql = "SELECT * FROM cockpit WHERE Produto LIKE '%$Produto%' AND TipoProduto LIKE '%$TipoProduto%' AND Org LIKE '%$Org%' AND `Marca` LIKE '%$Marca%' AND `DataPesquisa` LIKE '%$DataPesquisa%' AND Supermercado LIKE '%$Supermercado%' AND Referencia LIKE '%$Referencia%' AND Cidade LIKE '%$Cidade%' AND StatusColeta LIKE '%$StatusColeta%' AND Usuario LIKE '%$Usuario%'";
            $result = $this->conn->query($sql);
           
            if ($result->num_rows > 0) {
              
                while($row = $result->fetch_assoc()) {
                   
                    
                    $lista[] = new Cockpit_listaGeral($row['Cod'], $row['Produto'], $row['TipoProduto'], $row['Org'], $row['ValorItem'], $row['Marca'], $row['DataPesquisa'], $row['Supermercado'], $row['Referencia'], $row['Cidade'], $row['StatusColeta'], $row['Usuario']);
                    
                    
                }
            }
        }
        catch(PDOException $e){
            echo "<br />Erro: " . $e->getMessage();
        }

        $this->conn->close();    
        return $lista; 
    }
    
    
        //busca a lista Media, max, min, variacao
    public function listarVariacao($supermercado,$org,$referencia,$cidade,$marca){
        parent::__construct();
        
        $lista = array();
       
        try {
            // prepare sql and bind parameters
            $sql = "SELECT  Produto ,format(AVG(ValorItem),2,'de_DE') AS Media,format(MIN(ValorItem),2,'de_DE') as ValorMinimo, format(MAX(ValorItem),2,'de_DE') as ValorMaximo, format((MAX(ValorItem) - MIN(ValorItem)),2,'de_DE') as Variacao FROM cockpit WHERE Supermercado like '%$supermercado%' AND Org LIKE '%$org%' AND Referencia LIKE '%$referencia%' AND Cidade LIKE '%$cidade%' AND Marca LIKE '%$marca%' GROUP by Produto;";
            
            $result = $this->conn->query($sql);
           
            if ($result->num_rows > 0) {
              
                while($row = $result->fetch_assoc()) {
                   
                    
                    $lista[] = new Cockpit_lista_variacao($row['Produto'],$row['Media'],$row['ValorMinimo'],$row['ValorMaximo'],$row['Variacao']);
                    
                    
                }
            }
        }
        catch(PDOException $e){
            echo "<br />Erro: " . $e->getMessage();
        }

        $this->conn->close();    
        return $lista; 
    }
    
    
     //busca a lista produto, mes_a, nes_b
    public function listarInflacao($supermercado,$org,$cidade,$ano,$m_a,$m_b){
        parent::__construct();
        $lista = array();
        try {
            // prepare sql and bind parameters
            $sql = "SELECT a.Produto as Produto, AVG(b.ValorItem) as Mes_a, AVG(c.ValorItem) as Mes_b from cockpit a LEFT JOIN cockpit b on (a.Produto = b.Produto and b.Referencia like '%$m_a%') LEFT JOIN cockpit c on (a.Produto = c.Produto and c.Referencia like '%$m_b%') WHERE a.Cidade LIKE '%$cidade%' AND a.Org LIKE '%$org%' AND a.SuperMercado LIKE '%$supermercado%' and Year(a.DataPesquisa) = $ano GROUP by a.Produto";
            
            $result = $this->conn->query($sql);
           
            if ($result->num_rows > 0) {
              
                while($row = $result->fetch_assoc()) {
                   
                    $lista[] = new Cockpit_mesA_mesB($row['Produto'],$row['Mes_a'],$row['Mes_b']);
                    
                    
                }
            }
        }
        catch(PDOException $e){
            echo "<br />Erro: " . $e->getMessage();
        }

        $this->conn->close();    
        return $lista; 
    }
    
 
    
    
//``, ``, ``, ``, ``, ``, ``, ``, ``, ``, ``, ``



//$Produto, $TipoProduto, $Org,$Marca, $DataPesquisa, $Supermercado, $Referencia, $Cidade, $StatusColeta, $Usuario
    
    
    
}
