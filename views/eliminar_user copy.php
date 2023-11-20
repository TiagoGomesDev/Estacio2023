<?php

$id_pedidos = $_GET['id_pedidos'];
$conexion = mysqli_connect("localhost", "root", "", "Gerenciamentol");
$consulta = mysqli_query($conexion, "DELETE FROM pedidos WHERE id_pedidos= '$id_pedidos'");

header('Location: lector.php');
