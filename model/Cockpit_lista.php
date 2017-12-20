<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace model;

/**
 * Description of Cockpit_total
 *
 * @author Henrique
 */
class Cockpit_lista {
   
private $item;


function __construct($item) {
    $this->item = $item;
}


function getItem() {
    return $this->item;
}

function setItem($item) {
    $this->item = $item;
}






}
