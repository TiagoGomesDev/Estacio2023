<?php
session_start();
error_reporting(0);

$validar = $_SESSION['nombre'];

if ($validar == null || $validar == '') {
    header("Location: ../includes/login.php");
    die();
}

$id_fornecedor = $_GET['id_fornecedor'];
$conexion = mysqli_connect("localhost", "root", "", "Gerenciamentol");
$consulta = "SELECT id_fornecedor, nome_forn, cnpj FROM fornecedor WHERE id_fornecedor = $id_fornecedor";
$resultado = mysqli_query($conexion, $consulta);
$fornecedor = mysqli_fetch_assoc($resultado);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Fornecedor</title>

    <link rel="stylesheet" href="../css/fontawesome-all.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/es.css">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            max-width: 500px;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #007bff;
            color: #ffffff;
            text-align: center;
            font-weight: bold;
            border-bottom: none;
            border-radius: 10px 10px 0 0;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-control {
            border-radius: 5px;
        }

        .btn-success {
            background-color: #28a745;
            color: #ffffff;
        }

        .btn-danger {
            background-color: #dc3545;
            color: #ffffff;
        }
    </style>
</head>

<body id="page-top">
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                Detalhes do Fornecedor
            </div>
            <div class="card-body">
                <form action="../includes/_functions.php" method="POST">
                    <div class="form-group">
                        <label for="id_fornecedor" class="form-label">ID do Fornecedor:</label>
                        <input type="text" readonly class="form-control" id="staticId_fornecedor" name="id_fornecedor" value="<?php echo $fornecedor['id_fornecedor']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="nome_forn" class="form-label">Nome do Fornecedor:</label>
                        <input type="text" class="form-control" id="staticNome_forn" name="nome_forn" value="<?php echo $fornecedor['nome_forn']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="cnpj" class="form-label">CNPJ:</label>
                        <input type="text" class="form-control" id="staticCnpj" name="cnpj" value="<?php echo $fornecedor['cnpj']; ?>">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success">Editar</button>

                        <a href="userFornecedor.php" class="btn btn-danger">Voltar</a>
                    </div>

                    <input type="hidden" name="accion" value="editar_registroFornecedor">
                    <input type="hidden" name="id_fornecedor" value="<?php echo $id_fornecedor; ?>">
                    <br>
                </form>
            </div>
        </div>
    </div>
</body>

</html>