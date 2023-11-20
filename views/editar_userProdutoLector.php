<?php
session_start();
error_reporting(0);

$validar = $_SESSION['nombre'];

if ($validar == null || $validar == '') {
    header("Location: ../includes/login.php");
    die();
}

$id_produtos = $_GET['id_produtos'];
$conexion = mysqli_connect("localhost", "root", "", "Gerenciamentol");
$consulta = "SELECT id_produtos, nome_produto, qtda_produtos, empresa FROM produtos WHERE id_produtos = $id_produtos";
$resultado = mysqli_query($conexion, $consulta);
$produto = mysqli_fetch_assoc($resultado);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Produto</title>

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
                Detalhes do Produto
            </div>
            <div class="card-body">
                <form action="../includes/_functions.php" method="POST">
                    <div class="form-group">
                        <label for="id_produtos" class="form-label">ID do Produto:</label>
                        <input type="text" readonly class="form-control" id="staticId_produtos" name="id_produtos" value="<?php echo $produto['id_produtos']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="nome_produto" class="form-label">Nome do Produto:</label>
                        <input type="text" class="form-control" id="staticNome_produto" name="nome_produto" value="<?php echo $produto['nome_produto']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="qtda_produtos" class="form-label">Quantidade de Produtos:</label>
                        <input type="number" class="form-control" id="staticQtda_produtos" name="qtda_produtos" value="<?php echo $produto['qtda_produtos']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="empresa" class="form-label">Empresa:</label>
                        <input type="text" class="form-control" id="staticEmpresa" name="empresa" value="<?php echo $produto['empresa']; ?>">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success">Editar</button>
                        <a href="userProdutoLector.php" class="btn btn-danger">Voltar</a>
                    </div>
                    <input type="hidden" name="accion" value="editar_registroProduto2">
                    <input type="hidden" name="id_produtos" value="<?php echo $id_produtos; ?>">
                    <br>
                </form>
            </div>
        </div>
    </div>
</body>

</html>