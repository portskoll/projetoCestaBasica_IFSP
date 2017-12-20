<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Coletor de Preços - Cesta Básica</title>
        <!-- Theme Made By www.w3schools.com - No Copyright -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style>
            body {
                font: 10px Montserrat, sans-serif;
                line-height: 1.8;
                color: #000000;
            }
            p {font-size: 16px;}
            .margin {margin-bottom: 45px;}
            .bg-1 {
                background-color: #1abc9c; /* Green */
                color: #ffffff;
            }
            .bg-2 {
                background-color: #474e5d; /* Dark Blue */
                color: #ffffff;
            }
            .bg-3 {
                background-color: #ffffff; /* White */
                color: #555555;
            }
            .bg-4 {
                background-color: #2f2f2f; /* Black Gray */
                color: #fff;
            }
            .container-fluid {
                padding-top: 70px;
                padding-bottom: 70px;
            }
            .navbar {
                padding-top: 15px;
                padding-bottom: 15px;
                border: 0;
                border-radius: 0;
                margin-bottom: 0;
                font-size: 12px;
                letter-spacing: 5px;
            }
            .navbar-nav  li a:hover {
                color: #1abc9c !important;
            }
        </style>
    </head>
    <body>
        <!-- Trigger the modal with a button -->
        <div class="container">
           
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                      <div class="jumbotron"> <h1>ANÁLISE DA CESTA BÁSICA</h1><h2>IFSP - BARRETOS</h2><h3>Metodologia Dieese e Procon</h3></div>   
                    </div>
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Controle
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">Coleta - Visão Geral</button></li>
                                <li><button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal2">Oscilação de Preços da Cesta Básica - Média . Máximo . Minimo</button></li>
                                <li><button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal3">Variação de preços por periodo</button></li>
                            </ul>
                        </li>
                       
                    </ul>
                </div>
            </nav>

            <div> <p> </p></div>


            <!-- Trigger the modal with a button -->


            <div> <p> </p></div>
        </div>


        <?php
        require_once '../controller/Cockpit_listaController.php';
        require_once '../model/Cockpit_lista.php';
        require_once '../model/Cockpit_lista_geral.php';
        require_once '../model/Cockpit_lista_variacao.php';
        require_once '../model/Cockpit_mesA_mesB.php';
        require_once '../Util/PhpStrap.php';

        use Controller\Cockpit_listaController;

