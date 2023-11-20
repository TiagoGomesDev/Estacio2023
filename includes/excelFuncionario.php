<?php
require_once("_db.php");
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=reporte.xls");
?>

<table class="table table-striped table-dark " id="table_id">

    <thead>
        <tr>
            <th>ID</th>
            <th>NOME FUNCIONÁRIO</th>
            <th>E-MAIL</th>
            <th>ROL</th>
            <th>SENHA</th>
            <th>CARGO</th>
            <th>NOME USUARIO</th>
        </tr>
    </thead>
    <tbody>

        <?php

        $conexion = mysqli_connect("localhost", "root", "", "Gerenciamentol");
        $SQL = "SELECT
        id, nombre, correo, rol, cargo, usuario, password
        from user as u
        ORDER BY id ASC;";

        $dato = mysqli_query($conexion, $SQL);

        if ($dato->num_rows > 0) {
            while ($fila = mysqli_fetch_array($dato)) {

        ?>
                <tr>
                    <td><?php echo $fila['id']; ?></td>
                    <td><?php echo $fila['nombre']; ?></td>
                    <td><?php echo $fila['correo']; ?></td>
                    <td><?php echo $fila['rol']; ?></td>
                    <td><?php echo $fila['password']; ?></td>
                    <td><?php echo $fila['cargo']; ?></td>
                    <td><?php echo $fila['usuario']; ?></td>
            <?php
            }
        }
