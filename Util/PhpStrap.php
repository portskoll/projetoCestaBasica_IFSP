<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Util;

/**
 * Description of PhpStrap
 *
 * @author Henrique
 */
class PhpStrap {

    function alertBootStrap($alerta,$msg) {

       $bootStrap = "";
       

      
       $S2 = "<div class='alert alert-success'>";
       $S3 = "<strong>" . $alerta . "</strong>" . $msg . "</div>";
       
       $bootStrap = $S2.$S3;

        return  $bootStrap;
    }

}
