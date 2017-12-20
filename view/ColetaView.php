<?php include 'cabecalho.php'; ?>

<?php
if (!isset($_SESSION) || !in_array($_SESSION['tipo'], array(1)))
    header("Location: home.php");


require_once '../controller/ColetaController.php';
require_once '../model/Coleta.php';
require_once '../Util/PhpStrap.php';

use Controller\TipoController;
use Controller\ColetaController;
use model\Coleta;
use Util\PhpStrap;

$id = "";
$nome = "";
$cidade = "";
$status = "";
$dataInicial = "";
$dataFinal = "";

$Resposta = "Cadastro de Coletas:";

if ($_POST) {

    $p = new Coleta($_POST['id'], $_POST['nome'], $_POST['cidade'], $_POST['status'], $_POST['data_inicial'], $_POST['data_final']);
    //print_r("===ID>>  " . $_POST['id']);

    $coletaController = new ColetaController();
    if ($coletaController->salvar($p)) {

        $_bs = new PhpStrap();
        echo $_bs->alertBootStrap("Sucesso ", " ==> Coleta salvo com sucesso...");
    } else {

        $_bs = new PhpStrap();
        echo $_bs->alertBootStrap("Erro ", " ==> Erro ao Salvar...");
    }
} else if ($_GET) {
    $coletaController = new ColetaController();
    if (isset($_GET['excluir'])) {
        if ($coletaController->excluir($_GET['excluir'])) {


            $_bs = new PhpStrap();
            echo $_bs->alertBootStrap("Sucesso ", " ==> Sucesso ao Excluir coleta...");
        } else {

            $_bs = new PhpStrap();
            echo $_bs->alertBootStrap("Erro ", " ==> Erro ao Excluir coleta...");
        }
    } else if (isset($_GET['alterar'])) {
        $pegaID = $_GET['alterar'];
        $coleta = $coletaController->buscar($_GET['alterar']);
        $id = $pegaID;
        $nome = $coleta->getNome();
        $cidade = $coleta->getCidade();
        $status = $coleta->getStatus();
        $dataInicial = $coleta->getDataInicial();
        $dataFinal = $coleta->getDataFinal();

        echo "<div class='container'>";
        echo "<div class='alert alert-danger'>";
        echo "<strong>Alterar</strong> Click no botão abaixo <strong> Cadastrar </strong> para alterar o coleta.</div></div>";
    }
}
?>

<!-- Trigger the modal with a button -->
<br>
<div class="container">
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Cadastrar</button>
    <div> <p> </p></div>
</div>
<div class="container">
    <div class="panel panel-info">
        <div class="panel-heading">Listagem de Usuários</div>
        <div class="panel-body">
            <div class="table-responsive">

                <table class="table">
                    <tr>
                        <th>#</th><th>Nome</th><th>Cidade</th><th>Status</th><th>Inicio</th><th>Final</th>
                    </tr>
<?php
$coletaController = new ColetaController();
$lista = $coletaController->listar("");
if ($lista) {
    foreach ($lista as $p) {
        echo "<tr>";
        echo "<td>" . $p->getId() . "</td>";
        echo "<td>" . $p->getNome() . "</td>";
        echo "<td>" . $p->getCidade() . "</td>";
         echo "<td>" . $p->getStatus() . "</td>";
          echo "<td>" . $p->getDataInicial() . "</td>";
           echo "<td>" . $p->getDataFinal() . "</td>";
        echo "<td><a href='?alterar=" . $p->getId() . "'>" . "<button type='button' class='btn btn-info btn-sm'>Alterar</button>" . "</a></td>";
        echo "<td><a href='?excluir=" . $p->getId() . "'>" . "<button class='btn btn btn-danger btn-sm' type='button' >Excluir</button>" . "</a></td>";
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
                        <label for="nome">Nome:</label>
                        <input class="form-control"  type="text" name="nome" value="<?= $nome ?>" required/>
                    </div>
                    <div class="form-group">
                        <label for="cidade">Cidade:</label>
                        <input class="form-control"  type="text" name="cidade" value="<?= $cidade ?>" required />
                    </div>
                    
                     <div class="form-group">
                        <label for="status">Status da Coleta (0 = desativada)  (1 = Ativada)</label>
                        <input class="form-control"  type="text" name="status" value="<?= $status ?>" required />
                    </div>
                    
                    <div class="form-group">
                        <label for="data_inicial">Data Inicial - Formato : XXXX-XX-XX (ano-mes-dia)</label>
                        <input class="form-control"  type="text" name="data_inicial" value="<?= $dataInicial ?>" required />
                    </div>
                    
                    <div class="form-group">
                        <label for="data_final">Data Final - Formato : XXXX-XX-XX (ano-mes-dia)</label>
                        <input class="form-control"  type="text" name="data_final" value="<?= $dataFinal ?>" required />
                    </div>
                    
                    
                    

                </form>

            </div>

        </div>
    </div>
</div>



<?php include 'rodape.php'; ?>