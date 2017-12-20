<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
if (!isset($_SESSION['nome']))
    header("Location: index.php"); // forçar login
$_SESSION['listarAlbum'] = 0;
$_SESSION['listarArtista'] = 0;

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Coletor de Preços - Cesta Básica</title>
        <!-- Theme Made By www.w3schools.com - No Copyright -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style>
            body {
                font: 14px Montserrat, sans-serif;
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
        
        <div class="container-fluid bg-1 text-center">
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- IfspColetor -->
            <ins class="adsbygoogle"
                 style="display:block"
                 data-ad-client="ca-pub-5867782454224108"
                 data-ad-slot="7180403304"
                 data-ad-format="auto"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        </div>



        
            <!-- First Container -->
            <div class="container-fluid bg-1 text-center">

               
                <p><strong>Seja bem-vindo, <?= $_SESSION['nome'] ?></strong></p>
            </div>
        

       

 <div class="container-fluid bg-2 text-center">
        
            <ul class="nav navbar-nav" >
                <?php
                if ($_SESSION['tipo'] == 1) {
                    ?>
                    <li><a href='UsuarioView.php'>Usuarios</a></li>
                    <li><a href='TipoView.php'>Tipos</a></li>
                     <li><a href='SupermercadoView.php'>Supermercado</a></li>
                     <li><a href='ColetaView.php'>Criar Coleta</a></li>
                     <li><a href='MensagemView.php'>Mensagem para Coleta</a></li>
                     <li><a href='http://ifpesquisa.mundotela.net'>Pesquisa</a></li>
                     

                    <?php
                }
                if ($_SESSION['tipo'] == 1 || $_SESSION['tipo'] == 2) {
                    ?>

                    <li><a href='MarcaView.php'>Marcas</a></li>
                    <li><a href='CestaView.php'>Itens da Cesta Básica</a></li>
                    <li><a href='ProdutoView.php'>Produtos Cadastrados</a></li>
                    
                    

                    <?php
                }
                if ($_SESSION['tipo'] == 1 || $_SESSION['tipo'] == 2 || $_SESSION['tipo'] == 3) {
                    ?>
                    <!--<li ><a  href='CestaBasica.php'>Cesta Básica</a></li>--> 
                    <li><a href='home.php'>Home</a></li>
                    <li><a href='logout.php'>Sair</a></li>
                    <?php
                }
                ?>
            </ul>
            
             </div>
        
