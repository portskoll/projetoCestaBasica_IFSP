<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Dao;

/**
 * Description of TipoDao
 *
 * @author Henrique
 */
require_once 'Conexao.php';
use model\Tipo;
/**
 * Description of TipoDao
 *
 * @author Administrador
 */
class TipoDao extends Conexao {
    
    public function salvar(Tipo $tipo){
        parent::__construct();    // cria a conexao     
        $retorno = false;        
        try {
            $id = $tipo->getId();
            $nome = $tipo->getNome();
            // prepare sql and bind parameters
            if ($id == 0)
                $sql = "INSERT INTO Tipo VALUES (0, '$nome')";
            else
                $sql = "UPDATE Tipo set tipo='$nome' WHERE id=$id";

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
            $sql = "DELETE FROM Tipo WHERE id=$id";

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
            $sql = "SELECT * FROM Tipo WHERE tipo like '%$nome%' ORDER BY tipo";
            $result = $this->conn->query($sql);
            
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $lista[] = new Tipo($row['id'], $row['tipo']);
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
        $tipo = null;
        try {
            // prepare sql and bind parameters
            $sql = "SELECT * FROM Tipo WHERE id=$id";
            $result = $this->conn->query($sql);
            
            if ($row = $result->fetch_assoc()) {
                $tipo = new Tipo($row['id'], $row['tipo']);
            }
        }
        catch(\Exception $e){
            echo "<br />Erro: " . $e->getMessage();
        }

        $this->conn->close();    
        return $tipo; 
    }

}
