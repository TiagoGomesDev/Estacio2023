<?php

$id_produtos = $_GET['id_produtos'];
$conexion = mysqli_connect("localhost", "root", "", "Gerenciamentol");
$consulta = mysqli_query($conexion, "DELETE FROM produtos WHERE id_produtos= '$id_produtos'");

header('Location: userProdutoLector.php');
