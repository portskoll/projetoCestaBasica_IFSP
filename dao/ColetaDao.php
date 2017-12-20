<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Dao;

/**
 * Description of ColetaDao
 *
 * @author Henrique
 */
require_once 'Conexao.php';
require_once '../model/Coleta.php';
use model\Coleta;



class ColetaDao  extends Conexao{
    
    public function salvar(Coleta $coleta){
        parent::__construct();
        
        $retorno = false;
        try {
            
// prepare sql and bind parameters
            $id = $coleta->getId();
            $nome = $coleta->getNome();
            $cidade = $coleta->getCidade();
            $status = $coleta->getStatus();
            $dataInicial = $coleta->getDataInicial();
            $dataFinal = $coleta->getDataFinal();
            
            if ($id == 0)                 
                $sql = "INSERT INTO Coleta VALUES (0,'$nome', '$cidade', $status, '$dataInicial','$dataFinal' )";
            else
                 $sql = "UPDATE Coleta SET nome='$nome', cidade='$cidade', status=$status, data_inicial='$dataInicial', data_final='$dataFinal' WHERE id=$id";
            
           
            $retorno = $this->conn->query($sql);
                
        }
        catch(PDOException $e){
            echo "<br />Erro: " . $e->getMessage();
        }

        $this->conn->close();     
        
        return $retorno;        
    }
    
    
     //excluir
    
        public function excluir($id){
        parent::__construct();    // cria a conexao     
        $retorno = false;        
        try {
            // prepare sql and bind parameters
            $sql = "DELETE FROM Coleta WHERE id=$id";

            $retorno = $this->conn->query($sql);
        }
        catch(PDOException $e){
            echo "<br />Erro: " . $e->getMessage();
        }

        $this->conn->close();         
        return $retorno;  
        
    }  
    
     // retorna um objeto buscando pelo id
    public function buscar($id) {
        parent::__construct();
        $coleta = null;
        try {
            // prepare sql and bind parameters
            $sql = "SELECT * FROM Coleta WHERE id=$id";
            $result = $this->conn->query($sql);
            
            if ($row = $result->fetch_assoc()) {
                $coleta = new Coleta($row['id'], $row['nome'], $row['cidade'],$row['status'],$row['data_inicial'],$row['data_final']);
            }
        }
        catch(PDOException $e){
            echo "<br />Erro: " . $e->getMessage();
        }

        $this->conn->close();    
        return $coleta; 
    }
    
      // retorna uma lista de objetos, buscando pelo nome
    public function listar($nome){
        parent::__construct();        
        
        $lista = array();
        
        try {
            // prepare sql and bind parameters
            $sql = "SELECT * FROM Coleta WHERE nome like '%$nome%' ORDER BY nome";
            $result = $this->conn->query($sql);
            
            if ($result->num_rows > 0) {
                
              
                while($row = $result->fetch_assoc()) {
                
                    $lista[] = new Coleta($row['id'], $row['nome'], $row['cidade'],$row['status'],$row['data_inicial'],$row['data_final']);
                }
            }
        }
        catch(PDOException $e){
            echo "<br />Erro: " . $e->getMessage();
        }

        $this->conn->close();    
        return $lista; 
    }
    
    
    
    
    
    
    
    
}
