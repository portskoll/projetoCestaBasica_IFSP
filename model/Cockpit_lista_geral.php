<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace model;
/**
 * Description of Cockpit_listaGeral
 *
 * @author Henrique
 */
class Cockpit_listaGeral {
    
   private $cod;
   private $produto;
   private $tipoProduto;
   private $Org;
   private $valorItem;
   private $marca;
   private $dataPesquisa;
   private $supermercado;
   private $referencia;
   private $cidade;
   private $statusColeta;
   private $usuario;
   
   function __construct($cod, $produto, $tipoProduto, $Org, $valorItem, $marca, $dataPesquisa, $supermercado, $referencia, $cidade, $statusColeta, $usuario) {
       $this->cod = $cod;
       $this->produto = $produto;
       $this->tipoProduto = $tipoProduto;
       $this->Org = $Org;
       $this->valorItem = $valorItem;
       $this->marca = $marca;
       $this->dataPesquisa = $dataPesquisa;
       $this->supermercado = $supermercado;
       $this->referencia = $referencia;
       $this->cidade = $cidade;
       $this->statusColeta = $statusColeta;
       $this->usuario = $usuario;
   }

   
   function getCod() {
       return $this->cod;
   }

   function getProduto() {
       return $this->produto;
   }

   function getTipoProduto() {
       return $this->tipoProduto;
   }

   function getOrg() {
       return $this->Org;
   }

   function getValorItem() {
       return $this->valorItem;
   }

   function getMarca() {
       return $this->marca;
   }

   function getDataPesquisa() {
       return $this->dataPesquisa;
   }

   function getSupermercado() {
       return $this->supermercado;
   }

   function getReferencia() {
       return $this->referencia;
   }

   function getCidade() {
       return $this->cidade;
   }

   function getStatusColeta() {
       return $this->statusColeta;
   }

   function getUsuario() {
       return $this->usuario;
   }

   function setCod($cod) {
       $this->cod = $cod;
   }

   function setProduto($produto) {
       $this->produto = $produto;
   }

   function setTipoProduto($tipoProduto) {
       $this->tipoProduto = $tipoProduto;
   }

   function setOrg($Org) {
       $this->Org = $Org;
   }

   function setValorItem($valorItem) {
       $this->valorItem = $valorItem;
   }

   function setMarca($marca) {
       $this->marca = $marca;
   }

   function setDataPesquisa($dataPesquisa) {
       $this->dataPesquisa = $dataPesquisa;
   }

   function setSupermercado($supermercado) {
       $this->supermercado = $supermercado;
   }

   function setReferencia($referencia) {
       $this->referencia = $referencia;
   }

   function setCidade($cidade) {
       $this->cidade = $cidade;
   }

   function setStatusColeta($statusColeta) {
       $this->statusColeta = $statusColeta;
   }

   function setUsuario($usuario) {
       $this->usuario = $usuario;
   }


   
}


//`Cod`, `Produto`, `TipoProduto`, `Org`, `ValorItem`, `Marca`, `DataPesquisa`, `Supermercado`, `Referencia`, `Cidade`, `StatusColeta`, `Usuario`