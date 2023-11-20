<?php
var_dump($_POST);  // Debugging line to check POST data

$conexion = mysqli_connect("localhost", "root", "", "Gerenciamentol");

if (
    isset($_POST["fk_produto"]) && !empty($_POST["fk_produto"]) &&
    isset($_POST["fk_funcionario"]) && !empty($_POST["fk_funcionario"]) &&
    isset($_POST["qtda_produto_solicitado"]) && !empty($_POST["qtda_produto_solicitado"]) &&
    isset($_POST["fk_fornecedor"]) && !empty($_POST["fk_fornecedor"]) &&
    isset($_POST["status"]) && !empty($_POST["status"])
) {
    $fk_produto = $_POST["fk_produto"];
    $fk_funcionario = $_POST["fk_funcionario"];
    $qtda_produto_solicitado = $_POST["qtda_produto_solicitado"];
    $fk_fornecedor = $_POST["fk_fornecedor"];
    $status = $_POST["status"];

    if (isset($_POST["selImg"]) && !empty($_POST["selImg"])) {
        $imagen = $_POST["selImg"];
    } else {
        $imagen = '';
    }

    $sql = "INSERT INTO pedidos (fk_produto, fk_funcionario, qtda_produto_solicitado, fk_fornecedor, status)
    VALUES (?, ?, ?, ?, ?)";
    if ($statement = mysqli_prepare($conexion, $sql)) {

        mysqli_stmt_bind_param($statement, "sssss", $fk_produto, $fk_funcionario, $qtda_produto_solicitado, $fk_fornecedor, $status);

        if (mysqli_stmt_execute($statement)) {
            header('Location: ../views/user.php');
        } else {
            echo "Não pode realizar a aquisição";
        }
        mysqli_stmt_close($statement);
    }

    mysqli_close($conexion);
} else {
?>
<?php  } ?>