<?php



/**
 * Description of Usuario
 *
 * @author Henrique
 */


namespace Model;

class Usuario {
    
    
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $tipo;
    
    function __construct($id, $nome, $email, $senha, $tipo) {
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
        $this->tipo = $tipo;
    }

    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getEmail() {
        return $this->email;
    }

    function getSenha() {
        return $this->senha;
    }

    function getTipo() {
        return $this->tipo;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }


    
}
