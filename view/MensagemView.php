<?php include 'cabecalho.php'; ?>

<?php
if (!isset($_SESSION) || !in_array($_SESSION['tipo'], array(1)))
    header("Location: home.php");

require_once '../controller/ColetaController.php';
require_once '../controller/UsuarioController.php';
require_once '../controller/SupermercadoController.php';
require_once '../controller/MensagemController.php';
require_once '../controller/TipoController.php';
require_once '../model/Coleta.php';
require_once '../model/Usuario.php';
require_once '../model/Supermercado.php';
require_once '../model/Mensagem.php';
require_once '../model/Tipo.php';
require_once '../Util/PhpStrap.php';

use Controller\ColetaController;
use Controller\UsuarioController;
use Controller\MensagemController;
use Controller\SupermercadoController;
use Controller\TipoController;
use model\Mensagem;


use Util\PhpStrap;

$id = "";
$mensagemTexto = "";
$supermercado = "";
$coleta = "";
$usuarioColeta = "";

$Resposta = "Cadastro de Mensagem:";

if ($_POST) {


    $p = new Mensagem($_POST['id'], $_POST['mensagem'], $_POST['supermercado'], $_POST['coleta'], $_POST['usuario']);
    //print_r("===ID>>  " . $_POST['id']);

    $mensagemController = new MensagemController();
    if ($mensagemController->salvar($p)) {

        $_bs = new PhpStrap();
        echo $_bs->alertBootStrap("Sucesso ", " ==> Mensagem salvo com sucesso...");
    } else {

        $_bs = new PhpStrap();
        echo $_bs->alertBootStrap("Erro ", " ==> Erro ao Salvar...");
    }
} else if ($_GET) {
    $mensagemController = new MensagemController();
    if (isset($_GET['excluir'])) {
        if ($mensagemController->excluir($_GET['excluir'])) {


            $_bs = new PhpStrap();
            echo $_bs->alertBootStrap("Sucesso ", " ==> Sucesso ao Excluir mensagem...");
        } else {

            $_bs = new PhpStrap();
            echo $_bs->alertBootStrap("Erro ", " ==> Erro ao Excluir mensagem...");
        }
    } else if (isset($_GET['alterar'])) {
        $pegaID = $_GET['alterar'];
        $mensagem = $mensagemController->buscar($_GET['alterar']);
        $id = $pegaID;
        $mensagemTexto = $mensagem->getMensagemTexto();
        $supermercado = $mensagem->getSupermercado();
        $coleta = $mensagem->getColeta();
        $usuarioColeta = $mensagem->getUsuarioC();

        echo "<div class='container'>";
        echo "<div class='alert alert-danger'>";
        echo "<strong>Alterar</strong> Click no botão abaixo <strong> Cadastrar </strong> para alterar o usuario.</div></div>";
    }
}
?>

<!-- Trigger the modal with a button -->
<div class="container">
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Cadastrar</button>
    <div> <p> </p></div>
</div>
<div class="container">
    <div class="panel panel-info">
        <div class="panel-heading">Listagem de Mensagens de Coleta </div>
        <div class="panel-body">
            <div class="table-responsive">

                <table class="table">
                    <tr>
                        <th>#</th><th>Mensagem</th><th>Supermercado</th><th>Coleta</th><th>Usuario</th>
                    </tr>
                    <?php
                    $mensagemController = new MensagemController();
                    $lista = $mensagemController->listar("");
                    if ($lista) {
                        foreach ($lista as $p) {
                            echo "<tr>";
                            echo "<td>" . $p->getId() . "</td>";
                            echo "<td>" . $p->getMensagemTexto() . "</td>";
                            echo "<td>" . ($p->getSupermercado()->getNome()) . "</td>";
                            echo "<td>" . ($p->getColeta()->getNome()) . "</td>";
                            echo "<td>" . ($p->getUsuarioC()->getNome()) . "</td>";
                            echo "<td><a href='?alterar=" . $p->getId() . "'>" . "<button type='button' class='btn btn-info btn-lg'>Alterar</button>" . "</a></td>";
                            echo "<td><a href='?excluir=" . $p->getId() . "'>" . "<button class='btn btn btn-danger btn-lg' type='button' >Excluir</button>" . "</a></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td>Não há registros</td></tr>";
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>


            </div>
            <div class="modal-body">

                <form method="POST" enctype="multipart/form-data">


                    <input type="hidden" value="<?= $id ?>" name="id" />
                    <input class="btn btn-secundary" type="button" value="Novo" onclick="window.location = '<?= $_SERVER['SCRIPT_NAME'] ?>'" />
                    <input class="btn btn-primary" type="submit" value="Salvar" />

                    <div class="form-group">
                        <p> </p>
                    </div>


                    <div class="form-group">
                        <label for="mensagem">Mensagem :</label>
                        <input class="form-control"  type="text" name="mensagem" value="<?= $mensagemTexto ?>" required/>
                    </div>

                    <div class="form-group">
                        <label for="supermercado">Supermercado :</label>
                        <select  class="form-control" name="supermercado" required>
                            <option></option>
                            <?php
                            $superController = new SupermercadoController();
                            $lista = $superController->listar("");
                            foreach ($lista as $v) {
                                $selected = "";
                                if ($v->getId() == $supermercado)
                                    $selected = "selected='selected'";
                                echo "<option $selected value='" . $v->getId() . "'>" . $v->getNome() . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="coleta">Coleta :</label>
                        <select  class="form-control" name="coleta" required>
                            <option></option>
                            <?php
                            $coletaController = new ColetaController();
                            $lista = $coletaController->listar("");
                            foreach ($lista as $v) {
                                $selected = "";
                                if ($v->getId() == $coleta)
                                    $selected = "selected='selected'";
                                echo "<option $selected value='" . $v->getId() . "'>" . $v->getNome() . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="usuario">Nome do coletor :</label>
                        <select  class="form-control" name="usuario" required>
                            <option></option>
                            <?php
                            $userController = new UsuarioController();
                            $lista = $userController->listar("");
                            foreach ($lista as $v) {
                                $selected = "";
                                if ($v->getId() == $usuarioColeta)
                                    $selected = "selected='selected'";
                                echo "<option $selected value='" . $v->getId() . "'>" . $v->getNome() . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>



<?php include 'rodape.php'; ?>