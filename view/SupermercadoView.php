<?php include 'cabecalho.php'; ?>

<?php
if (!isset($_SESSION) || !in_array($_SESSION['tipo'], array(1)))
    header("Losupermercadoion: home.php");

require_once '../Util/UploadImg.php';
require_once '../controller/SupermercadoController.php';
require_once '../model/Supermercado.php';
require_once '../Util/PhpStrap.php';

use Controller\SupermercadoController;
use model\Supermercado;
use Util\PhpStrap;
use Util\UploadImg;


$id = "";
$nome = "";
$endereco = "";
$img = "";
$path = "../uploads/";



if ($_POST) {
    

      
$arquivo = $_FILES['arquivo']['tmp_name'];
$tamanho = $_FILES['arquivo']['size'];

    if ($tamanho > 0) {
        $fp = fopen($arquivo, "rb");
        $conteudo = fread($fp, $tamanho);
        $conteudo = addslashes($conteudo);
        $foto = $conteudo;
        fclose($fp);
        
        $f = 'arquivo';
        $uploadImg = new UploadImg();
        $img = $uploadImg->upImg($f);
        
    }
    
    

    $p = new Supermercado($_POST['id'], $_POST['nome'], $_POST['endereco'],$img);
    //print_r("===ID>>  " . $_POST['id']);

    $supermercadoController = new SupermercadoController();
    if ($supermercadoController->salvar($p)) {

        $_bs = new PhpStrap();
        echo $_bs->alertBootStrap("Sucesso ", " ==> Supermercadoegoria  salva com sucesso...");
    } else {

        $_bs = new PhpStrap();
        echo $_bs->alertBootStrap("Erro ", " ==> Erro ao Salvar...");
    }
} else if ($_GET) {
    $supermercadoController = new SupermercadoController();
    if (isset($_GET['excluir'])) {
        if ($supermercadoController->excluir($_GET['excluir'])) {


            $_bs = new PhpStrap();
            echo $_bs->alertBootStrap("Sucesso ", " ==> Sucesso ao Excluir supermercado...");
        } else {

            $_bs = new PhpStrap();
            echo $_bs->alertBootStrap("Erro ", " ==> Erro ao Excluir supermercado...");
        }
    } else if (isset($_GET['alterar'])) {
        $pegaID = $_GET['alterar'];
        $supermercado = $supermercadoController->buscar($_GET['alterar']);
        $id = $pegaID;
        $nome = $supermercado->getNome();
        $endereco = $supermercado->getEndereco();
        $img = $supermercado->getUrl_foto_smercado();



        echo "<div class='alert alert-danger'>";
        echo "<strong>Alterar</strong> Click no botão abaixo <strong> Cadastrar </strong> para alterar o supermercado.</div>";
    }
}
?>

<!-- Trigger the modal with a button -->


<div class="panel panel-info">
    <div class="panel-heading"><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Cadastrar</button></div>
    <div class="panel-body">
        <div class="table-responsive">

            <table class="table">
                <tr>
                    <th>#</th><th>Imagem</th><th>Nome</th><th>Endereço</th><?php if ($_SESSION['tipo'] == 1) {
    echo "<th>Alterar</th><th>Excluir</th>";
} ?>
                </tr>
                <?php
                $supermercadoController = new SupermercadoController();
                $lista = $supermercadoController->listar("");
                if ($lista) {
                    foreach ($lista as $p) {
                        echo "<tr>";
                       echo "<td>" . $p->getId() . "</td>";
                         echo "<td><img width='80' height='80' class='img-circle' src='".$path.$p->getUrl_foto_smercado()."'"."/></td>";
                        echo "<td>" . $p->getNome() . "</td>";
                        echo "<td>" . $p->getEndereco() . "</td>";

                        if ($_SESSION['tipo'] == 1) {
                            echo "<td><a href='?alterar=" . $p->getId() . "'>" . "<button type='button' class='btn btn-info btn-lg'>Alterar</button>" . "</a></td>";
                            echo "<td><a href='?excluir=" . $p->getId() . "'>" . "<button class='btn btn btn-danger btn-lg' type='button' >Excluir</button>" . "</a></td>";
                        }
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
                        <label for="endereco">Endereço :</label>
                        <input class="form-control"  type="text" name="endereco" value="<?= $endereco ?>" required/>
                    </div>
                    
                    
                    <div class="form-group">
                        <label for="arquivo">Imagem:</label>
                        <input type="file" name="arquivo"  required/>
                    </div>
                   
                </form>

            </div>

        </div>
    </div>
</div>




<?php include 'rodape.php'; ?><?php
