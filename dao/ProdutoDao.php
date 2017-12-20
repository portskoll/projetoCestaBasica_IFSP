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

use model\Produto;

class ProdutoDao extends Conexao{
    
    
    public function excluir($id){
        parent::__construct();    // cria a conexao     
        $retorno = false;        
        try {
            // prepare sql and bind parameters
            $sql = "DELETE FROM Nprodutos WHERE codProduto=$id";

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
            $sql = "SELECT * FROM CadProduto WHERE produto like '%$nome%' ORDER BY produto";
            $result = $this->conn->query($sql);
            
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $lista[] = new Produto($row['id'], $row['foto'], $row['produto'], $row['marca'],$row['usuario']);
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
