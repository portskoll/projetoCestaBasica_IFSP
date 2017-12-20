<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Dao;

/**
 * Description of MensagemDao
 *
 * @author Henrique
 */

require_once 'Conexao.php';
require_once '../model/Mensagem.php';
require_once '../model/Supermercado.php';
require_once '../model/Coleta.php';
require_once '../model/Usuario.php';

use Model\Mensagem;
use model\Coleta;
use model\Supermercado;
use Model\Usuario;

  


class MensagemDao extends Conexao{
    
    //salva a mensagem no Banco
    public function salvar(Mensagem $mensagem){
        parent::__construct();
        
        $retorno = false;
        
        try {
            
            // prepare sql and bind parameters
            $id = $mensagem->getId();
            $mensagemTexto = $mensagem->getMensagemTexto();
            $supermercado = $mensagem->getSupermercado();
            $coleta = $mensagem->getColeta();
            $usuarioColeta = $mensagem->getUsuarioC();
          
            
            if ($id == 0)
                $sql = "INSERT INTO Mensagem VALUES (0,'$mensagemTexto',$supermercado, $coleta, $usuarioColeta)";
            else
                $sql = "UPDATE Mensagem SET mensagem='$mensagemTexto', cod_super=$supermercado, cod_coleta=$coleta,cod_usuario=$usuarioColeta WHERE id=$id";

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
            $sql = "DELETE FROM Mensagem WHERE id=$id";

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
        $mensagem = null;
        try {
            // prepare sql and bind parameters
            $sql = "SELECT * FROM Mensagem WHERE id=$id";
            $result = $this->conn->query($sql);
            
            if ($row = $result->fetch_assoc()) {
                $mensagem = new Mensagem($row['id'], $row['mensagem'], $row['cod_super'],$row['cod_coleta'],$row['cod_usuario']);
            }
        }
        catch(PDOException $e){
            echo "<br />Erro: " . $e->getMessage();
        }

        $this->conn->close();    
        return $mensagem; 
    }
    
    // retorna uma lista de objetos, buscando pelo nome
    public function listar($mensagem){
        parent::__construct();        
        
        $lista = array();
        
        try {
            // prepare sql and bind parameters
            $sql = "SELECT * FROM Mensagem WHERE mensagem like '%$mensagem%' ORDER BY mensagem";
            $result = $this->conn->query($sql);
            
            if ($result->num_rows > 0) {
                $supermercadoDao = new SupermercadoDao();
                $coletaDao = new ColetaDao();
                $usuarioDao = new UsuarioDao();
                while($row = $result->fetch_assoc()) {
                    $superMercado = $supermercadoDao->buscar($row['cod_super']);
                    $coleta = $coletaDao->buscar($row['cod_coleta']);
                    $usuarioColeta = $usuarioDao->buscar($row['cod_usuario']);
                                    
                    $lista[] = new Mensagem($row['id'],$row['mensagem'], $superMercado,$coleta,$usuarioColeta);
//                    $lista[] = new Mensagem($row['id'],$row['mensagem'], $row['cod_super'],$row['cod_coleta'],$row['cod_usuario']);
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
