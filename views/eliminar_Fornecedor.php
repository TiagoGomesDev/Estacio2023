<?php

$id_fornecedor = $_GET['id_fornecedor'];
$conexion = mysqli_connect("localhost", "root", "", "Gerenciamentol");
$consulta = mysqli_query($conexion, "DELETE FROM fornecedor WHERE id_fornecedor= '$id_fornecedor'");

header('Location: userFornecedor.php');
