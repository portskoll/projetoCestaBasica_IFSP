<!DOCTYPE html>
<?php //include 'cabecalho.php'; ?>



<?php
require_once '../controller/UsuarioController.php';
require_once '../model/Usuario.php';

use Controller\UsuarioController;

session_start();
 $_SESSION['tocai'] = 0;

if ($_POST) {
    $usuarioController = new UsuarioController();
    if ($usuario = $usuarioController->login($_POST['email'], $_POST['senha'])) {
        $_SESSION['nome'] = $usuario->getNome();
        $_SESSION['tipo'] = $usuario->getTipo();


        header("Location: home.php");
    } else
        echo "<script>alert('Login incorreto!')</script>";
}

if($_GET){
    
    $tipo = $_GET["tipo"];
    $nome = $_GET["nome"];
    $_SESSION['nome'] = $nome;
    $_SESSION['tipo'] = $tipo;
    
    print_r($nome);
    print_r($tipo);
    header("Location: home.php");
}
?>


<html>
    <head><?php // include 'cabecalho.php';  ?>
        <!-- Theme Made By www.w3schools.com - No Copyright -->
        <title>Bootstrap Theme Simply Me</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style>
            body {
                font: 20px Montserrat, sans-serif;
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




       

        <!-- First Container -->
        <div class="container-fluid bg-1 text-center">
           
            <img src="http://som.mundotela.net/img/logomaneArtista.png" class="img-responsive img-rounded margin" style="display:inline" alt="Som na Caixa Mané" width="350" height="350">
            <!-- Trigger the modal with a button -->
                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Entrar</button>
        </div>

        <!-- Second Container -->
        <div class="container-fluid bg-2 text-center">
            <h3 class="margin">O que se passa aqui ??</h3>
            <p>Comunidade para curtir um som, aqui voce vai poder cadastrar as musicas que vc mais gosta, com ajuda de varias pessoas, ouvir e baixar muito som.</p>
           
            <a href="?tipo=3&nome=Visitante" class="btn btn-default btn-lg">
                <span class="glyphicon glyphicon-music"></span> Entrar como Visitante
            </a>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Login...</h4>
                    </div>
                    <div class="modal-body">
                        <form method="POST">
                            <div class="form-group">
                                <label  for="email">Email:</label>
                                <input class="form-control" type="text" name="email" id="email" />
                            </div>
                            <div class="form-group">
                                <label for="senha">Senha:</label>
                                <input class="form-control" type="password" name="senha" id="senha" />
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" value="Login" />
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>



    </body>
</html>
