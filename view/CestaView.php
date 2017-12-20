<?php include 'cabecalho.php'; ?>

<?php
if (!isset($_SESSION) || !in_array($_SESSION['tipo'], array(1,2)))
    header("Location: home.php");

require_once '../controller/CestaController.php';
require_once '../model/Cesta.php';
require_once '../Util/PhpStrap.php';

use Controller\CestaController;
use model\Cesta;
use Util\PhpStrap;

$id = "";
$produto = "";
$tipo = "";
$tCesta = "";
$qtde = "";
$_SESSION['Listatipo'] = '';
//$_SESSION['Listacesta'];


if ($_POST) {
    $cesta = new Cesta($_POST['id'], $_POST['produto'], $_POST['tipo'], $_POST['tCesta'], $_POST['qtde']);
    $cestaController = new CestaController();
    if ($cestaController->salvar($cesta)) {
        $_bs = new PhpStrap();
        echo $_bs->alertBootStrap("Sucesso ", " ==> Item salvo com sucesso...");
    } else {

        $_bs = new PhpStrap();
        echo $_bs->alertBootStrap("Erro ", " ==> Erro ao Salvar...");
    }
} else if ($_GET) {
    $cestaController = new CestaController();
    if (isset($_GET['excluir'])) {
        if ($cestaController->excluir($_GET['excluir'])) {

            $_bs = new PhpStrap();
            echo $_bs->alertBootStrap("Sucesso ", " ==> Item excluido com sucesso...");
        } else {

            $_bs = new PhpStrap();
            echo $_bs->alertBootStrap("Erro ", " ==> Erro ao excluir usuario...");
        }
    } else if (isset($_GET['alterar'])) {
        $cesta = $cestaController->buscar($_GET['alterar']);
        $id = $cesta->getId();
        $produto = $cesta->getProduto();
        $tipo = $cesta->getTipo();
        $tCesta = $cesta->getCesta();
        $qtde = $cesta->getQtde();


        echo "<div class='container'>";
        echo "<div class='alert alert-danger'>";
        echo "<strong>Alterar</strong> Click no botão abaixo <strong> Cadastrar </strong> para alterar o usuario.</div></div>";
    } else if (isset($_GET['listar'])) {

        if ($_GET['listar'] == "Alimentação") {
            $_SESSION['Listatipo'] = $_GET['listar'];
            
        } else if ($_GET['listar'] == "Higiene") {
            $_SESSION['Listatipo'] = $_GET['listar'];
            
        } else if ($_GET['listar'] == "Limpeza") {
           $_SESSION['Listatipo'] = $_GET['listar'];
           
        } else {
            $_SESSION['Listatipo'] = "";
        }



        echo "<div class='container'>";
        echo "<div class='alert alert-danger'>";
        echo "<strong>Listagem por Tipo Produto : </strong> Todos  : " . $_SESSION['Listatipo'] . "</div></div>";
        
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

                    <div class="form-group">
                        <label for="produto">Produto:</label>
                        <input class="form-control" type="text" name="produto" value="<?= $produto ?>" required />
                    </div> 

                    <div class="form-group">
                        <label for="tipo">Tipo Produto: (Alimentação) - (Higiene Pessoal) - (Limpeza)</label>
                        <input class="form-control" type="text" name="tipo" value="<?= $tipo ?>" required />
                    </div>

                    <div class="form-group">
                        <label for="tCesta">Tipo de Cesta: (Dieese e Procon) - (Dieese) - (Procon) </label>
                        <input class="form-control" type="text" name="tCesta" value="<?= $tCesta ?>" required />
                    </div>

                    <div class="form-group">
                        <label for="qtde">Quantidade a coletar ( 1 ou 3) :</label>
                        <input class="form-control" type="text" name="qtde" value="<?= $qtde ?>" required />
                    </div>

                    <input type="hidden" name="id" value="<?= $id ?>" />
                    <div class="form-group">
                        <input class="btn btn-secundary"  type="button" value="Novo" onclick="window.location = '<?= $_SERVER['SCRIPT_NAME'] ?>'" />
                        <input  class="btn btn-primary" type="submit" value="Salvar" />
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>



<!-- Trigger the modal with a button -->
<div class="container">
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Cadastrar</button>
    <?php echo "<td><a href='?listar=" . 'Alimentação' . "'>" . "<button class='btn btn btn-danger btn-sm' type='button' >Alimentação</button>" . "</a></td>"; ?>
    <?php echo "<td><a href='?listar=" . 'Higiene' . "'>" . "<button class='btn btn btn-danger btn-sm' type='button' >Higiene Pessoal</button>" . "</a></td>"; ?>
    <?php echo "<td><a href='?listar=" . 'Limpeza' . "'>" . "<button class='btn btn btn-danger btn-sm' type='button' >Limpeza</button>" . "</a></td>"; ?>
    <?php echo "<td><a href='?listar=" . 'todos' . "'>" . "<button class='btn btn btn-danger btn-sm' type='button' >Todos</button>" . "</a></td>"; ?>
    
    
   
    
    <div> <p> </p></div>
</div>
<div class="container">
    <div class="panel panel-info">
        <div class="panel-heading">Listagem  Cestas de Usuários</div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class = "table">
                    <tr>
                        <th>Id</th><th>Produto</th>
                    </tr>
                    <?php
                    $cestaController = new CestaController();
                    $lista = $cestaController->listarPorTipo($_SESSION['Listatipo']);
                    if ($lista) {
                        foreach ($lista as $p) {
                            echo "<tr>";
                            echo "<td>" . $p->getId() . "</td>";
                            echo "<td>" . $p->getProduto() . "</td>";
                            echo "<td>" . $p->getCesta() . "</td>";
                            echo "<td><a href='?alterar=" . $p->getId() . "'>" . "<button type='button' class='btn btn-info btn-sm'>Alterar</button>" . "</a></td>";
                             if ($_SESSION['tipo'] == 1 ){
                                echo "<td><a href='?excluir=" . $p->getId() . "'>" . "<button class='btn btn btn-danger btn-sm' type='button' >Excluir</button>" . "</a></td>";  
                             }
                           
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