<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Dao;
use \mysqli;
/**
 * Description of Conexao
 *
 * @author Administrador
 */
class Conexao {
    protected $conn;
            
    function __construct() {
        $servername = "localhost";
        $username = "u174943423_ifspb";
        $password = "ports1";
        $db = "u174943423_ifspb";

        
        try {
            $this->conn = new mysqli($servername, $username, $password, $db);
            if ($this->conn->connect_error) {
                die("Erro de conexão: " . $this->conn->connect_error);
            } 
        }
        catch(Exception $e){
            echo "Connection failed: " . $e->getMessage();
        }
    }
    
}
