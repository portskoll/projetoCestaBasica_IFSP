<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Dao;

/**
 * Description of SupermercadoDao
 *
 * @author Henrique
 */


require_once '../dao/Conexao.php';
use model\Supermercado;


class SupermercadoDao extends Conexao{
    
    public function salvar(Supermercado $supermercado){
        parent::__construct();    // cria a conexao     
        
        
        $retorno = false;        
        try {
            $id = $supermercado->getId();
            $nome = $supermercado->getNome();
            $endereco = $supermercado->getEndereco();
            $img = $supermercado->getUrl_foto_smercado();
           
            
            // prepare sql and bind parameters
            if ($id == 0){
                
                $sql = "INSERT INTO SuperMercado VALUES (0,'$nome','$endereco','$img')";
            }
                
            else{
                $sql = "UPDATE SuperMercado set nome='$nome',endereco = '$endereco' , url_foto_smercado='$img'  WHERE id=$id";
            }
                

            $retorno = $this->conn->query($sql);
        }
        catch(PDOException $e){
            echo "<br />Erro: " . $e->getMessage();
        }

        $this->conn->close();         
        return $retorno;        
    }
    
    public function excluir($id){
        parent::__construct();    // cria a conexao     
        $retorno = false;        
        try {
            // prepare sql and bind parameters
            $sql = "DELETE FROM SuperMercado WHERE id=$id";

            $retorno = $this->conn->query($sql);
        }
        catch(Exception $e){
            echo "<br />Erro: " . $e->getMessage();
        }

        $this->conn->close();         
        return $retorno;  
    }
    
    public function listar($nome){
        parent::__construct();
        
        $lista = array();
        
        try {
            // prepare sql and bind parameters
            $sql = "SELECT * FROM SuperMercado WHERE nome like '%$nome%' ORDER BY nome";
            $result = $this->conn->query($sql);
            
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $lista[] = new Supermercado($row['id'], $row['nome'],$row['endereco'] ,$row['url_foto_smercado']);
                }
            }
        }
        catch(Exception $e){
            echo "<br />Erro: " . $e->getMessage();
        }

        $this->conn->close();    
        return $lista; 
    }

    public function buscar($id) {
        parent::__construct();
        $supermercado = null;
        try {
            // prepare sql and bind parameters
            $sql = "SELECT * FROM SuperMercado WHERE id=$id";
            $result = $this->conn->query($sql);
            
            if ($row = $result->fetch_assoc()) {
                $supermercado =  new Supermercado($row['id'], $row['nome'],$row['endereco'] ,$row['url_foto_smercado']);
            }
        }
        catch(\Exception $e){
            echo "<br />Erro: " . $e->getMessage();
        }

        $this->conn->close();    
        return $supermercado; 
    }
   
}
