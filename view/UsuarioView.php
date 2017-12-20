<?php include 'cabecalho.php'; ?>

<?php
if (!isset($_SESSION) || !in_array($_SESSION['tipo'], array(1)))
    header("Location: home.php");

require_once '../controller/TipoController.php';
require_once '../controller/UsuarioController.php';
require_once '../model/Tipo.php';
require_once '../model/Usuario.php';
require_once '../Util/PhpStrap.php';

use Controller\TipoController;
use Controller\UsuarioController;
use model\Usuario;
use Util\PhpStrap;

$id = "";
$nome = "";
$email = "";
$senha = "";
$tipo = "";
$Resposta = "Cadastro de Usuário:";

if ($_POST) {

//    $arquivo = $_FILES['foto']['tmp_name'];
//    $tamanho = $_FILES['foto']['size'];
//
//    if ($tamanho > 0) {
//        $fp = fopen($arquivo, "rb");
//        $conteudo = fread($fp, $tamanho);
//        $conteudo = addslashes($conteudo);
//        $foto = $conteudo;
//        fclose($fp);
//    }



    $p = new Usuario($_POST['id'], $_POST['nome'], $_POST['email'], $_POST['senha'], $_POST['tipo']);
    //print_r("===ID>>  " . $_POST['id']);

    $usuarioController = new UsuarioController();
    if ($usuarioController->salvar($p)) {

        $_bs = new PhpStrap();
        echo $_bs->alertBootStrap("Sucesso ", " ==> Usuario salvo com sucesso...");
    } else {

        $_bs = new PhpStrap();
        echo $_bs->alertBootStrap("Erro ", " ==> Erro ao Salvar...");
    }
} else if ($_GET) {
    $usuarioController = new UsuarioController();
    if (isset($_GET['excluir'])) {
        if ($usuarioController->excluir($_GET['excluir'])) {


            $_bs = new PhpStrap();
            echo $_bs->alertBootStrap("Sucesso ", " ==> Sucesso ao Excluir usuario...");
        } else {

            $_bs = new PhpStrap();
            echo $_bs->alertBootStrap("Erro ", " ==> Erro ao Excluir usuario...");
        }
    } else if (isset($_GET['alterar'])) {
        $pegaID = $_GET['alterar'];
        $usuario = $usuarioController->buscar($_GET['alterar']);
        $id = $pegaID;
        $nome = $usuario->getNome();
        $email = $usuario->getEmail();
        //$foto = $usuario->getFoto();
        $tipo = $usuario->getTipo();

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
        <div class="panel-heading">Listagem de Usuários</div>
        <div class="panel-body">
            <div class="table-responsive">

                <table class="table">
                    <tr>
                        <th>Id</th><th>Nome</th><th>Email</th><th>Tipo</th>
                    </tr>
                    <?php
                    $usuarioController = new UsuarioController();
                    $lista = $usuarioController->listar("");
                    if ($lista) {
                        foreach ($lista as $p) {
                            echo "<tr>";
                            echo "<td>" . $p->getId() . "</td>";
                            echo "<td>" . $p->getNome() . "</td>";
                            echo "<td>" . $p->getEmail() . "</td>";
                            //echo "<td><img width='30' src='data:image/jpeg;base64," . base64_encode($p->getFoto()) . "' /></td>";
                            echo "<td>" . ($p->getTipo()->getNome()) . "</td>";
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
                        <label for="nome">Nome:</label>
                        <input class="form-control"  type="text" name="nome" value="<?= $nome ?>" required/>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input class="form-control"  type="text" name="email" value="<?= $email ?>" required />
                    </div>
                    <div class="form-group">
                        <label for="senha">Senha:</label>
                        <input  class="form-control" type="password" name="senha" required/>
                    </div>
                    <!--    <div class="form-group">
                            <label for="foto">Foto:</label>
                            <input type="file" name="foto" />
                        </div>-->
                    <div class="form-group">
                        <label for="tipo">Tipo:</label>
                        <select  class="form-control" name="tipo" required>
                            <option></option>
                            <?php
                            $tipoController = new TipoController();
                            $lista = $tipoController->listar("");
                            foreach ($lista as $v) {
                                $selected = "";
                                if ($v->getId() == $tipo)
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