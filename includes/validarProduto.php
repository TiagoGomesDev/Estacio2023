<?php
var_dump($_POST);  // Debugging line to check POST data

$conexion = mysqli_connect("localhost", "root", "", "Gerenciamentol");

if (
    isset($_POST["nome_produto"]) && !empty($_POST["nome_produto"]) &&
    isset($_POST["qtda_produtos"]) && !empty($_POST["qtda_produtos"]) &&
    isset($_POST["empresa"]) && !empty($_POST["empresa"])
) {
    $nome_produto = $_POST["nome_produto"];
    $qtda_produtos = $_POST["qtda_produtos"];
    $empresa = $_POST["empresa"];

    if (isset($_POST["selImg"]) && !empty($_POST["selImg"])) {
        $imagen = $_POST["selImg"];
    } else {
        $imagen = '';
    }

    $sql = "INSERT INTO produtos (nome_produto, qtda_produtos, empresa)
    VALUES (?, ?, ?)";
    if ($statement = mysqli_prepare($conexion, $sql)) {

        mysqli_stmt_bind_param($statement, "sss", $nome_produto, $qtda_produtos, $empresa);

        if (mysqli_stmt_execute($statement)) {
            header('Location: ../views/userProduto.php');
        } else {
            echo "Não pode realizar a aquisição";
        }
        mysqli_stmt_close($statement);
    }

    mysqli_close($conexion);
} else {
?>
<?php  } ?>