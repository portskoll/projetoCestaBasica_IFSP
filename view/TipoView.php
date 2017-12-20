<?php include 'cabecalho.php'; ?>

<?php
if (!isset($_SESSION) || !in_array($_SESSION['tipo'], array(1)))
    header("Location: home.php");

require_once '../controller/TipoController.php';
require_once '../model/Tipo.php';
require_once '../Util/PhpStrap.php';

use Controller\TipoController;
use model\Tipo;
use Util\PhpStrap;

$id = "";
$nome = "";

if ($_POST) {
    $tipo = new Tipo($_POST['id'], $_POST['nome']);
    $tipoController = new TipoController();
    if ($tipoController->salvar($tipo)) {
        $_bs = new PhpStrap();
        echo $_bs->alertBootStrap("Sucesso ", " ==> Usuario salvo com sucesso...");
    } else {

        $_bs = new PhpStrap();
        echo $_bs->alertBootStrap("Erro ", " ==> Erro ao Salvar...");
    }
} else if ($_GET) {
    $tipoController = new TipoController();
    if (isset($_GET['excluir'])) {
        if ($tipoController->excluir($_GET['excluir'])) {
            
            $_bs = new PhpStrap();
            echo $_bs->alertBootStrap("Sucesso ", " ==> Usuario excluido com sucesso...");
            
        } else {
            
            $_bs = new PhpStrap();
            echo $_bs->alertBootStrap("Erro ", " ==> Erro ao excluir usuario...");
        }
    } else if (isset($_GET['alterar'])) {
        $tipo = $tipoController->buscar($_GET['alterar']);
        $id = $tipo->getId();
        $nome = $tipo->getNome();

        echo "<div class='container'>";
        echo "<div class='alert alert-danger'>";
        echo "<strong>Alterar</strong> Click no botão abaixo <strong> Cadastrar </strong> para alterar o usuario.</div></div>";
    }
}
?>


<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form method="POST">
                    <p>
                    <div class="form-group">
                        <label for="nome">Nome:</label>
                        <input class="form-control" type="text" name="nome" value="<?= $nome ?>" required />
                    </div>
                </p><p>
                <input type="hidden" name="id" value="<?= $id ?>" />
            <div class="form-group">
                <input class="btn btn-secundary"  type="button" value="Novo" onclick="window.location = '<?= $_SERVER['SCRIPT_NAME'] ?>'" />
                <input  class="btn btn-primary" type="submit" value="Salvar" />
            </div>
            </p>
        </form>
    </div>
</div>
</div>
</div>



<!-- Trigger the modal with a button -->
<div class="container">
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Cadastrar</button>
    <div> <p> </p></div>
</div>
<div class="container">
    <div class="panel panel-info">
        <div class="panel-heading">Listagem  Tipos de Usuários</div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class = "table">
                    <tr>
                        <th>Id</th><th>Nome</th>
                    </tr>
<?php
$tipoController = new TipoController();
$lista = $tipoController->listar("");
if ($lista) {
    foreach ($lista as $p) {
        echo "<tr>";
        echo "<td>" . $p->getId() . "</td>";
        echo "<td>" . $p->getNome() . "</td>";
        echo "<td><a href='?alterar=" . $p->getId() . "'>" . "<button type='button' class='btn btn-info btn-lg'>Alterar</button>" . "</a></td>";
        echo "<td><a href='?excluir=" . $p->getId() . "'>" . "<button class='btn btn btn-danger btn-lg' type='button' >Excluir</button>" . "</a></td>";
        echo "</tr>";
    }
} else
    echo "<tr><td>Não há registros</td></tr>";
?>
                </table>
            </div>
        </div>
    </div>
</div>


                    <?php include 'rodape.php'; ?>