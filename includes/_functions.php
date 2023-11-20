<?php
// Configurações para exibir erros do PHP
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("_db.php");

if (isset($_POST['accion'])) {
    switch ($_POST['accion']) {
        case 'editar_registro':
            editar_registro();
            break;
            case 'editar_registro2':
                editar_registro2();
                break;
        case 'editar_registroFuncionarioUser':
            editar_registroFuncionarioUser();
            break;
        case 'editar_registroFornecedor':
            editar_registroFornecedor();
            break;
        case 'editar_registroProduto':
            editar_registroProduto();
            break;
            case 'editar_registroProduto2':
                editar_registroProduto2();
                break;
        case 'eliminar_registro':
            eliminar_registro();
            break;
        case 'acceso_user':
            acceso_user();
            break;
    }
}

function editar_registro()
{
    $conexion = mysqli_connect("localhost", "root", "", "Gerenciamentol");
    extract($_POST);
    $id_pedidos = mysqli_real_escape_string($conexion, $_POST['id_pedidos']);
    $fk_produto = mysqli_real_escape_string($conexion, $_POST['fk_produto']);
    $fk_funcionario = mysqli_real_escape_string($conexion, $_POST['fk_funcionario']);
    $qtda_produto_solicitado = mysqli_real_escape_string($conexion, $_POST['qtda_produto_solicitado']);
    $fk_fornecedor = mysqli_real_escape_string($conexion, $_POST['fk_fornecedor']);
    $status = mysqli_real_escape_string($conexion, $_POST['status']);

    $consulta = "UPDATE pedidos SET fk_produto = '$fk_produto', fk_funcionario = '$fk_funcionario', 
    qtda_produto_solicitado = '$qtda_produto_solicitado', fk_fornecedor = '$fk_fornecedor', status = '$status' 
    WHERE id_pedidos = '$id_pedidos'";
    mysqli_query($conexion, $consulta);

    header('Location: ../views/user.php');
}

function editar_registro2()
{
    $conexion = mysqli_connect("localhost", "root", "", "Gerenciamentol");
    extract($_POST);
    $id_pedidos = mysqli_real_escape_string($conexion, $_POST['id_pedidos']);
    $fk_produto = mysqli_real_escape_string($conexion, $_POST['fk_produto']);
    $fk_funcionario = mysqli_real_escape_string($conexion, $_POST['fk_funcionario']);
    $qtda_produto_solicitado = mysqli_real_escape_string($conexion, $_POST['qtda_produto_solicitado']);
    $fk_fornecedor = mysqli_real_escape_string($conexion, $_POST['fk_fornecedor']);
    $status = mysqli_real_escape_string($conexion, $_POST['status']);

    $consulta = "UPDATE pedidos SET fk_produto = '$fk_produto', fk_funcionario = '$fk_funcionario', 
    qtda_produto_solicitado = '$qtda_produto_solicitado', fk_fornecedor = '$fk_fornecedor', status = '$status' 
    WHERE id_pedidos = '$id_pedidos'";
    mysqli_query($conexion, $consulta);

    header('Location: ../views/lector.php');
}

function editar_registroFuncionarioUser()
{
    $conexion = mysqli_connect("localhost", "root", "", "Gerenciamentol");
    extract($_POST);
    $id = mysqli_real_escape_string($conexion, $id);
    $nombre = mysqli_real_escape_string($conexion, $nombre);
    $correo = mysqli_real_escape_string($conexion, $correo);
    $fecha = mysqli_real_escape_string($conexion, $fecha);
    $cargo = mysqli_real_escape_string($conexion, $cargo);
    $usuario = mysqli_real_escape_string($conexion, $usuario);
    $rol = mysqli_real_escape_string($conexion, $rol);
    $password = mysqli_real_escape_string($conexion, $password);

    $consulta = "UPDATE user SET nombre='$nombre', correo='$correo', fecha='$fecha', cargo='$cargo', usuario='$usuario', rol='$rol', password='$password' WHERE id=$id";
    mysqli_query($conexion, $consulta);

    header('Location: ../views/userFuncionario.php');
}

function editar_registroFornecedor()
{
    $conexion = mysqli_connect("localhost", "root", "", "Gerenciamentol");
    extract($_POST);
    $id_fornecedor = mysqli_real_escape_string($conexion, $_POST['id_fornecedor']);
    $nome_forn = mysqli_real_escape_string($conexion, $_POST['nome_forn']);
    $cnpj = mysqli_real_escape_string($conexion, $_POST['cnpj']);

    $consulta = "UPDATE fornecedor SET nome_forn = '$nome_forn', cnpj = '$cnpj'
    WHERE id_fornecedor = '$id_fornecedor'";

    mysqli_query($conexion, $consulta);

    header('Location: ../views/userFornecedor.php');
}
function editar_registroProduto()
{
    $conexion = mysqli_connect("localhost", "root", "", "Gerenciamentol");
    extract($_POST);
    $id_produtos = mysqli_real_escape_string($conexion, $_POST['id_produtos']);
    $nome_produto = mysqli_real_escape_string($conexion, $_POST['nome_produto']);
    $qtda_produtos = mysqli_real_escape_string($conexion, $_POST['qtda_produtos']);
    $empresa = mysqli_real_escape_string($conexion, $_POST['empresa']);

    $consulta = "UPDATE produtos SET nome_produto = '$nome_produto', 
    qtda_produtos = '$qtda_produtos', empresa = '$empresa'
    WHERE id_produtos = '$id_produtos'";
    mysqli_query($conexion, $consulta);

    header('Location: ../views/userProduto.php');
}

function editar_registroProduto2()
{
    $conexion = mysqli_connect("localhost", "root", "", "Gerenciamentol");
    extract($_POST);
    $id_produtos = mysqli_real_escape_string($conexion, $_POST['id_produtos']);
    $nome_produto = mysqli_real_escape_string($conexion, $_POST['nome_produto']);
    $qtda_produtos = mysqli_real_escape_string($conexion, $_POST['qtda_produtos']);
    $empresa = mysqli_real_escape_string($conexion, $_POST['empresa']);

    $consulta = "UPDATE produtos SET nome_produto = '$nome_produto', 
    qtda_produtos = '$qtda_produtos', empresa = '$empresa'
    WHERE id_produtos = '$id_produtos'";
    mysqli_query($conexion, $consulta);

    header('Location: ../views/userProdutoLector.php');
}

function eliminar_registro()
{
    $conexion = mysqli_connect("localhost", "root", "", "Gerenciamentol");
    $id_pedidos = mysqli_real_escape_string($conexion, $_POST['id_pedidos']);
    $consulta = "DELETE FROM pedidos WHERE id_pedidos = $id_pedidos";
    if (mysqli_query($conexion, $consulta)) {
        header('Location: ../views/user.php');
    } else {
        echo "Erro ao excluir registro: " . mysqli_error($conexion);
    }
}

function acceso_user()
{
    $nombre = $_POST['nombre'];
    $password = $_POST['password'];
    session_start();
    $_SESSION['nombre'] = $nombre;

    $conexion = mysqli_connect("localhost", "root", "", "Gerenciamentol");
    $consulta = "SELECT * FROM user WHERE nombre='$nombre' AND password='$password'";
    $resultado = mysqli_query($conexion, $consulta);
    $filas = mysqli_fetch_array($resultado);

    if ($filas['rol'] == 1) { //admin
        header('Location: ../views/user.php');
    } else if ($filas['rol'] == 2) { //lector
        header('Location: ../views/lector.php');
    } else {
        header('Location: login.php');
        session_destroy();
    }
}