if ($_POST) {

            $_produto = $_POST['produto'];
            $_tipo = $_POST['tipo'];
            $_org = $_POST['org'];
            $_marca = $_POST['marca'];
            $_dia = $_POST['dia'];
            $_super = $_POST['super'];
            $_referencia = $_POST['referencia'];
            $_cidade = $_POST['cidade'];
            $_status = $_POST['status'];
            $_usuario = $_POST['usuario'];
            $_ano = 2017;
            $_m_a = $_POST['m_a'];
            $_m_b = $_POST['m_b'];

            if ($_POST['tabela'] == 1) { //tabela geral envia 1
                echo "<div class='container'>
    <div class='panel panel-info'>
      <div class='panel-heading'>Listagem  Produtos de Usuários</div>
        <div class='panel-body'>
            <div class='table-responsive'>
                <table class = 'table'>
                    <tr>
                        <th>#</th><th>Produto</th><th>Valor</th><th>Orgão</th><th>Marca
                        </th><th>Data Coleta</th><th>Supermercado</th><th>Tipo</th><th>Referencia</th><th>Cidade</th><th>Status</th><th>Coletor</th>
                    </tr>";
                $listaGeralController = new Cockpit_listaController();


                $lista = $listaGeralController->listarGeral($_produto, $_tipo, $_org, $_marca, $_dia, $_super, $_referencia, $_cidade, $_status, $_usuario);


                if ($lista) {

                    foreach ($lista as $p) {
                        echo "<tr>";
                        echo "<td>" . $p->getCod() . "</td>";
                        echo "<td>" . $p->getProduto() . "</td>";
                        echo "<td>" . $p->getValorItem() . "</td>";
                        echo "<td>" . $p->getOrg() . "</td>";
                        echo "<td>" . $p->getMarca() . "</td>";
                        echo "<td>" . $p->getDataPesquisa() . "</td>";
                        echo "<td>" . $p->getSupermercado() . "</td>";
                        echo "<td>" . $p->getTipoProduto() . "</td>";
                        echo "<td>" . $p->getReferencia() . "</td>";
                        echo "<td>" . $p->getCidade() . "</td>";
                        echo "<td>" . $p->getStatusColeta() . "</td>";
                        echo "<td>" . $p->getUsuario() . "</td>";


                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td>* Não há registros para os filtros selecionados</td></tr>";
                }


                echo "   </table>
            </div>
        </div>
    </div>
</div>";
            } //fim da lista geral


            if ($_POST['tabela'] == 2) { //tabela variação envia 2
                echo "<div class='container'>
    <div class='panel panel-info'>
      <div class='panel-heading'><h4>Produtos da Cesta Básica para ->  - <strong>$_super</strong>  -   <strong>$_org</strong>  -   <strong>$_referencia</strong>  -   <strong>$_cidade</strong>  -   <strong>$_marca</strong></h4> </div>
        <div class='panel-body'>
            <div class='table-responsive'>
                <table class = 'table'>
                    <tr>
                        <th>Produto</th><th>Media</th><th>Valor Minimo</th><th>Valor Máximo</th><th>Variacao</th><th> % </th>
                    </tr>";
                $listaVarController = new Cockpit_listaController();


                $lista = $listaVarController->listarVariacao($_super, $_org, $_referencia, $_cidade, $_marca);
                $totalMedia = 0;
                $totalMax = 0;
                $totalMin = 0;
                if ($lista) {

                    foreach ($lista as $p) {

                        $_max = (float) str_replace(',', '.', $p->getValorMaximo());
                        $_min = (float) str_replace(',', '.', $p->getValorMinimo());
                        $_varPorcentagem = ($_max * 100 / $_min) - 100;
                        echo "<tr>";
                        echo "<td>" . $p->getProduto() . "</td>";
                        echo "<td>" . $p->getMedia() . "</td>";
                        echo "<td>" . $p->getValorMinimo() . "</td>";
                        echo "<td>" . $p->getValorMaximo() . "</td>";
                        echo "<td>" . $p->getVariacao() . "</td>";
                        echo "<td>" . number_format($_varPorcentagem, 2, ",", ".") . "</td>";
                        echo "</tr>";
                        $totalMedia += (float) str_replace(',', '.', $p->getMedia());
                        $totalMax += (float) str_replace(',', '.', $p->getValorMaximo());
                        $totalMin += (float) str_replace(',', '.', $p->getValorMinimo());
                    }
                } else {
                    echo "<tr><td>* Não há registros para os filtros selecionados</td></tr>";
                }


                echo "   </table>
                 
                    <div class='alert alert-warning'><h5>Valor Máximo Cesta ->  R$ $totalMax</h5></div>
                    <div class='alert alert-success'><h5>Valor Médio da Cesta ->  R$ $totalMedia</h5></div>
                    <div class='alert alert-info'><h5>Valor Mínimo Cesta ->  R$ $totalMin</h5></div>    
            </div>
        </div>
    </div>
</div>";
            } //fim da lista variacao
            
  if ($_POST['tabela'] == 3) { //tabela mes_a, mes_b envia 3
   echo "<div class='container'>
    <div class='panel panel-info'>
      <div class='panel-heading'><h4>Produtos da Cesta Básica para ->  - <strong>$_super</strong>  -   <strong>$_org</strong>  -  <strong>$_cidade</strong>  -   <strong>$_ano</strong>-   <strong>$_m_a</strong>-   <strong>$_m_b</strong></h4>
         <div> <h6> <strong>*</strong>  dados insuficientes </h4></div>
        </div>
        <div>
        <div class='panel-body'>
            <div class='table-responsive'>
                <table class = 'table'>
                    <tr>
                        <th>Produto</th><th>$_m_a</th><th>$_m_b</th><th>% Variação no Periodo</th><th>Situação</th><th>Gráfico</th>
                    </tr>";
                $listaInflacaoController = new Cockpit_listaController();


                $lista = $listaInflacaoController->listarInflacao($_super, $_org,$_cidade, $_ano,$_m_a,$_m_b);
                
                $totalMes_a = 0;
                $totalMes_b = 0;
                $totalInflacao = 0;
                if ($lista) {

                    foreach ($lista as $p) {

                        $ma = $p->getMes_a();
                        $mb = $p->getMes_b();
                        $ma_ = ($ma > 0) ?  number_format($ma,2,".",",") : "*";
                        $mb_ = ($mb > 0) ?  number_format($mb,2,".",",") : "*";
                        $totalMes_a += $ma;
                        $totalMes_b += $mb;
                        $totalInflacao = (($totalMes_b / $totalMes_a)-1)*100;
                        $_varInflacao = (($mb / $ma) - 1) * 100;
                        $_varInflacao_ = ($_varInflacao == -100) ? "*" : number_format($_varInflacao,2,".",",");
                        $_trocaSinal = ($_varInflacao > 0) ? $_varInflacao : ($_varInflacao * (-1));
                        $_VarGrafico = number_format($_trocaSinal,2,".",",");
                        $_VarGrafico2 = number_format($_varInflacao,0,".",",");
                        $_cor = ($_varInflacao > 0) ? 'w3-red' : 'w3-green';
                        $_varInf = ($_varInflacao > 0) ? 'INFLAÇÂO' : (($_varInflacao == -100) ? '*' : 'DEFLAÇÂO');
                        echo "<tr>";
                        echo "<td>" . $p->getProduto() . "</td>";
                        echo "<td>" . $ma_ . "</td>";
                        echo "<td>" . $mb_ . "</td>";
                        echo "<td>" . $_varInflacao_ . "</td>";
                        echo "<td>" .$_varInf . "</td>";
                        echo "<td>"."<div class='w3-light-grey'> <div class='w3-container $_cor w3-center' style='width:$_VarGrafico%'>$_VarGrafico2%</div></div>"."</td>";
                        echo "</tr>";
                      
                    }
                } else {
                    echo "<tr><td>* Não há registros para os filtros selecionados</td></tr>";
                }


                echo "   </table>
                 
                   <div class='alert alert-warning'><h5>Valor cesta básica   $_m_a ->  R$ $totalMes_a</h5></div>
                   <div class='alert alert-success'><h5>Valor cesta básica   $_m_b ->  R$ $totalMes_b</h5></div>
                   <div class='alert alert-info'><h5>Inflação no período ->".  number_format($totalInflacao,2,".",",") ."% </h5></div>    
            </div>
        </div>
    </div>
</div>";
            } //fim da lista Inflacao
            
        }
        ?>




        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">


                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Escolha os itens para mostrar na lista</h4>

                    </div>
                    <div class="modal-body">

                        <form method="POST" enctype="multipart/form-data">

                            <!-- Tabela geral -->
                            <input type="hidden" value= '1' name="tabela" />
                            <input class="btn btn-primary" type="submit" value="Mostrar" />
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="produto">Produto :</label>
                                        <select  class="form-control" name="produto" >

                                            <?php
                                            echo "<option selected ></option>";
                                            $item = 'Produto';
                                            $cockpit_listaController = new Cockpit_listaController();
                                            $itens = $cockpit_listaController->listarItens($item);
                                            foreach ($itens as $v) {
                                                echo "<option  value='" . $v->getItem() . "'>" . $v->getItem() . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="tipo">Tipo :</label>
                                        <select  class="form-control" name="tipo" >

                                            <?php
                                            echo "<option selected ></option>";
                                            $item = 'TipoProduto';
                                            $cockpit_listaController = new Cockpit_listaController();
                                            $itens = $cockpit_listaController->listarItens($item);
                                            foreach ($itens as $v) {
                                                echo "<option  value='" . $v->getItem() . "'>" . $v->getItem() . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="org">Orgão :</label>
                                        <select  class="form-control" name="org" >

                                            <?php
                                            echo "<option selected ></option>";
                                            $item = 'Org';
                                            $cockpit_listaController = new Cockpit_listaController();
                                            $itens = $cockpit_listaController->listarItens($item);
                                            foreach ($itens as $v) {
                                                echo "<option  value='" . $v->getItem() . "'>" . $v->getItem() . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="marca">Marca :</label>
                                        <select  class="form-control" name="marca" >

                                            <?php
                                            echo "<option selected ></option>";
                                            $item = 'Marca';
                                            $cockpit_listaController = new Cockpit_listaController();
                                            $itens = $cockpit_listaController->listarItens($item);
                                            foreach ($itens as $v) {
                                                echo "<option  value='" . $v->getItem() . "'>" . $v->getItem() . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="dia">Dia da Pesquisa :</label>
                                        <select  class="form-control" name="dia" >

                                            <?php
                                            echo "<option selected ></option>";
                                            $item = 'DataPesquisa';
                                            $cockpit_listaController = new Cockpit_listaController();
                                            $itens = $cockpit_listaController->listarItens($item);
                                            foreach ($itens as $v) {

                                                echo "<option  value='" . $v->getItem() . "'>" . $v->getItem() . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="super">Supermercado :</label>
                                        <select  class="form-control" name="super" >

                                            <?php
                                            echo "<option selected ></option>";
                                            $item = 'Supermercado';
                                            $cockpit_listaController = new Cockpit_listaController();
                                            $itens = $cockpit_listaController->listarItens($item);
                                            foreach ($itens as $v) {
                                                echo "<option  value='" . $v->getItem() . "'>" . $v->getItem() . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="referencia">Mês da Coleta :</label>
                                        <select  class="form-control" name="referencia" >

                                            <?php
                                            echo "<option selected ></option>";
                                            $item = 'Referencia';
                                            $cockpit_listaController = new Cockpit_listaController();
                                            $itens = $cockpit_listaController->listarItens($item);
                                            foreach ($itens as $v) {
                                                echo "<option  value='" . $v->getItem() . "'>" . $v->getItem() . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="cidade">Cidade :</label>
                                        <select  class="form-control" name="cidade" >

                                            <?php
                                            echo "<option selected ></option>";
                                            $item = 'Cidade';
                                            $cockpit_listaController = new Cockpit_listaController();
                                            $itens = $cockpit_listaController->listarItens($item);
                                            foreach ($itens as $v) {
                                                echo "<option  value='" . $v->getItem() . "'>" . $v->getItem() . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="status">Status da Coleta :</label>
                                        <select  class="form-control" name="status" >

                                            <?php
                                            echo "<option selected ></option>";
                                            $item = 'StatusColeta';
                                            $cockpit_listaController = new Cockpit_listaController();
                                            $itens = $cockpit_listaController->listarItens($item);
                                            foreach ($itens as $v) {
                                                $status = $v->getItem() == 1 ? 'Ativa' : 'Passada';
                                                echo "<option  value='" . $v->getItem() . "'>" . $status . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="usuario">Coletor :</label>
                                <select  class="form-control" name="usuario" >

                                    <?php
                                    echo "<option selected ></option>";
                                    $item = 'Usuario';
                                    $cockpit_listaController = new Cockpit_listaController();
                                    $itens = $cockpit_listaController->listarItens($item);
                                    foreach ($itens as $v) {

                                        echo "<option  value='" . $v->getItem() . "'>" . $v->getItem() . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>


                        </form>

                    </div>

                </div>
            </div>
        </div><!--fim modal -->





        <!-- Modal2 -->
        <div class="modal fade" id="myModal2" role="dialog">
            <div class="modal-dialog">


                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Escolha os itens para mostrar na lista</h4>

                    </div>
                    <div class="modal-body">

                        <form method="POST" enctype="multipart/form-data">

                            <!-- Tabela geral -->
                            <input type="hidden" value= '2' name="tabela" />
                            <input class="btn btn-primary" type="submit" value="Mostrar" />
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="marca">Marca :</label>
                                        <select  class="form-control" name="marca" >

                                            <?php
                                            echo "<option selected ></option>";
                                            $item = 'Marca';
                                            $cockpit_listaController = new Cockpit_listaController();
                                            $itens = $cockpit_listaController->listarItens($item);
                                            foreach ($itens as $v) {
                                                echo "<option  value='" . $v->getItem() . "'>" . $v->getItem() . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div> 
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="super">Supermercado :</label>
                                        <select  class="form-control" name="super" >

                                            <?php
                                            echo "<option selected ></option>";
                                            $item = 'Supermercado';
                                            $cockpit_listaController = new Cockpit_listaController();
                                            $itens = $cockpit_listaController->listarItens($item);
                                            foreach ($itens as $v) {
                                                echo "<option  value='" . $v->getItem() . "'>" . $v->getItem() . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>  
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="org">Orgão :</label>
                                        <select  class="form-control" name="org" >

                                            <?php
                                            echo "<option selected ></option>";
                                            $item = 'Org';
                                            $cockpit_listaController = new Cockpit_listaController();
                                            $itens = $cockpit_listaController->listarItens($item);
                                            foreach ($itens as $v) {
                                                echo "<option  value='" . $v->getItem() . "'>" . $v->getItem() . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="referencia">Mês da Coleta :</label>
                                        <select  class="form-control" name="referencia" >

                                            <?php
                                            echo "<option selected ></option>";
                                            $item = 'Referencia';
                                            $cockpit_listaController = new Cockpit_listaController();
                                            $itens = $cockpit_listaController->listarItens($item);
                                            foreach ($itens as $v) {
                                                echo "<option  value='" . $v->getItem() . "'>" . $v->getItem() . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="cidade">Cidade :</label>
                                        <select  class="form-control" name="cidade" >

                                            <?php
                                            echo "<option selected ></option>";
                                            $item = 'Cidade';
                                            $cockpit_listaController = new Cockpit_listaController();
                                            $itens = $cockpit_listaController->listarItens($item);
                                            foreach ($itens as $v) {
                                                echo "<option  value='" . $v->getItem() . "'>" . $v->getItem() . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>


                            </div>




                        </form>

                    </div>

                </div>
            </div>
        </div><!--fim modal -->
        
        
                <!-- Modal3 -->
        <div class="modal fade" id="myModal3" role="dialog">
            <div class="modal-dialog">


                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Escolha os itens para mostrar na lista</h4>

                    </div>
                    <div class="modal-body">

                        <form method="POST" enctype="multipart/form-data">

                            <!-- Tabela geral -->
                            <input type="hidden" value= '3' name="tabela" />
                            <input class="btn btn-primary" type="submit" value="Mostrar" />
                            <div class="row">
                               
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="super">Supermercado :</label>
                                        <select  class="form-control" name="super" >

                                            <?php
                                            echo "<option selected ></option>";
                                            $item = 'Supermercado';
                                            $cockpit_listaController = new Cockpit_listaController();
                                            $itens = $cockpit_listaController->listarItens($item);
                                            foreach ($itens as $v) {
                                                echo "<option  value='" . $v->getItem() . "'>" . $v->getItem() . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>  
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="org">Orgão :</label>
                                        <select  class="form-control" name="org" >

                                            <?php
                                            echo "<option selected ></option>";
                                            $item = 'Org';
                                            $cockpit_listaController = new Cockpit_listaController();
                                            $itens = $cockpit_listaController->listarItens($item);
                                            foreach ($itens as $v) {
                                                echo "<option  value='" . $v->getItem() . "'>" . $v->getItem() . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="m_a">Primeiro Mês :</label>
                                        <select  class="form-control" name="m_a" >

                                            <?php
                                            echo "<option selected ></option>";
                                            $item = 'Referencia';
                                            $cockpit_listaController = new Cockpit_listaController();
                                            $itens = $cockpit_listaController->listarItens($item);
                                            foreach ($itens as $v) {
                                                echo "<option  value='" . $v->getItem() . "'>" . $v->getItem() . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                
                                    <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="m_b">Último Mês :</label>
                                        <select  class="form-control" name="m_b" >

                                            <?php
                                            echo "<option selected ></option>";
                                            $item = 'Referencia';
                                            $cockpit_listaController = new Cockpit_listaController();
                                            $itens = $cockpit_listaController->listarItens($item);
                                            foreach ($itens as $v) {
                                                echo "<option  value='" . $v->getItem() . "'>" . $v->getItem() . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="cidade">Cidade :</label>
                                        <select  class="form-control" name="cidade" >

                                            <?php
                                            echo "<option selected ></option>";
                                            $item = 'Cidade';
                                            $cockpit_listaController = new Cockpit_listaController();
                                            $itens = $cockpit_listaController->listarItens($item);
                                            foreach ($itens as $v) {
                                                echo "<option  value='" . $v->getItem() . "'>" . $v->getItem() . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>


                            </div>




                        </form>

                    </div>

                </div>
            </div>
        </div><!--fim modal -->
    </body>
</html>
