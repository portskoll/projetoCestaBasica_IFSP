<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace dao;

/**
 * Description of MarcaDao
 *
 * @author Henrique
 */
require_once 'Conexao.php';
use model\Marca;
/**
 * Description of MarcaDao
 *
 * @author Administrador
 */
class MarcaDao extends Conexao {
    
    public function salvar(Marca $marca){
        parent::__construct();    // cria a conexao     
        $retorno = false;        
        try {
            $id = $marca->getId();
            $nome = $marca->getNome();
            // prepare sql and bind parameters
            if ($id == 0)
                $sql = "INSERT INTO Marca VALUES (0, '$nome')";
            else
                $sql = "UPDATE Marca set marca='$nome' WHERE cod_marca=$id";

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
            $sql = "DELETE FROM Marca WHERE cod_marca=$id";

            $retorno = $this->conn->query($sql);
        }
        catch(PDOException $e){
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
            $sql = "SELECT * FROM Marca WHERE marca like '%$nome%' ORDER BY marca";
            $result = $this->conn->query($sql);
            
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $lista[] = new Marca($row['cod_marca'], $row['marca']);
                }
            }
        }
        catch(PDOException $e){
            echo "<br />Erro: " . $e->getMessage();
        }

        $this->conn->close();    
        return $lista; 
    }

    public function buscar($id) {
        parent::__construct();
        $marca = null;
        try {
            // prepare sql and bind parameters
            $sql = "SELECT * FROM Marca WHERE cod_marca=$id";
            $result = $this->conn->query($sql);
            
            if ($row = $result->fetch_assoc()) {
                $marca = new Marca($row['cod_marca'], $row['marca']);
            }
        }
        catch(\Exception $e){
            echo "<br />Erro: " . $e->getMessage();
        }

        $this->conn->close();    
        return $marca; 
    }

}
