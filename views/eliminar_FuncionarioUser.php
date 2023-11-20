<?php

$id = $_GET['id'];
$conexion = mysqli_connect("localhost", "root", "", "Gerenciamentol");
$consulta = mysqli_query($conexion, "DELETE FROM user WHERE id= '$id'");

header('Location: userFuncionario.php');
