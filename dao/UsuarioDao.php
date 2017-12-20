<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Dao;

/**
 * Description of UsuarioDao
 *
 * @author Henrique
 */


require_once 'Conexao.php';
//require_once '../dao/TipoDao.php';
require_once '../model/Usuario.php';
//require_once '../model/Tipo.php';

use model\Usuario;


class UsuarioDao extends Conexao{
    
    
    public function salvar(Usuario $usuario){
        parent::__construct();
        
        $retorno = false;
        
        try {
            
// prepare sql and bind parameters
            $id = $usuario->getId();
            $nome = $usuario->getNome();
            $email = $usuario->getEmail();
            $senha = $usuario->getSenha();
            $tipo = $usuario->getTipo();
            
            if ($id == 0)
                $sql = "INSERT INTO Usuario VALUES (0,'$nome', '$email', password('$senha'), $tipo )";
            else
                $sql = "UPDATE Usuario SET nome='$nome', email_prontuario='$email', tipo=$tipo, senha=password('$senha') WHERE id_usuario=$id";

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
            $sql = "DELETE FROM Usuario WHERE id_usuario=$id";

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
        $usuario = null;
        try {
            // prepare sql and bind parameters
            $sql = "SELECT * FROM Usuario WHERE id_usuario=$id";
            $result = $this->conn->query($sql);
            
            if ($row = $result->fetch_assoc()) {
                $usuario = new Usuario($row['id_usuario'], $row['nome'], $row['email_prontuario'],null,$row['tipo']);
            }
        }
        catch(PDOException $e){
            echo "<br />Erro: " . $e->getMessage();
        }

        $this->conn->close();    
        return $usuario; 
    }
    
    // retorna uma lista de objetos, buscando pelo nome
    public function listar($nome){
        parent::__construct();        
        
        $lista = array();
        
        try {
            // prepare sql and bind parameters
            $sql = "SELECT * FROM Usuario WHERE nome like '%$nome%' ORDER BY nome";
            $result = $this->conn->query($sql);
            
            if ($result->num_rows > 0) {
                $tipoDao = new TipoDao();
                while($row = $result->fetch_assoc()) {
                 $tipo = $tipoDao->buscar($row['tipo']);
                    $lista[] = new Usuario($row['id_usuario'], $row['nome'], $row['email_prontuario'], $row['senha'],$tipo);//no lugar do 1 vai $tipo
                }
            }
        }
        catch(PDOException $e){
            echo "<br />Erro: " . $e->getMessage();
        }

        $this->conn->close();    
        return $lista; 
    }
    
    
    //faz o login e retorna o objeto usuario
    public function login($email, $senha) {
        parent::__construct();
        $usuario = null;
        try {
            // prepare sql and bind parameters
            $sql = "SELECT * FROM Usuario WHERE email_prontuario='$email' AND senha=password('$senha')";
            $result = $this->conn->query($sql);
            
            if ($row = $result->fetch_assoc()) {
                $usuario = new Usuario($row['id_usuario'], $row['nome'], $row['email_prontuario'],NULL,$row['tipo']);
            }
        }
        catch(PDOException $e){
            echo "<br />Erro: " . $e->getMessage();
        }

        $this->conn->close();    
        return $usuario; 
        
    }
    
   
}
