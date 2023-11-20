<?php

session_start();
error_reporting(0);

$validar = $_SESSION['nombre'];

if ($validar == null || $validar = '') {

    header("Location: ./includes/login.php");
    die();
}


?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros de Vendas</title>

    <link rel="stylesheet" href="./css/es.css">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="./package/dist/sweetalert2.css">
    <style>
        .modal-header {
            background-color: #007bff;
            color: white;
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: bold;
        }

        .form-group input[type="text"],
        .form-group input[type="number"],
        .form-group input[type="radio"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-group select {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .mb-3 {
            margin-bottom: 20px;
        }

        #senha {
            margin-bottom: 10px;
        }
    </style>
</head>

<body id="page-top">
                                        <!-- CADASTROS PARA USUARIOS ADM  (ROL 1) -->

    <!-- CADASTRO DE PEDIDO -->
    <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h3 class="modal-title" id="exampleModalLabel">Registro de Pedidos</h3>
                    <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../includes/validar.php" method="POST">

                        <div class="form-group">
                            <label for="qtda_produto_solicitado" class="form-label">Quantidade do Produto Solicitado</label>
                            <input type="number" id="qtda_produto_solicitado" name="qtda_produto_solicitado" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="fk_produto" class="form-label">ID do Produto</label>
                            <input type="number" id="fk_produto" name="fk_produto" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="fk_fornecedor" class="form-label">ID do Fornecedor</label>
                            <input type="number" id="fk_fornecedor" name="fk_fornecedor" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="fk_funcionario" class="form-label">ID do Funcionário</label>
                            <input type="number" id="fk_funcionario" name="fk_funcionario" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="status" class="form-label">Status</label>
                            <input type="text" id="status" name="status" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <input type="submit" value="Guardar" id="register" class="btn btn-success" name="registrar">
                            <a href="user.php" class="btn btn-danger">Cancelar</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- CADASTRO DE PRODUTO -->
    <div class="modal fade" id="createProd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h3 class="modal-title" id="exampleModalLabel">Registro de Produto</h3>
                    <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../includes/validarProduto.php" method="POST">

                        <div class="form-group">
                            <label for="nome_produto" class="form-label">Nome de Produto:</label>
                            <input type="text" id="nome_produto" name="nome_produto" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="qtda_produtos" class="form-label">Quantidade de Produtos:</label>
                            <input type="number" id="qtda_produtos" name="qtda_produtos" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="empresa" class="form-label">Nome da Empresa:</label>
                            <input type="text" id="empresa" name="empresa" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <input type="submit" value="Guardar" id="register" class="btn btn-success" name="registrar">
                            <a href="user.php" class="btn btn-danger">Cancelar</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- CADASTRO DE FORNECEDOR -->
    <div class="modal fade" id="createForn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h3 class="modal-title" id="exampleModalLabel">Registro de Fornecedor</h3>
                    <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../includes/validarFornecedor.php" method="POST">

                        <div class="form-group">
                            <label for="nome_forn" class="form-label">Nome Fornecedor:</label>
                            <input type="text" id="nome_forn" name="nome_forn" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="cnpj" class="form-label">CNPJ:</label>
                            <input type="text" id="cnpj" name="cnpj" class="form-control" oninput="this.value = mascaraCNPJ(this.value);" required>
                        </div>

                        <div class="mb-3">
                            <input type="submit" value="Guardar" id="register" class="btn btn-success" name="registrar">
                            <a href="user.php" class="btn btn-danger">Cancelar</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- CADASTRO DE FUNCIONARIO -->
    <div class="modal fade" id="createFunc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h3 class="modal-title" id="exampleModalLabel">Registro de Funcionario</h3>
                    <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../includes/validarFuncionario.php" method="POST">

                        <div class="form-group">
                            <label for="nombre" class="form-label">Nome de Funcionário:</label>
                            <input type="text" id="nombre" name="nombre" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="correo" class="form-label">E-Mail:</label>
                            <input type="email" id="correo" name="correo" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="telefono" class="form-label">Telefone:</label>
                            <input type="text" id="telefono" name="telefono" class="form-control" placeholder="(XX) XXXXX-XXXX" oninput="this.value = mascaraTelefone(this.value);" required>
                        </div>

                        <div class="form-group">
                            <label for="rol" class="form-label">Autorização:</label>
                            <input type="number" id="rol" name="rol" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="cargo" class="form-label">Cargo:</label>
                            <input type="text" id="cargo" name="cargo" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="password" class="form-label">Senha:</label>
                            <div class="input-group">
                                <input type="password" id="password" name="password" class="form-control" required>
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" id="mostrarSenhaBtn">Mostrar</button>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="usuario" class="form-label">Usuario:</label>
                            <input type="text" id="usuario" name="usuario" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <input type="submit" value="Guardar" id="register" class="btn btn-success" name="registrar">
                            <a href="user.php" class="btn btn-danger">Cancelar</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

                                        <!-- CADASTROS PARA USUARIOS FUNCIONÁRIO (ROL 2) -->
                                        
    <!-- CADASTRO DE PEDIDO -->
    <div class="modal fade" id="create2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h3 class="modal-title" id="exampleModalLabel">Registro de Pedidos</h3>
                    <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../includes/validar.php" method="POST">

                        <div class="form-group">
                            <label for="qtda_produto_solicitado" class="form-label">Quantidade do Produto Solicitado</label>
                            <input type="number" id="qtda_produto_solicitado" name="qtda_produto_solicitado" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="fk_produto" class="form-label">ID do Produto</label>
                            <input type="number" id="fk_produto" name="fk_produto" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="fk_fornecedor" class="form-label">ID do Fornecedor</label>
                            <input type="number" id="fk_fornecedor" name="fk_fornecedor" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="fk_funcionario" class="form-label">ID do Funcionário</label>
                            <input type="number" id="fk_funcionario" name="fk_funcionario" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="status" class="form-label">Status</label>
                            <input type="text" id="status" name="status" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <input type="submit" value="Guardar" id="register" class="btn btn-success" name="registrar">
                            <a href="lector.php" class="btn btn-danger">Cancelar</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- CADASTRO DE PRODUTO -->
    <div class="modal fade" id="createProd2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h3 class="modal-title" id="exampleModalLabel">Registro de Produto</h3>
                    <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../includes/validarProduto.php" method="POST">

                        <div class="form-group">
                            <label for="nome_produto" class="form-label">Nome de Produto:</label>
                            <input type="text" id="nome_produto" name="nome_produto" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="qtda_produtos" class="form-label">Quantidade de Produtos:</label>
                            <input type="number" id="qtda_produtos" name="qtda_produtos" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="empresa" class="form-label">Nome da Empresa:</label>
                            <input type="text" id="empresa" name="empresa" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <input type="submit" value="Guardar" id="register" class="btn btn-success" name="registrar">
                            <a href="lector.php" class="btn btn-danger">Cancelar</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
        function mascaraCPF(cpf) {
            cpf = cpf.replace(/\D/g, ''); // Remove caracteres não numéricos
            cpf = cpf.slice(0, 11); // Limita a quantidade de dígitos para 11
            cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2');
            cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2');
            cpf = cpf.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
            return cpf;
        }

        function mascaraCNPJ(cnpj) {
            cnpj = cnpj.replace(/\D/g, ''); // Remove caracteres não numéricos
            cnpj = cnpj.slice(0, 14); // Limita a quantidade de dígitos para 14
            cnpj = cnpj.replace(/^(\d{2})(\d)/, '$1.$2');
            cnpj = cnpj.replace(/^(\d{2})\.(\d{3})(\d)/, '$1.$2.$3');
            cnpj = cnpj.replace(/\.(\d{3})(\d)/, '.$1/$2');
            cnpj = cnpj.replace(/(\d{4})(\d)/, '$1-$2');
            return cnpj;
        }

        function mascaraTelefone(telefone) {
            telefone = telefone.replace(/\D/g, ''); // Remove caracteres não numéricos
            telefone = telefone.slice(0, 11); // Limita a quantidade de dígitos para 14
            telefone = telefone.replace(/^(\d{2})(\d)/g, '($1) $2'); // Coloca parênteses em torno dos dois primeiros dígitos
            telefone = telefone.replace(/(\d{5})(\d)/, '$1-$2'); // Coloca hífen entre o quinto e o sexto dígitos
            return telefone;
        }



        // Obtém o campo de senha, o botão de alternância e o tipo de entrada original
        var senhaInput = document.getElementById("password");
        var mostrarSenhaBtn = document.getElementById("mostrarSenhaBtn");
        var tipoOriginal = senhaInput.type;

        // Adiciona um evento de clique ao botão de alternância
        mostrarSenhaBtn.addEventListener("click", function() {
            // Alterna o tipo de entrada entre 'password' e 'text'
            if (senhaInput.type === "password") {
                senhaInput.type = "text";
                mostrarSenhaBtn.textContent = "Ocultar";
            } else {
                senhaInput.type = tipoOriginal;
                mostrarSenhaBtn.textContent = "Mostrar";
            }
        });
    </script>
</body>

</html>