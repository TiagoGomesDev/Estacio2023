<?php

session_start();
error_reporting(0);

$validar = $_SESSION['nombre'];

if ($validar == null || $validar = '') {

    header("Location: ../includes/login.php");
    die();
}
$id_pedidos = $_GET['id_pedidos'];
$conexion = mysqli_connect("localhost", "root", "", "Gerenciamentol");
$consulta = "SELECT
id_pedidos, qtda_produto_solicitado, fk_produto, fk_fornecedor, fk_funcionario, status, 
id_produtos, nome_produto, qtda_produtos, empresa, 
id_fornecedor, nome_forn, cnpj,
id_status, nome_status,
id, nombre, correo, fecha, cargo, usuario
from pedidos as pedid
inner join produtos as prod on prod.id_produtos = pedid.fk_produto
inner join status as st on st.id_status = pedid.status
inner join fornecedor as forn on forn.id_fornecedor = pedid.fk_fornecedor
inner join user as u ON u.id = pedid.fk_funcionario
WHERE id_pedidos = $id_pedidos";

$resultado = mysqli_query($conexion, $consulta);
$usuario = mysqli_fetch_assoc($resultado);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros</title>

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
                Editar Pedidos
            </div>
            <div class="card-body">
                <form action="../includes/_functions.php" method="POST">
                    <div class="form-group">
                        <label for="nome" class="form-label">Identificador:</label>
                        <div class="col-sm-15">
                            <div class="col-sm-1">
                                <input type="text" readonly class="form-control" id="staticId_pedidos" name="id_pedidos" value="<?php echo $usuario['id_pedidos']; ?>">
                            </div>
                            <label for="nome" class="form-label">Quantida de Produtos:</label>
                            <input type="text" readonly class="form-control" id="staticQtda_produto_solicitado" name="qtda_produto_solicitado" value="<?php echo $usuario['qtda_produto_solicitado']; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="fk_produto">Produto:</label><br>
                        <input type="text" class="form-control" id="staticNome_produto" readonly value="<?php echo $usuario['nome_produto']; ?>">
                        <input type="hidden" name="fk_produto" value="<?php echo $usuario['fk_produto']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="fk_fornecedor">Nome Fornecedor:</label><br>
                        <input type="text" class="form-control" id="staticNome_forn" readonly value="<?php echo $usuario['nome_forn']; ?>">
                        <input type="hidden" name="fk_fornecedor" value="<?php echo $usuario['fk_fornecedor']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="fk_funcionario">Nome Funcionario:</label><br>
                        <input type="text" class="form-control" id="staticFk_funcionario" readonly value="<?php echo $usuario['nombre']; ?>">
                        <input type="hidden" name="fk_funcionario" value="<?php echo $usuario['fk_funcionario']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="status">Status:</label><br>
                        <select name="status" required>
                            <option value="1" <?php if ($usuario['status'] == 1) echo 'selected'; ?>>Pago</option>
                            <option value="2" <?php if ($usuario['status'] == 2) echo 'selected'; ?>>Não Pago</option>
                            <option value="3" <?php if ($usuario['status'] == 3) echo 'selected'; ?>>Concluído</option>
                            <option value="4" <?php if ($usuario['status'] == 4) echo 'selected'; ?>>Pendente</option>
                            <option value="5" <?php if ($usuario['status'] == 5) echo 'selected'; ?>>Ativo</option>
                            <option value="6" <?php if ($usuario['status'] == 6) echo 'selected'; ?>>Inativo</option>
                            <option value="7" <?php if ($usuario['status'] == 7) echo 'selected'; ?>>Aberto</option>
                            <option value="8" <?php if ($usuario['status'] == 8) echo 'selected'; ?>>Fechado</option>
                            <option value="9" <?php if ($usuario['status'] == 9) echo 'selected'; ?>>Em Andamento</option>
                            <option value="10" <?php if ($usuario['status'] == 10) echo 'selected'; ?>>Encerrado</option>
                            <option value="11" <?php if ($usuario['status'] == 11) echo 'selected'; ?>>Aprovado</option>
                            <option value="12" <?php if ($usuario['status'] == 12) echo 'selected'; ?>>Reprovado</option>
                            <option value="13" <?php if ($usuario['status'] == 13) echo 'selected'; ?>>Enviado</option>
                            <option value="14" <?php if ($usuario['status'] == 14) echo 'selected'; ?>>Não Enviado</option>
                            <option value="15" <?php if ($usuario['status'] == 15) echo 'selected'; ?>>Agendado</option>
                            <option value="16" <?php if ($usuario['status'] == 16) echo 'selected'; ?>>Cancelado</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success">Editar</button>
                        <a href="user.php" class="btn btn-danger">Voltar</a>
                    </div>

                    <input type="hidden" name="accion" value="editar_registro2">
                    <input type="hidden" name="id_pedidos" value="<?php echo $id_pedidos; ?>">
                    <br>
            </div>
        </div>
    </div>
    </div>
    </div>

    </form>
</body>

</html>