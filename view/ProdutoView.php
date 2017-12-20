<?php include 'cabecalho.php'; ?>

<?php
if (!isset($_SESSION) || !in_array($_SESSION['tipo'], array(1, 2)))
    header("Location: home.php");

require_once '../controller/ProdutoController.php';
require_once '../model/Produto.php';
require_once '../Util/PhpStrap.php';

use Controller\ProdutoController;
use model\Produto;
use Util\PhpStrap;

$id = "";
$nome = "";

if ($_POST) {
    
} else if ($_GET) {
    $produtoController = new ProdutoController();
    if (isset($_GET['excluir'])) {
        if ($produtoController->excluir($_GET['excluir'])) {

            $_bs = new PhpStrap();
            echo $_bs->alertBootStrap("Sucesso ", " ==> Produto excluido com sucesso...");
        } else {

            $_bs = new PhpStrap();
            echo $_bs->alertBootStrap("Erro ", " ==> Erro ao excluir produto...");
        }
    }
}
?>


<!-- Modal 
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

         Modal content
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
</div>-->



<!-- Trigger the modal with a button 
<div class="container">
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Cadastrar</button>
    <div> <p> </p></div>
</div>-->
<div class="container">
    <div class="panel panel-info">
        <div class="panel-heading">Listagem  Produtos de Usuários</div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class = "table">
                    <tr>
                        <th>Id</th><th>Foto</th><th>Produto</th><th>Marca</th><th>Usuario</th>
                    </tr>
                    <?php
                    $produtoController = new ProdutoController();
                    $lista = $produtoController->listar("");
                    if ($lista) {
                        foreach ($lista as $p) {
                            echo "<tr>";
                            echo "<td>" . $p->getId() . "</td>";
//        echo "<td>" . $p->getUrlFoto() . "</td>";
                            echo "<td><img width='80' height='80' class='img-thumbnail' src='" . $p->getUrlFoto() . "'" . "/></td>";
                            echo "<td>" . $p->getProduto() . "</td>";
                            echo "<td>" . $p->getMarca() . "</td>";
                            echo "<td>" . $p->getUsuario() . "</td>";

//        echo "<td><a href='?alterar=" . $p->getId() . "'>" . "<button type='button' class='btn btn-info btn-lg'>Alterar</button>" . "</a></td>";

                            if ($_SESSION['tipo'] == 1) {
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