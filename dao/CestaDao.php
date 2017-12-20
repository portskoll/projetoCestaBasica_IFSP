<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Dao;

/**
 * Description of CestaDao
 *
 * @author Henrique
 */
require_once 'Conexao.php';
use model\Cesta;
/**
 * Description of CestaDao
 *
 * @author Administrador
 */
class CestaDao extends Conexao {
    
    public function salvar(Cesta $cesta){
        parent::__construct();    // cria a conexao     
        $retorno = false;        
        try {
            $id = $cesta->getId();
            $produto = $cesta->getProduto();
            $tipo = $cesta->getTipo();
            $tCesta = $cesta->getCesta();
            $qtde = $cesta->getQtde();
            
            // prepare sql and bind parameters
            if ($id == 0)
                $sql = "INSERT INTO listaColeta VALUES (0, '$produto','$tipo','$tCesta','$qtde')";
            else
                $sql = "UPDATE listaColeta set produto='$produto',tipo='$tipo',cesta='$tCesta',qtde='$qtde' WHERE id=$id";

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
            $sql = "DELETE FROM listaColeta WHERE id=$id";

            $retorno = $this->conn->query($sql);
        }
        catch(PDOException $e){
            echo "<br />Erro: " . $e->getMessage();
        }

        $this->conn->close();         
        return $retorno;  
    }
    
    public function listar($produto){
        parent::__construct();
        
        $lista = array();
        
        try {
            // prepare sql and bind parameters
            $sql = "SELECT * FROM listaColeta WHERE produto like '%$produto%' ORDER BY produto";
            $result = $this->conn->query($sql);
            
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $lista[] = new Cesta($row['id'], $row['produto'], $row['tipo'], $row['cesta'], $row['qtde']);
                }
            }
        }
        catch(PDOException $e){
            echo "<br />Erro: " . $e->getMessage();
        }

        $this->conn->close();    
        return $lista; 
    }
    
    //faz a busca por tipo (alimentação, higiena pessoal, limpeza)
    public function listarPorTipo($tipoProduto){
        parent::__construct();
        
        $lista = array();
        
        try {
            // prepare sql and bind parameters
            $sql = "SELECT * FROM listaColeta WHERE tipo like '%$tipoProduto%'  ORDER BY produto";
            $result = $this->conn->query($sql);
            
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $lista[] = new Cesta($row['id'], $row['produto'], $row['tipo'], $row['cesta'], $row['qtde']);
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
        $cesta = null;
        try {
            // prepare sql and bind parameters
            $sql = "SELECT * FROM listaColeta WHERE id=$id";
            $result = $this->conn->query($sql);
            
            if ($row = $result->fetch_assoc()) {
                $cesta = new Cesta($row['id'], $row['produto'], $row['tipo'], $row['cesta'], $row['qtde']);
            }
        }
        catch(\Exception $e){
            echo "<br />Erro: " . $e->getMessage();
        }

        $this->conn->close();    
        return $cesta; 
    }

}
