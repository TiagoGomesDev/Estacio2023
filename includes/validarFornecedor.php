<?php
var_dump($_POST);  // Debugging line to check POST data

$conexion = mysqli_connect("localhost", "root", "", "Gerenciamentol");

if (
    isset($_POST["nome_forn"]) && !empty($_POST["nome_forn"]) &&
    isset($_POST["cnpj"]) && !empty($_POST["cnpj"])
) {
    $nome_forn = $_POST["nome_forn"];
    $cnpj = $_POST["cnpj"];

    if (isset($_POST["selImg"]) && !empty($_POST["selImg"])) {
        $imagen = $_POST["selImg"];
    } else {
        $imagen = '';
    }

    $sql = "INSERT INTO fornecedor (nome_forn, cnpj)
    VALUES (?, ?)";
    if ($statement = mysqli_prepare($conexion, $sql)) {

        mysqli_stmt_bind_param($statement, "ss", $nome_forn, $cnpj);

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